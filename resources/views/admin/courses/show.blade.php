@extends('admin.layouts.app')
@section('content')
    @component('admin.components.display')
        @slot('title', $course->name)
        @slot('card') 
            @include('admin.courses.card')
        @endslot
    @endcomponent
@endsection

