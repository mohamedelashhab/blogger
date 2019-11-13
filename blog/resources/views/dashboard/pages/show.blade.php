@extends('dashboard.layouts.app')


@section('content')

       
        <legend>Post Detail</legend>
    
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{$page->title??old('title')}}" class="form-control" id="title" disabled>
        </div>
 
    
        <div>
            <p>
                {!! $page->description !!}
            </p>
        </div>


@endsection