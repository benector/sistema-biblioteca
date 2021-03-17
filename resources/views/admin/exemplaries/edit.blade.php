@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar exemplar' . $exemplary->code)
        @slot('url', route('exemplaries.update', $exemplary->id))
        @slot('form')
            @include('admin.exemplaries.form')
        @endslot
    @endcomponent
@endsection