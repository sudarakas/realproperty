<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Join Now - RealProperty.lk</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css"> {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">

</head>

<body class="grayme">

    <div class="column is-full colorbar">
        {{-- top color bar goes here --}}
    </div>
    <br>
    <div class="columns fulllogin">
        <div class="column is-offset-1 is-half leftsideeffect">
            <a href="/">
                <figure class="image is-blacklogo">
                    <img src="img/logoblack.png" width="112" height="28">
                </figure>
            </a>
            <div class="is-mobile textboxlogin">
                <p class="title has-text-primary is-4 has-text-centered">Sign into your account</p>
                <p class="subtitle  has-text-centered is-size-7 tinytextlogin">Enter your email and password to login
                    your realproperty accoount.</p>
            </div>
            <div class="loginform">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <p class="control has-icons-left">
                            <input
                                class="input {{ $errors->has('name') ? ' is-danger' : '' }} is-primary inputline is-medium"
                                id="name" type="text" value="{{ old('name') }}" name="name" placeholder="Name"
                                autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span> @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="has-text-danger">{{ $errors->first('name') }}</strong>
                            </span> @endif
                        </p>
                    </div>

                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input
                                class="input {{ $errors->has('email') ? ' is-danger' : '' }} is-primary inputline is-medium"
                                id="email" type="email" value="{{ old('email') }}" name="email"
                                placeholder="Email Address" autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span> @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="has-text-danger">{{ $errors->first('email') }}</strong>
                            </span> @endif
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input
                                class="input {{ $errors->has('password') ? ' is-danger' : '' }} is-primary inputline is-medium"
                                id="password" type="password" name="password" placeholder="Password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="has-text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </p>
                    </div>

                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="password-confirm" type="password" class="input is-primary inputline is-medium"
                                name="password_confirmation" placeholder="Confirm Password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    {{-- <div class="field">
                            <div class="file has-name">
                                <label class="file-label">
                                <input class="file-input image"  id="image" type="file" name="image" class="is-medium">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                        <span class="file-label">
                                        Profile Picture
                                    </span>
                                </span>
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="has-text-danger">{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
            </div>
        </div> --}}
        <br>
        {{-- <div class="field googlerecapture">
            <p>
                @if(env('GOOGLE_RECAPTCHA_KEY'))
                <div class="g-recaptcha googlerecaptcha" id="googlerecaptcha"
                    data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
    </div>
    @endif
    @if ($errors->has('googlerecaptcha'))
    <span class="invalid-feedback" role="alert">
        <strong class="has-text-danger">{{ $errors->first('googlerecaptcha') }}</strong>
    </span>
    @endif
    </p>
    </div> --}}
    <div class="field ">
        <p class="control has-text-centered is-centered loginbutton">
            <button type="submit" class="button is-primary is full is-uppercase">
                &nbsp; &nbsp; &nbsp; &nbsp; Sign Up &nbsp; &nbsp; &nbsp; &nbsp;
            </button>
        </p>
    </div>
    <input type="hidden" name="recaptcha" id="recaptcha">
    </form>
    @if(session()->has('message'))
    <div class="">
        <h1 class="is-size-7 has-text-weight-bold has-text-danger"><b> {{ session()->get('message') }}</b></h1>
    </div>
    @endif
    <script src="https://www.google.com/recaptcha/api.js?render=6LfXZK4UAAAAAFEXFJDiBg45M3Qf4dwXihIUIWvV"></script>
    <script>
        grecaptcha.ready(function(){
                        grecaptcha.execute('6LfXZK4UAAAAAFEXFJDiBg45M3Qf4dwXihIUIWvV',{action: 'login'}).then(function(token){
                            if(token){
                                document.getElementById('recaptcha').value = token;
                            }
                        });
                    });
    </script>
    </div>
    </div>
    <div class="column is-one-third rightsideeffect has-background-primary">
        <div class="is-mobile textboxlogin textareabox">
            <p class="title has-text-white is-4 has-text-centered">Hello, friend</p>
            <p class="subtitle  has-text-white has-text-centered is-size-7 tinytextlogin">Enter your detail and start a
                jouney with us.</p>

        </div>
        <div class="is-centered has-text-centered">
            <a class="button is-invertedis-uppercase is-outlined signupbuttonloginpage" href="login">&nbsp; &nbsp;
                &nbsp; &nbsp; Sign In &nbsp; &nbsp; &nbsp; &nbsp;</a>
        </div>

    </div>
    </div>


    {{-- Footer --}}
    @include('layouts.footer')


    {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>















{{-- <div class="columns is-mobile is-centered">
    <div class="column is-one-fifth">
        <p class="bd-notification is-primary">
            <figure class="image is-3by1 is-centered">
                <img src="https://bulma.io/images/placeholders/128x128.png">
            </figure>
        </p>
    </div>
</div>
<div class="is-mobile is-centered has-text-centered textboxlogin">
    <p class="title has-text-centered is-3 is-spaced">Sign into your account</p>
    <p class="subtitle  has-text-centered is-6">Enter your email and password to login your realproperty accoount to enjoy the great realproperty services.
    <br> you need any futher assistant, please do not hesitate to contact us.</p>
</div>
<div class="columns is-mobile is-centered loginbox is-vcentered">
    <div class="column is-two-fifths loginform">
        <form method="POST" action="{{ route('login') }}">
@csrf
<div class="field">
    <p class="control has-icons-left has-icons-right">
        <input class="input {{ $errors->has('email') ? ' is-danger' : '' }} is-primary" id="email" type="email"
            value="{{ old('email') }}" name="email" placeholder="Email" autofocus>
        <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
        </span> @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $errors->first('email') }}</strong>
        </span> @endif
    </p>
</div>
<div class="field">
    <p class="control has-icons-left">
        <input class="input {{ $errors->has('password') ? ' is-danger' : '' }} is-primary" id="password" type="password"
            name="password" placeholder="Password" required>
        <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
        </span> @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $errors->first('password') }}</strong>
        </span> @endif
    </p>
</div>
<div class="field">
    <label class="checkbox">
        <input type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}> Remember me
    </label>
</div>
<div class="field">
    <p class="control">
        <button class="button is-primary is full">
            Login
        </button>
        <br>
        @if (Route::has('password.request'))
        <a class="has-text-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </p>
</div>

</form>
</div>
<div class="column is-two-fifths image loginimg"><br></div>
</div> --}}