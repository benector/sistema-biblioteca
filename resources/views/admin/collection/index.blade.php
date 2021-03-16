@extends('admin.layouts.app')
@section('content')
    <div class="header-collection mb-5" style = "text-align:center">
        <h1 class="mb-5"> Acervo</h1>
        <form id="form-buscar" action="{{route('search')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                    <div class="col-sm">
                        <div class="row-2">
                        Título da obra

                        <div>
                            <input type="text" name="title" class="text w-90"/>
                            <button type="submit" form="form-buscar" class="btn btn-primary">Buscar</button>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        Categoria: 
                        <select name="category_id" id="category_id" class="form-control select2">
                            <option value = -1>
                            Escolha uma categoria
                            </option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        Assunto: 
                        <select name="subject_id" id="subject_id" class="form-control select2">
                        <option value = -1>
                            Escolha um assunto
                            </option>
                        @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">
                                {{$subject->name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                 
                  

                
            </div>
           

        </form>

        <div class="row">
            <h5 class="mt-5" style="float:left">   

           
               
         @isset($results)
            <p> Você buscou por:  

            @isset($title)
            título {{ $title }} 

            @endisset

            @isset($category_id)
                - categoria {{ $category_id-> name }} 
            @endisset
            @isset($subject_id)
                - assunto {{ $subject_id -> name}}
            @endisset
            
            </p>
            @if($results)
             Exibindo {{ $results }}  resultados
            @else
            Não foram encontrados resultados para essa busca. 
            @endif            
        @endisset
        </h5>

        </div>

    </div>

    <div class="card-columns">
    @foreach ($works as $work)
        <div class="card h-100" style="background-color: transparent;border:none;text-align:center">
            @if(strstr($work->img, '://'))
                <img class="card-img-top w-50" src={{$work->img}} alt="Card image cap">

            @else
            <img class="card-img-top w-50" src="{{asset('storage/' .$work->img)}}" alt="Card image cap">


            @endif
            <div class="card-body" >
                <h5 class="card-title" style="float:none"><b>{{$work->title}}</b></h5>
                <p class="card-text">Autor(es): {{$work->authors}}</p>
                <a href="{{route('works.show', $work->id)}}" class="btn btn-primary">Visitar</a>
            </div>
        </div>
     @endforeach
    </div>


@endsection