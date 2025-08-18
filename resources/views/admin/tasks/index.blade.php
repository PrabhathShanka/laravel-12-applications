@extends('layouts.app', [
    'title' => 'My Tasks',
    'header' => 'My Tasks',
    'subheader' => 'Manage your assigned tasks',
    'breadcrumbs' => 'Tasks',
])

@section('content')
    <div class="mb-6 overflow-hidden bg-white shadow sm:rounded-lg">
        <!-- Filters -->
        <div class="p-4 border-b border-gray-200 sm:px-6">
            <form method="GET" action="{{ route('tasks.index') }}">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="text-gray-400 fas fa-search"></i>
                            </div>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                class="block w-full pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Search tasks...">
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                            class="block w-full mt-1 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In
                                Progress</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-end space-x-2">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="mr-2 fas fa-filter"></i> Filter
                        </button>
                        <a href="{{ route('tasks.index') }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="mr-2 fas fa-sync"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
            <div class="flex justify-end mt-4">
                <button type="button" onclick="openModal()"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="mr-2 fas fa-plus"></i> New Task
                </button>
            </div>
        </div>

        <!-- Task List -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Title
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Due Date
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($tasks as $task)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 w-2 h-2 mr-3 rounded-full
                                {{ $task->status == 'completed'
                                    ? 'bg-green-500'
                                    : ($task->status == 'in_progress'
                                        ? 'bg-yellow-500'
                                        : 'bg-red-500') }}">
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $task->title }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($task->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full
                            {{ $task->status == 'completed'
                                ? 'text-green-800 bg-green-100'
                                : ($task->status == 'in_progress'
                                    ? 'text-yellow-800 bg-yellow-100'
                                    : 'text-red-800 bg-red-100') }}">
                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $task->due_date->format('M d, Y') }}
                                @if ($task->due_date->isPast() && $task->status != 'completed')
                                    <span class="text-xs text-red-500">(Overdue)</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <div class="flex justify-center space-x-2">
                                    <!-- View -->
                                    <button onclick="viewTask({{ $task->id }})"
                                        class="text-blue-600 hover:text-blue-900" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <!-- Edit -->
                                    <button onclick="editTask({{ $task->id }})"
                                        class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Delete -->
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this task?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-sm text-center text-gray-500">
                                No tasks found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
            {{ $tasks->links() }}
        </div>
    </div>

    <!-- Task Modal (Create/Edit/View) -->
    <div id="taskModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>

            <div
                class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl sm:max-w-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Task</h3>
                    <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="taskForm" action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="taskMethod" value="POST">
                    <input type="hidden" name="task_id" id="task_id">

                    <div class="space-y-4">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                            <input type="text" name="title" id="title"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <div id="title-error" class="mt-1 text-sm text-red-600"></div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            <div id="description-error" class="mt-1 text-sm text-red-600"></div>
                        </div>

                        <!-- Due Date -->
                        <div>
                            <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date *</label>
                            <input type="date" name="due_date" id="due_date"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <div id="due_date-error" class="mt-1 text-sm text-red-600"></div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="pending">Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                            <div id="status-error" class="mt-1 text-sm text-red-600"></div>
                        </div>

                        <!-- File Attachment -->
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700">Attachment</label>
                            <input type="file" name="file" id="file"
                                class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <div id="file-error" class="mt-1 text-sm text-red-600"></div>
                        </div>

                        <!-- Assign Users -->
                        <div>
                            <label for="assigned_users" class="block text-sm font-medium text-gray-700">Assign
                                Users</label>
                            <select name="assigned_users[]" id="assigned_users" multiple
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm select2 sm:text-sm">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <div id="assigned_users-error" class="mt-1 text-sm text-red-600"></div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6 space-x-3">
                        <button type="button" onclick="closeModal()"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Open create modal
        function openModal() {
            resetForm();
            document.getElementById('taskModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            $('#assigned_users').select2({
                placeholder: "Select users to assign",
                width: '100%',
                dropdownParent: $('#taskModal')
            });
        }

        function closeModal() {
            document.getElementById('taskModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            $('#assigned_users').select2('destroy');
        }

        function resetForm() {
            document.getElementById('taskForm').reset();
            document.getElementById('taskMethod').value = 'POST';
            document.getElementById('taskForm').action = "{{ route('tasks.store') }}";
            document.getElementById('task_id').value = '';
            clearErrors();
        }

        function clearErrors() {
            document.querySelectorAll('[id$="-error"]').forEach(el => el.textContent = '');
            document.querySelectorAll('.border-red-500').forEach(el => {
                el.classList.remove('border-red-500');
                el.classList.add('border-gray-300');
            });
        }

        function displayErrors(errors) {
            clearErrors();
            Object.keys(errors).forEach(field => {
                const errorElement = document.getElementById(`${field}-error`);
                const inputElement = document.getElementById(field);
                if (errorElement && inputElement) {
                    errorElement.textContent = errors[field][0];
                    inputElement.classList.remove('border-gray-300');
                    inputElement.classList.add('border-red-500');
                }
            });
        }

        // View Task
        function viewTask(id) {
            fetch(`/admin/tasks/${id}`)
                .then(res => res.json())
                .then(data => {
                    openModal();
                    document.getElementById('modal-title').textContent = 'View Task';
                    document.getElementById('title').value = data.title;
                    document.getElementById('description').value = data.description;
                    document.getElementById('due_date').value = data.due_date.split('T')[0];
                    document.getElementById('status').value = data.status;
                    $('#assigned_users').val(data.users.map(u => u.id)).trigger('change');

                    // Disable form inputs for view
                    Array.from(document.getElementById('taskForm').elements).forEach(el => el.disabled = true);
                });
        }

        // Edit Task
        function editTask(id) {
            fetch(`/admin/tasks/${id}/edit`)
                .then(res => res.json())
                .then(data => {
                    openModal();
                    document.getElementById('modal-title').textContent = 'Edit Task';
                    document.getElementById('taskForm').action = `/tasks/${id}`;
                    document.getElementById('taskMethod').value = 'PUT';
                    document.getElementById('task_id').value = data.task.id;
                    document.getElementById('title').value = data.task.title;
                    document.getElementById('description').value = data.task.description;
                    document.getElementById('due_date').value = data.task.due_date.split('T')[0];
                    document.getElementById('status').value = data.task.status;
                    $('#assigned_users').val(data.task.users.map(u => u.id)).trigger('change');

                    Array.from(document.getElementById('taskForm').elements).forEach(el => el.disabled = false);
                });
        }

        // Handle form submission
        document.getElementById('taskForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                    method: document.getElementById('taskMethod').value,
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        closeModal();
                        window.location.reload();
                    } else {
                        alert(data.message || 'Task updated!');
                    }
                })
                .catch(error => {
                    if (error.errors) displayErrors(error.errors);
                    else alert(error.message || 'An error occurred');
                });
        });

        document.addEventListener('DOMContentLoaded', function() {
            if (!document.getElementById('taskModal').classList.contains('hidden')) {
                $('#assigned_users').select2({
                    placeholder: "Select users to assign",
                    width: '100%',
                    dropdownParent: $('#taskModal')
                });
            }
        });
    </script>
@endsection
