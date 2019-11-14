@extends('dashboard.layouts.app')


@section('content')
@if (!empty($post))
    <form action="{{route('dashboard.posts.update', $post->id)}}" method="POST" role="form" enctype="multipart/form-data">
    @method('put')
@else
    <form action="{{route('dashboard.posts.store')}}" method="POST" role="form" enctype="multipart/form-data">
@endif
        @csrf
        <legend>{{!empty($post) ? "Edit Post": "Create Post"}}</legend>
        @if(!empty($post))
            <div class="">
                    <img src='{{ asset("uploads/images/$post->image??''") }}' alt=' {{ asset("uploads/images/$post->image") }}'>
            </div>
        @endif
        <div class="form-group">
                <label for="image">image:</label>
                    <input type="file" name="image"   class="form-control">
        </div>
        
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{$post->title??old('title')}}" class="form-control" id="title" required>
        </div>
 
    
        <div class="form-group">
                <label for="summernote">description</label>
                <textarea name="description" id="summernote" class="summernote" class="form-control" rows="3">{!!$post->description??old('description') !!}</textarea>
        </div>

        
    
 
        
        <button type="submit" class="btn btn-primary">Submit</button>
        

    </form>
    <hr>
    <br>

@endsection

@push('js-script')
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
        $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
@endpush
    
