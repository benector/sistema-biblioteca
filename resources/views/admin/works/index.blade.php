@extends('admin.layouts.app')
@section('content')
    @component('admin.components.table')
        @slot('title', 'Obras')
        @slot('create', route('works.create'))
        @slot('head')
            <th>Nome</th>
            <th>Categoria</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($works as $work)

                    <tr>
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->category }}</td>
                        <td class="options">
                                <a href="{{ route('works.edit', $work->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('works.show', $work->id ) }}" class="btn btn-dark"><i class="fas fa-search"></i></a>
                                <form action="{{ route('works.destroy', $work->id) }}" class="form-delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
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
    