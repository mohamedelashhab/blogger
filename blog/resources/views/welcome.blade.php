@extends('dashboard.layouts.app')

@section('content')
   <ul>
       @foreach ($menus as $menu)
        <li>
            <a href="{{route('custome', $menu->url)}}">{{$menu->title}}</a>
        </li>
       @endforeach
       
   </ul>
@endsection