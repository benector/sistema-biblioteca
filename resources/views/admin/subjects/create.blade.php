@extends('admin.layouts.app')
@section('content')
    @component('admin.components.create')
        @slot('title', 'Cadastrar um assunto')
        @slot('url', route('subjects.store'))
        @slot('form')
            @include('admin.subjects.form')
        @endslot
    @endcomponent
@endsection
