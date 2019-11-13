@extends('dashboard.layouts.app')


@section('content')

       
        <legend>Post Detail</legend>
        @if(!empty($post))
            <div class="">
                    <img src='{{ asset("uploads/images/$post->image??''") }}' alt=' {{ asset("uploads/images/$post->image") }}'>
            </div>
        @endif

        
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{$post->title??old('title')}}" class="form-control" id="title" disabled>
        </div>
 
    
        <div>
            <p>
                {!! $post->description !!}
            </p>
        </div>

        
    
 
        
    </form>

@endsection