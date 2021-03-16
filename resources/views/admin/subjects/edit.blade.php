@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar ' . $subject->name)
        @slot('url', route('subjects.update', $subject->id))
        @slot('form')
            @include('admin.subjects.form')
        @endslot
    @endcomponent
@endsection