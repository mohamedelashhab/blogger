@extends('layouts.app')

@section('content')


@foreach ($posts as $post)
    <div class="card">
    <div class="card-header">
            {{$post->title}}
        </div>
        <div class="card-body">
            <h5 class="card-title">
                    <img src='{{ asset("uploads/images/$post->image??''") }}' alt=' {{ asset("uploads/images/$post->image") }}'>
            </h5>
            <p class="card-text">{!! str_limit($post->description, $limit=50, $end=".....") !!} <a href="{{route('posts.show', $post->id)}}">Read more</a> </p>
        </div>
    </div>
    <hr>
@endforeach

{!! $posts->render() !!}
@endsection

