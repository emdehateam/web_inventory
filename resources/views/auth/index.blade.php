@extends('layout/layout')
@section('konten')
<h3 class="text-center">Login Pages</h3>
<div class="m-1">
    @include('layout/message')
</div>
<form method="POST" action="create_login">
    <!-- Email input -->
    @csrf
    <div class="form-outline mb-4">
        <input type="email" name="email" id="form2Example1" class="form-control" value="{{ Session::get('email') }}" />
        <label class="form-label"  for="form2Example1">Email address</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" name="username" id="form2Example1" class="form-control" value="{{ Session::get('username') }}"/>
        <label class="form-label"  for="form2Example1">Username</label>
    </div>
    
    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" name="password" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
    </div>
    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Login</button>
    
    <!-- Register buttons -->
    <div class="text-center">
        <p>Not a member? <a href="/register">Register</a></p>
    </div>
</form>
@endsection