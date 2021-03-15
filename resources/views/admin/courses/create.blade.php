@extends('admin.layouts.app')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection 
@section('content')
    @component('admin.components.create')
        @slot('title', 'Cadastrar um curso')
        @slot('url', route('courses.store'))
        @slot('form')
            @include('admin.courses.form')
        @endslot
    @endcomponent
@endsection
