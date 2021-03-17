@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('title', 'Exemplares da obra '. $work->title)
        @slot('create', route('exemplaries.create')) 
        @slot('head')
            <th>Nome</th>
            <th></th>
        @endslot
        @slot('body')
            @if($results)
                @foreach($exemplaries as $exemplary)
                        <tr>
                            <td>{{ $exemplary->code }}</td>
                            <td class="options"> 
                                    <a href="{{ route('exemplaries.edit', $exemplary->id ) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                
                                    <a href="{{ route('exemplaries.show', $exemplary->id ) }}" class="btn btn-dark"><i class="fas fa-search"></i></a>
                                    <form action="{{ route('exemplaries.destroy', $exemplary->id) }}" class="form-delete" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                            </td>
                        </tr>
                @endforeach
            @endif
        @endslot
    @endcomponent
@endsection

@push('scripts')
        <script src="{{ asset('js/components/dataTable.js') }}"></script>
        <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
    