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

        if ($request->filled('assigned_users')) {
            $task->users()->sync($request->assigned_users);

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
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->load('users');

        return response()->json([
            'task' => $task,
            'users' => $task->users->pluck('id')
        ]);
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->load('users');

        return response()->json([
            'task' => $task,
            'users' => $task->users->pluck('id')
        ]);
    }

    public function update(StoreTaskRequest $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $filePath = $task->file_path;

        if ($request->hasFile('file')) {
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

        $oldUsers = $task->users->pluck('id')->toArray();
        $newUsers = $request->assigned_users ?? [];

        $task->users()->sync($newUsers);

        $newlyAssigned = array_diff($newUsers, $oldUsers);
        if (!empty($newlyAssigned)) {
            foreach (User::whereIn('id', $newlyAssigned)->get() as $user) {
                Mail::to($user->email)->queue(new TaskAssignedMail($task));
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully!',
            'task' => $task->load('users')
        ]);
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        if ($task->file_path) {
            Storage::delete($task->file_path);
        }

        $task->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Task deleted successfully!'
            ]);
        }
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    public function download(Task $task)
    {

        if (!$task->file_path || !Storage::exists($task->file_path)) {
            abort(404, 'File not found');
        }

        return Storage::download($task->file_path);
    }
}
