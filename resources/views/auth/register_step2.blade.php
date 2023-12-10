@extends('layouts.app') 

<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="maincontainer">
    <div class="container2">
        <img src="{{ asset("images/people3.png") }}" alt="">
    </div>
    <div class="container1">
        <div class="logo">
            <img src="{{ asset("images/study sphere logo.png") }}" alt="Study sphere logo">
        </div>
        <div class="titles">
            <h1>Get started with <br/>Study sphere</h1>
        </div>
        <div>
            <form method="POST" action="{{ route('register.step2') }}" target="_self">
                @csrf
                <div class="user-box">
                    <input id="username" type="text" name="username" class="@error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                    <label for="username">Username</label>
                    @error('username')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="user-box">
                    <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                    <label for="email">Email</label>
                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="user-box">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <label for="password">Password</label>
                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="user-box">
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                    <label for="password-confirm">Confirm Password</label>
                </div>
                <div class="btn">
                    <button type="submit">Sign up</button>
                    <p>Already have an account? <a class="signup-link" href="{{ route('login') }}"> Log in</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
