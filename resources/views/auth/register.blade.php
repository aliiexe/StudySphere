<link rel="stylesheet" href="{{asset("css/register.css")}}">
<div class="maincontainer">
    <div class="container2">
        <img src="images/people3.png" alt="">
    </div>
    <div class="container1">
        <div class="logo">
            <img src='{{ asset("images/ss.png") }}' alt="Stuy sphere logo">
        </div>
        <div class="titles">
            <h1>Get started with <br/>
                Study sphere</h1>
        </div>
        <div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="user-box">
                    <input id="name" type="text" name="name" class="@error('name') is-invalid @enderror" autocomplete="email" value="{{ old('name') }}" required autocomplete="name">
                    <label for="name">Full name</label>
                    @error('name')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="user-box">
                    <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" required>
                    <label for="name">Email</label>
                    @error('name')
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
                    <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                    <label for="password-confirm">Confirm Password</label>
                </div>
                <div class="btn">
                    <button type="submit">Sign up</button>
                    <p>Already have an account ? <a class="signup-link" href="{{ route('login') }}"> Log in</a></p>
                </div>
            </form>
        </div>
    </div>
</div>