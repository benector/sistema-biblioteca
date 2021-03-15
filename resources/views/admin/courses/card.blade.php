<div class="card-body">
@if(strstr($course->img_link, '://'))
  <img class="card-img-top" 
  style="height:300px; object-fit:cover ;margin-bottom:1rem" 
  src="{{$course->img_link}}" alt="Card image cap">
@else
<img class="card-img-top" 
  style="height:300px; object-fit:cover ;margin-bottom:1rem" 
  src="{{asset('storage/'.$course->img_link)}}" alt="Card image cap">
@endif
    <!--<h5 class="card-title">Curso: </h5>-->
         <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Curso:</strong> {{$course->name}}
          </li>
          <li class="list-group-item"><strong>Categoria:</strong> {{$course->category->name}}</li>
          <li class="list-group-item"><strong>Criado por:</strong>
          @foreach ($users as $user)
            @if($user->pivot->course_id === $course->id) 
            {{ $user->name }}
            @endif
          @endforeach
          </li>

          <li class="list-group-item"><strong>Descrição</strong>
          {!! $course->description !!}    
          </li>
</div>
<iframe height="315"  src="{{$course->video}}"
    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen></iframe>  

    @foreach($course->users as $user)
                @can('update',$user)
                <a  href="{{ route('courses.edit', $course->slug ) }}" class="btn btn-primary">Editar curso</a>
                @endcan
     @endforeach
