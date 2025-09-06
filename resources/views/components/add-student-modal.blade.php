<div id="addStudentModel" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
    <div class="w-full max-w-md p-6 mt-10 bg-white shadow-lg rounded-xl">
        <!-- Modal Content -->
        <div class="flex items-center justify-between pb-2 border-b">
            <h2 id="modalTitle" class="text-lg font-semibold">Add User</h2>
            <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">&times;</button>
        </div>

        <!-- Form -->
        <form method="POST" id="addStudentForm" enctype="multipart/form-data" class="mt-4 space-y-4">
            @csrf
            <!-- name -->
            <div class="flex items-center space-x-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name"
                    class="block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- email -->
            <div class="flex items-center space-x-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    class="block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- image -->
            <div id="imagePreview"></div>
            <div class="flex items-center space-x-4">
                <label for="avatar" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image"
                    class="block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- action button -->
            <div class="flex items-center justify-end space-x-2">
                <button type="submit" id="submitRegistration"
                    class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        const closeModalBtn = document.getElementById("closeModalBtn");
        const addStudentModal = document.getElementById("addStudentModel");
        const addStudentForm = document.getElementById("addStudentForm");


        $(document).ready(function() {
            $("#addStudentForm").submit(function(e) {
                e.preventDefault();

                let mode = $(this).data("mode") || "create"; // default create
                let url = "{{ route('admin.dataTable.store') }}"; // default create
                let method = "POST";

                if (mode === "update") {
                    let studentId = $(this).data("id");
                    url = '{{ route('admin.dataTable.update', ':id') }}'.replace(':id', studentId);
                    method = "POST"; // Laravel expects POST + `_method=PUT`
                }

                let formData = new FormData(this);
                if (mode === "update") {
                    formData.append("_method", "PUT"); // Laravel update fix
                }

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            closeModal();
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.message,
                                timer: 3000,
                                showConfirmButton: false
                            });
                            fetchAllStudentData(); // call inside success
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            // Clear old error messages
                            $(".error-text").remove();

                            // Show errors under each field
                            if (errors.name) {
                                $("#name").after(
                                    `<p class="error-text text-red-500 text-sm">${errors.name[0]}</p>`
                                );
                            }
                            if (errors.email) {
                                $("#email").after(
                                    `<p class="error-text text-red-500 text-sm">${errors.email[0]}</p>`
                                );
                            }
                            if (errors.image) {
                                $("#image").after(
                                    `<p class="error-text text-red-500 text-sm">${errors.image[0]}</p>`
                                );
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed!',
                                text: 'Please try again.'
                            });
                        }
                        fetchAllStudentData(); // call also here if needed
                    }
                });
            });




            $(document).on("click", ".studentEditBTN", function(e) {
                e.preventDefault();
                let studentId = $(this).attr("id");

                $.ajax({
                    url: '{{ route('admin.dataTable.edit', ':id') }}'.replace(':id', studentId),
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            $("#name").val(response.student.name);
                            $("#email").val(response.student.email);
                            $("#imagePreview").html(
                                `<img src="/storage/${response.student.image}"
                                    alt="User Image"
                                    class="w-16 h-16 rounded-full">`
                            );
                            $("#addStudentModel").removeClass("hidden");
                            $("#submitRegistration").html("Update");
                            $("#modalTitle").html("Update User");

                            $("#addStudentForm").data("mode", "update").data("id", studentId);
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'Update failed. Please try again.'
                        });
                    }

                });
            });

            //delete student
            $(document).on("click", ".studentDeleteBTN", function(e) {
                e.preventDefault();
                let studentId = $(this).attr("id");

                Swal.fire({
                    title: "Are you sure?",
                    text: "This student will be moved to trash.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/dataTable/delete/' + studentId,
                            method: "POST", // Laravel expects POST + _method=DELETE
                            data: {
                                _method: "DELETE",
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                if (response.status === 200) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: response.message,
                                        timer: 3000,
                                    });
                                }
                                fetchAllStudentData();

                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed!',
                                    text: 'Delete failed. Please try again.'
                                });
                                fetchAllStudentData();

                            }


                        });
                    }
                });
            });

            fetchAllStudentData();




        });

        // close modal
        closeModalBtn.addEventListener("click", () => {
            closeModal();
        });

        // OPTIONAL: click outside modal to close
        addStudentModal.addEventListener("click", (e) => {
            if (e.target === addStudentModal) {
                closeModal();
            }
        });

        function closeModal() {
            addStudentModal.classList.add("hidden");
            addStudentForm.reset();
            $("#addStudentForm").removeData("mode").removeData("id");
            $("#submitRegistration").html("Save");
            $("#modalTitle").html("Add User");
        }
    </script>
@endpush
