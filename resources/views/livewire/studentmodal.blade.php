<!-- Add Student Modal -->
<div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Create Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='closeModal'
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='saveStudent'>
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Student Name</label>
                        <input type="text" wire:model='name' class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Student Email</label>
                        <input type="text" wire:model='email' class="form-control">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Student Course</label>
                        <input type="text" wire:model='course' class="form-control">
                        @error('course')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" wire:click='clearModalInputs' class="btn btn-success">Clear</button>
                    <button type="button" class="btn btn-secondary" wire:click='closeModal'
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Update Student Modal -->
<div wire:ignore.self class="modal fade" id="updateStudentModal" tabindex="-1"
    aria-labelledby="updateStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStudentModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='closeModal'
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='updateStudent'>
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Student Name</label>
                        <input type="text" wire:model='name' class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Student Email</label>
                        <input type="text" wire:model='email' class="form-control">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Student Course</label>
                        <input type="text" wire:model='course' class="form-control">
                        @error('course')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" wire:click='clearModalInputs' class="btn btn-success">Clear</button>
                    <button type="button" wire:click='closeModal' class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Delete Student Modal -->
<div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1"
    aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='closeModal'
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='destroyStudent'>
                @csrf
                <div class="modal-body">

                    <h4>Are you sure you want to delete this student?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click='closeModal' class="btn btn-secondary"
                        data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- view Student Modal -->
<div wire:ignore.self class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="viewStudentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewStudentModalLabel">Student Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='closeModal'
                    aria-label="Close"></button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body ml-3">
                            <table class="table table-bordered">

                                <tr>
                                    <th style="width:20%">ID</th>
                                    <td>{{ $student_id }}</td>
                                </tr>

                                <tr>
                                    <th style="width:20%">Name</th>
                                    <td>{{ $name }}</td>
                                </tr>

                                <tr>
                                    <th style="width:20%">Email</th>
                                    <td>{{ $email }}</td>
                                </tr>

                                <tr>
                                    <th style="width:20%">Course</th>
                                    <td>{{ $course }}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
