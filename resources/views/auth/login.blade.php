<link rel="stylesheet" href="{{asset("css/login.css")}}">
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
                    <h1>Welcome back!</h1>
                    <p>Please enter your details</p>
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
                                <p>Don't have an account ? <a class="signup-link" href="{{ route('register.step1') }}"> Sign up</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
