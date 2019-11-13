@extends('dashboard.layouts.app')


@section('content')
@if (!empty($page))
    <form action="{{route('dashboard.pages.update', $page->id)}}" method="POST" role="form" enctype="multipart/form-data">
    @method('put')
@else
    <form action="{{route('dashboard.pages.store')}}" method="POST" role="form" enctype="multipart/form-data">
@endif
        @csrf
        <legend>{{!empty($page) ? "Edit Page": "Create Page"}}</legend>
     
        <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{$page->title??old('title')}}" class="form-control" id="title" required>
        </div>
    
        <div class="form-group">
                <label for="summernote">description</label>
                <textarea name="description" id="summernote" class="summernote" class="form-control" rows="8">{!!$page->description??old('description') !!}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

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
    
