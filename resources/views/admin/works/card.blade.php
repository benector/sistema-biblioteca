<div class="card-body">
    <div class="row">
        <div class="col-sm">
            @if(strstr($work->img, '://'))
              <img class="card-img-top d-flex align-self-center" 
              style="max-width:50%;margin-bottom:1rem" 
              src="{{$work->img}}" alt="Card image cap">
            @else
            <img class="card-img-top" 
              style="max-width:100%;margin-bottom:1rem" 
              src="{{asset('storage/'.$work->img) }}" alt="Card image cap">
            @endif
    <!--<h5 class="card-title">Curso: </h5>-->
       
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Titulo</strong> {{$work->title}}
                </li>
                <li class="list-group-item"><strong>Categoria:</strong> {{$work->category->name}}</li>
                <li class="list-group-item"><strong>Assunto:</strong> {{$work->subject->name}}</li>
                <li class="list-group-item"><strong>Nº páginas:</strong> {{$work->pages}}</li>
                <li class="list-group-item"><strong>Ano:</strong> {{$work->year}}</li>
                <li class="list-group-item"><strong>Edição:</strong> {{$work->edition}}</li>

            

              <ul>
        </div>
        <div class="col-sm ">
          <div class="row">
          <strong>Sinopse:</strong> 
                {!! $work->resume!!}   
          </div> 
          <div class="row mt-5 d-flex justify-content-center align-items-center">
          <a href="{{ route('works.edit', $work->id) }}">
                <button type="button" class="btn btn-primary">
                  <b>Editar</b>
                </button>
          </a>
          </div>
     
        </div>
    </div>

</div>

