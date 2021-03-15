@extends('admin.layouts.app')
@section('content')
    @component('admin.components.table')
        @slot('title', 'Cursos')
        @slot('create', route('courses.create'))
        @slot('head')
            <th>Nome</th>
            <th>Categoria</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($courses as $course)

                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->category->name }}</td>
                        <td class="options">
                        @foreach($course->users as $user)
                               @can('update',$user)
                                <a href="{{ route('courses.edit', $course->slug ) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                               @endcan
                                <a href="{{ route('courses.show', $course->slug ) }}" class="btn btn-dark"><i class="fas fa-search"></i></a>
                               @can('delete',$user)
                                <form action="{{ route('courses.destroy', $course->slug) }}" class="form-delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                @endcan
                        @endforeach
                        </td>
                    </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection

@push('scripts')
        <script src="{{ asset('js/components/dataTable.js') }}"></script>
        <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
    