@extends('layout/layout')
@section('konten')
<h3 class="text-center">Register Pages</h3>
<form method="POST" action="/create_register">
    @csrf
    <div class="form-outline mb-4">
        <input type="text" name="name" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Full Name</label>
    </div>
    <div class="form-outline mb-4">
        <input type="email" name="email" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Email address</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" name="username" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Username</label>
    </div>
    <div class="form-outline mb-4">
        <input type="password" name="password" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
    </div>
    <div class="form-outline mb-4">
        <select name="role" class="form-control" id="">
            <option value="1">superadmin</option>
            <option value="2">admin</option>
            <option value="3">pegawai</option>
        </select>
    </div>
    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Register</button>
    
    <!-- Register buttons -->
    <div class="text-center">
        <p>Not a member? <a href="/login">Login</a></p>
    </div>
</form>
@endsection