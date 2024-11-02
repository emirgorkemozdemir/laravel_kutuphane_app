@extends('layouts.app')

@section('content')
    <h1>Register</h1>

    <form action="{{ url('register') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br>
        <button type="submit">Register</button>
    </form>
@endsection
