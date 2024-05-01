@extends('layouts.app') 

<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<style>
    /* Add these styles to your register.css file */

/* Style the select element */
.user-box select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    margin-bottom: 30px;
    border: none;
    border-bottom: 2px solid #000000; /* Set your desired border color */
    outline: none;
    background: transparent;
    appearance: none; /* Remove default styles on Firefox */
    -webkit-appearance: none; /* Remove default styles on Chrome and Safari */
    -moz-appearance: none; /* Remove default styles on Firefox */
}

/* Add a custom arrow icon for the select */
.user-box select::after {
    content: '\25BC'; /* Unicode character for a down arrow */
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 14px;
    color: #000000; /* Set your desired arrow color */
    pointer-events: none;
}

/* Change select styles on focus */
.user-box select:focus {
    border-bottom: 2px solid #000000; /* Set your desired border color on focus */
}

/* Change select styles when valid */
.user-box select:valid {
    border-bottom: 2px solid #000000; /* Set your desired border color when valid */
}

</style>

<div class="maincontainer">
    <div class="container2">
        <img src="{{ asset("images/people3.png") }}" alt="">
    </div>
    <div class="container1">
        <div class="logo">
            <img src="{{ asset("images/study sphere logo.png") }}" alt="Study sphere logo">
        </div>
        <div class="titles">
            <h1>Commencez avec  <br/>Study sphere</h1>
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
                        <option value="" disabled selected>Genre</option>
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
                    <button type="submit">Suivant</button>
                </div>
                <div>
                    <div class="btn">
                        <p>Vous avez déja un compte ? <a class="signup-link" href="{{ route('login') }}">Log in</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
