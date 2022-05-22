<div>
    @include('livewire.studentmodal')
    <div class="container">
        @if (session()->has('message'))
            <h5 class="alert alert-success">{{ session('message') }}</h5>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student CRUD with Bootstrap Modal and Livewire
                            <input type="search" wire:model='search' placeholder="Search (name)"
                                class="form-control float-end mx-2" style="width: 20%" />

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#studentModal">
                                Add New Student
                            </button>
                        </h4>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->course }}</td>
                                        <td class="d-flex justify-content-center">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#viewStudentModal"
                                                wire:click="viewStudent({{ $student->id }})"
                                                class="btn btn-secondary btn-sm">
                                                View
                                            </button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#updateStudentModal"
                                                wire:click="editStudent({{ $student->id }})"
                                                class="btn btn-primary btn-sm">
                                                Edit
                                            </button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteStudentModal"
                                                wire:click="deleteStudent({{ $student->id }})"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Record Found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>{{ $students->links() }}</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
