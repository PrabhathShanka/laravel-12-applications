@extends('layouts.app')

@section('title', 'Events Management')

@section('content')
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Events Management</h2>
            <button type="button" id="openModalBtn" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Add Student
            </button>
        </div>
        <div class="overflow-hidden bg-white rounded-lg shadow">

            <div id="tableContainer">

            </div>
        </div>

        <!-- Modal Background -->
        <x-add-student-modal />

    </div>
@endsection


@push('scripts')
    <script>
        const addStudentBTN = document.getElementById("openModalBtn");

        function fetchAllStudentData() {
            $.ajax({
                url: "{{ route('admin.dataTable.fetchAll') }}",
                method: "GET",
                success: function(response) {
                    $("#tableContainer").html(response);
                    $('#myTable').DataTable();
                }
            });
        }

        // open modal
        addStudentBTN.addEventListener("click", () => {
            addStudentModal.classList.remove("hidden");
        });
    </script>
@endpush
