@extends('admin.layouts.app')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection 
@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar ' . $work->name)
        @slot('url', route('works.update', $work->slug))
        @slot('form')
            @include('admin.works.form')
        @endslot
    @endcomponent
@endsection