<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataTable extends Controller
{
    public function index()
    {
        try {
            return view('admin.dataTable.index');
        } catch (\Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return back()->with('error', 'Failed to load Students. Please try again later.');
        }
    }

    public function store(StudentStoreRequest $request)
    {
        $validated = $request->validated();
        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('student');
            }

            info($validated);
            Student::create($validated);
            return response()->json([
                'status' => 200,
                'message' => 'Student created successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to create Student. Please try again later.',
            ]);
        }
    }

    public function fetchAll()
    {
        try {
            $students = Student::all();
            $response = '';

            if ($students->count() > 0) {
                $response .= '
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    ';



                foreach ($students as $student) {
                    $response .= '
                        <tr>
                            <td>' . $student->id . '</td>
                            <td><img src="' . Storage::url($student->image) . '" width="50" height="50" alt="' . $student->name . '"></td>
                            <td>' . $student->name . '</td>
                            <td>' . $student->email . '</td>
                            <td>
                                <a href="#" id="' . $student->id . '"
                                    class="inline-flex items-center px-2 py-1 text-white bg-blue-600 rounded hover:bg-blue-700 studentEditBTN">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 mr-1"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                    </a>

                            <!-- delete record -->
                            <a href="#" id="' . $student->id . '"
                                class="inline-flex items-center px-2 py-1 text-white bg-red-600 rounded hover:bg-red-700 studentDeleteBTN">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 mr-1"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                                </svg>
                            </a>
                            </td>
                        </tr>
                    ';
                }

                $response .= '
                    </tbody>
                </table>';
                echo $response;
            } else {
                echo '<h3 class="text-center">No data found</h3>';
            }
        } catch (\Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to fetch Students. Please try again later.',
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $student = Student::find($id);
            return response()->json([
                'status' => 200,
                'student' => $student,
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update Student. Please try again later.',
            ]);
        }
    }

    public function update(StudentUpdateRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $student = Student::find($id);
            if ($request->hasFile('image')) {
                // Delete the old image
                if ($student->image) {
                    Storage::delete($student->image);
                }
                $validated['image'] = $request->file('image')->store('student');
            }

            $student->update($validated);
            return response()->json([
                'status' => 200,
                'message' => 'Student updated successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update Student. Please try again later.',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $student = Student::find($id);
            if ($student->image) {
                Storage::delete($student->image);
            }
            $student->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Student deleted successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to delete Student. Please try again later.',
            ]);
        }
    }
}
