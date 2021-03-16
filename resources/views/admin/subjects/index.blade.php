@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('title', 'Assuntos')
        @slot('create', route('subjects.create')) 
        @slot('head')
            <th>Nome</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td class="options"> 
                                <a href="{{ route('subjects.edit', $subject->id ) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                            
                                <a href="{{ route('subjects.show', $subject->id ) }}" class="btn btn-dark"><i class="fas fa-search"></i></a>
                                <form action="{{ route('subjects.destroy', $subject->id) }}" class="form-delete" method="post">
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
    