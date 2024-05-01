    {{-- <link rel="stylesheet" href="{{asset("css/login.css")}}"> --}}
    <style>
        body, html {
        height: 100%;
        margin: 0;
        overflow: hidden;
        background: #d5cccc;
    }

    .maincontainer {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .container2 {
        display: flex;
        justify-content: center;
        width: 815px;
        margin: 0;
        padding: 0;
    }

    .container2 > img {
        width: 554px;
    }

    .user-box {
        position: relative;
        width: 400px;
    }

    .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #000000;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #000000;
        outline: none;
        background: transparent;
    }

    .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #000000;
        pointer-events: none;
        transition: .5s;
    }

    .user-box input:focus ~ label,
    .user-box input:valid ~ label {
        top: -20px;
        left: 0;
        color: #000000;
        font-size: 12px;
    }

    .logo > img{
        height: 110px;
        margin-bottom: 0;
    }

    .container1 {
        font-family: 'DM Sans', sans-serif;
        background: white;
        width: 625px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        justify-content: center;

    }

    .titles > h1 {
        font-size: 37px;
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 10px;
    }

    .titles > p {
        color: #4B4B4B;
        font-size: 14px;
        font-weight: 400;
        margin-top: 0;
        margin-bottom: 40px;
    }

    .verif {
        display: flex;
        justify-content: space-between;
    }

    .verif > .rememb >label{
        color: #000;
        font-size: 16px;
        font-weight: 400;
    }

    .verif > a {
        text-decoration: none;
        color: #4B4B4B;
        font-size: 16px;
        font-weight: 400;
    }

    .btn > button {
        margin-top: 47px;
        width: 410px;
        height: 60px;
        flex-shrink: 0;
        border-radius: 36px;
        background: #000;
        color: #FFF;
        font-size: 20px;
        font-weight: 700;
    }

    .verif > .rememb input {
        display: none;
    }

    .verif > .rememb label {
        position: relative;
        padding-left: 30px;
        cursor: pointer;
        color: #000;
        font-size: 16px;
        font-weight: 400;
    }

    .verif > .rememb label::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        border: 2px solid #000;
        background-color: #fff;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .verif > .rememb input:checked + label::before {
        background-color: #000;
        content: '\2713';
        font-size: 14px;
        color: #fff;
        text-align: center;
        line-height: 20px;
    }

    .btn > p {
        color: #4B4B4B;
        font-size: 16px;
        font-weight: 300;
        margin-top: 40px;
    }

    .btn > p > a {
        color: #000;
        font-size: 16px;
        font-weight: 700;
        text-decoration: none;
    }
    </style>
    <div class="">
        <div class="">
            <div class="maincontainer">
                <div class="container2">
                    <img src="images/people2.png" alt="">
                </div>
                <div class="container1">
                    <div class="logo">
                        <img src="images/ss.png" alt="Stuy sphere logo">
                    </div>
                    <div class="titles">
                        <h1>Content de vous revoir</h1>
                        <p>Veuillez entrer vos coordonnées</p>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="user-box">
                                <input id="email" type="email" name="email" autocomplete="email" value="{{ old('email') }}" required="">
                                <label for="email">Email</label>  
                                @error('email')
                                <div>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="user-box">
                                <input id="password" type="password" name="password" required autocomplete="current-password">
                                @error('password')
                                <div>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <label for="password">Password</label>
                            </div>
                            <div>
                                <div class="verif">
                                    <div class="rememb">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember"> {{ __('Remember Me') }}</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }} </a>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div class="btn">
                                    <button type="submit">{{ __('Login') }}</button>
                                    <p>Vous n'avez pas de compte ? <a class="signup-link" href="{{ route('register.step1') }}"> Sign up</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
