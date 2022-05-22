@extends('layouts.app')

@section('content')
    <div>
        <livewire:student-livewire>
    </div>
@endsection


@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $("#studentModal").modal("hide");
            $("#updateStudentModal").modal("hide");
        })
    </script>
@endsection