@extends('layouts.app')

@section('content')
    <div>
        <livewire:image-upload-livewire />
        <livewire:student-livewire />
    </div>
@endsection


@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $("#studentModal").modal("hide");
            $("#updateStudentModal").modal("hide");
            $("#deleteStudentModal").modal("hide");

        })
    </script>
@endsection
