@extends('dashboard.layouts.app')


@section('content')

    <form action="{{route('dashboard.settings.post')}}" method="POST" role="form" >
        @csrf
        <legend>Site Name</legend>
     
        <div class="form-group">
            <label for="site_name">site name:</label>
            <input type="text" name="site_name" value="{{$site_name}}" class="form-control" id="title" required>
        </div>
    
      
        
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>
    <hr>
<br>
@endsection