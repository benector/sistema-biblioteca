@extends('admin.layouts.app')
@section('content')
    @component('admin.components.create')
        @slot('title', 'Cadastrar um exemplar')
        @slot('url', route('exemplaries.store'))
        @slot('form')
            @include('admin.exemplaries.form')
        @endslot
    @endcomponent
@endsection
