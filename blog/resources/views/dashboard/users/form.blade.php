@extends('dashboard.layouts.app')


@section('content')
@if (!empty($user))
    <form action="{{route('dashboard.users.update', $user->id)}}" method="POST" role="form" enctype="multipart/form-data">
    @method('put')
@else
    <form action="{{route('dashboard.users.store')}}" method="POST" role="form" enctype="multipart/form-data">
@endif
        @csrf
        <legend>Create User</legend>
        
        <div class="form-group">
            <label for="">Name:</label>
            <input type="text" name="name" value="{{$user->name??old('name')}}" class="form-control" id="name" required>
        </div>
 
    
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{$user->email??old('email')}}"  class="form-control" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" value="{{$user->password??old('password')}}"  class="form-control" id="password" required>
        </div>
    
 
        
        <button type="submit" class="btn btn-primary">Submit</button>
        

    </form>

    <hr>


@endsection