@extends('dashboard.layouts.app')


@section('content')

        <legend>Create User</legend>
        
        <div class="form-group">
            <label for="">Name:</label>
            <input type="text" name="name" value="{{$user->name??old('name')}}" class="form-control" id="name" disabled>
        </div>
 
    
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{$user->email??old('email')}}"  class="form-control" id="email" disabled>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" name="password" value="{{ $user->password??old('password')}}"  class="form-control" id="password" disabled>
        </div>
    
 
        
      


@endsection