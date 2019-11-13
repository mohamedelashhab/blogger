@extends('layouts.app')


@section('content')
    
    <div class="card text-center">
        <div class="card-header">
          Post Detail
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <h5 class="card-title">
                <img src='{{ asset("uploads/images/$post->image??''") }}' alt=' {{ asset("uploads/images/$post->image") }}'>
          </h5>
          <p class="card-text">{!!$post->description!!}</p>
          
        </div>
        <div class="card-footer text-muted">
          {{$post->created_at->diffForHumans()}}
        </div>
    </div>

@endsection