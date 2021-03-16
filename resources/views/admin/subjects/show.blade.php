@extends('admin.layouts.app')
@section('content')
    @component('admin.components.show')
        @slot('title', $subject->name)
        @slot('form')
            @include('admin.subjects.form', ['show' => true])
        @endslot
    @endcomponent
@endsection


@push('scripts')
    <script>
        $('.form-control').attr('readonly',true);
    </script>
@endpush