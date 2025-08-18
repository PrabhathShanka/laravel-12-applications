<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\TaskAssignedMail;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::where('user_id', Auth::id())
            ->when($request->search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%");
            })
            ->when($request->status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->orderBy('due_date');

        $tasks = $query->paginate(10);

        // Get all users for the "Assign Users" multi-select in the modal
        $users = User::all();

        return view('admin.tasks.index', compact('tasks', 'users'));
    }




    public function store(StoreTaskRequest $request)
    {
        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('tasks');
        }

        $task = Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'file_path' => $filePath,
        ]);

        // Attach assigned users if any
        if ($request->filled('assigned_users')) {
            $task->users()->sync($request->assigned_users);

            // Send email to each assigned user
            foreach ($task->users as $user) {
                Mail::to($user->email)->queue(new TaskAssignedMail($task));
            }
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Task created successfully!',
                'task' => $task->load('users')
            ]);
        }

        return redirect()->route('admin.tasks.index')->with('success', 'Task created successfully!');
    }



    public function show(Task $task)
    {
        //$this->authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
            'file' => 'nullable|file|max:2048',
        ]);

        $filePath = $task->file_path;
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($filePath) {
                Storage::delete($filePath);
            }
            $filePath = $request->file('file')->store('tasks');
        }

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'file_path' => $filePath,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        if ($task->file_path) {
            Storage::delete($task->file_path);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    public function download(Task $task)
    {
        $this->authorize('view', $task);

        if (!$task->file_path) {
            abort(404);
        }

        return Storage::download($task->file_path, basename($task->file_path));
    }
}
