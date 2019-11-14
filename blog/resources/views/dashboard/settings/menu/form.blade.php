@extends('dashboard.layouts.app')


@section('content')
@if (!empty($menu))
    <form action="{{route('dashboard.menus.update', $menu->id)}}" method="POST" role="form" enctype="multipart/form-data">
    @method('put')
@else
    <form action="{{route('dashboard.menus.store')}}" method="POST" role="form" enctype="multipart/form-data">
@endif
        @csrf
        <legend>{{!empty($menu) ? "Edit menu": "Create menu"}}</legend>
     
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{$menu->title??old('title')}}" class="form-control" id="title" required>
        </div>
    
        <label for="url">Page:</label>
        <div class="form-group">
            <select name="url" class="form-control form-control-lg">
                    @foreach ($pages as $page)
                        <option value="{{$page->slug}}" {{!empty($menu) && ($menu->url==$page->slug)?"selected":""}}>{{$page->title}}</option>
                    @endforeach
            </select>
        </div>
        

        
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>
    <hr>
<br>
@endsection