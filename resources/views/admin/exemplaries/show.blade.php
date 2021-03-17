@extends('admin.layouts.app')
@section('content')
    @component('admin.components.show')
        @slot('title', $exemplary->code)
        @slot('form')
            @include('admin.exemplaries.form', ['show' => true])
        @endslot
    @endcomponent
@endsection


@push('scripts')
    <script>
        $('.form-control').attr('readonly',true);
    </script>
@endpush