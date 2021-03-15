@extends('admin.layouts.app')

@section('content')
<h1> {{ $teste }} </h1>
<h2  style="margin-bottom:1rem"> Últimos cursos</h2>
@if(count($lastCourses)==0)
  <div class="text-center" style="color: #949699">
          <i class="fas fa-exclamation-circle" style="font-size: 10em"></i>
          <p class="mb-4 h2">Não há cursos cadastrados ainda.</p>
  </div>
@else
<div class="card-deck">
  @foreach($lastCourses as $course)

    <div class="card">
    <div class="card-header"><h4>{{$course->name}}</h4></div>
      @if(strstr($course->img_link, '://'))
          <img class="card-img-top" 
          style="height:300px; object-fit:cover ;margin-bottom:1rem" 
          src="{{$course->img_link}}" alt="Card image cap">
      @else
          <img class="card-img-top" 
          style="height:300px; object-fit:cover ;margin-bottom:1rem" 
          src="{{asset('storage/'.$course->img_link)}}" alt="Card image cap">
      @endif
      <div class="card-body">
      <div class="d-flex justify-content-between">
        <span>por <strong>
          @foreach ($course->users as $user)
              @if($user->pivot->course_id === $course->id) 
              {{ $user->name }}
              @endif
            @endforeach
        </strong></span>
        <a href="{{ route('courses.show', $course->slug ) }}" class="btn btn-primary">Ver curso</a>
        </div>
        <p class="card-text"><small class="text-muted">Criado em {{$course->created_at->format('d M Y')}}</small></p>
      </div>
    </div>
  @endforeach
</div>
@endif

@endsection