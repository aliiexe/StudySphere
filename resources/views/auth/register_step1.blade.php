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
            <form method="POST" action="{{ route('register.step1') }}" target="_self">
                @csrf
                <div class="user-box">
                    <input id="nom" type="text" name="nom" class="@error('nom') is-invalid @enderror" value="{{ old('nom') }}" required>
                    <label for="nom">Nom</label>
                    @error('nom')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="user-box">
                    <input id="prenom" type="text" name="prenom" class="@error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" required>
                    <label for="prenom">Prenom</label>
                    @error('prenom')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="user-box">
                    <select style="margin-top: 10px;" id="genre" name="genre" class="@error('genre') is-invalid @enderror" required>
                        <option value="" disabled selected>Select your genre</option>
                        <option value="Male" {{ old('genre') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('genre') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('genre')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="user-box">
                    <input id="date_de_naissance" type="date" name="date_de_naissance" class="@error('date_de_naissance') is-invalid @enderror" value="{{ old('date_de_naissance') }}">
                    <label for="date_de_naissance">Date de naissance</label>
                    @error('date_de_naissance')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="btn">
                    <button type="submit">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>
