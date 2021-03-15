@extends('admin.layouts.app')
@section('content')
    @component('admin.components.display')
        @slot('title', $work->title)
        @slot('card') 
            @include('admin.works.card')
        @endslot
    @endcomponent
@endsection

