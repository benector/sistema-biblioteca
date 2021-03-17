<div class="card-body">
    <div class="row">
        <div class="col-sm text-center">
            @if(strstr($work->img, '://'))
              <img class="card-img-top d-flex align-self-center" 
              style="max-width:60%;margin-bottom:1rem" 
              src="{{$work->img}}" alt="Card image cap">
            @else
            <img class="card-img-top" 
              style="max-width:60%;margin-bottom:1rem" 
              src="{{asset('images/'.$work->img) }}" alt="Card image cap">
            @endif
    <!--<h5 class="card-title">Curso: </h5>-->
        </div>
        <div class="col-sm ">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Titulo</strong> {{$work->title}}
                </li>
                <li class="list-group-item"><strong>Categoria:</strong> {{$work->category->name}}</li>
                <li class="list-group-item"><strong>Assunto:</strong> {{$work->subject->name}}</li>
                <li class="list-group-item"><strong>Nº páginas:</strong> {{$work->pages}}</li>
                <li class="list-group-item"><strong>Ano:</strong> {{$work->year}}</li>
                <li class="list-group-item"><strong>Edição:</strong> {{$work->edition}}</li>
                <li class="list-group-item"><strong>Exemplares:</strong> {{count($work->exemplaries)}}</li>
                <a href="{{ route('works.edit', $work->id) }}" class="text-center">
                  <button type="button" class="btn btn-primary mt-3">
                     <b>Editar</b>
                  </button>
                </a>

            

            <ul>
        </div>
    </div>
    <hr>
    <div class="row">
           <div class="col-sm">
           <strong>Sinopse:</strong> 
                    {!! $work->resume!!}   
           </div>
        
    </div>

</div>

