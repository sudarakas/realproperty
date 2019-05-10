<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Your Password - RealProperty.lk</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css"> {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">

</head>

<body class="grayme">

    <div class="column is-full colorbar">
        {{-- top color bar goes here --}}
    </div>
    <br>
    <div class="columns fulllogin is-centered">
        <div class="column is-two-thirds leftsideeffect">
            <a href="/">
                <figure class="image is-blacklogo">
                    <img src="/img/logoblack.png" width="112" height="28">
                </figure>
            </a>
            <div class="is-mobile textboxlogin">
                <p class="subtitle has-text-dark is-6 has-text-centered">{{ ('Hi! User') }}</p>
                <p class="title has-text-primary is-4 has-text-centered">{{ __('Reset Your Password') }}</p>
            </div>
            <div class="columns is-mobile is-centered">
                <div class="column is-half">
                    @if (session('resent'))
                    <div class="notification is-success is-size-7">
                        <button class="delete"></button> {{ __('A fresh verification link has been sent to your email address.')
                        }} </div>
                    @endif
                </div>
            </div>
            <div class="column is-8 is-offset-2">
                    <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
        
                            <div class="field">
                                <label for="email" class="label">{{ __('E-Mail Address') }}</label>
        
                                <div class="control has-icons-left">
                                    <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                    <span class="icon is-small is-left">
                                            <i class="fas fa-at"></i>
                                          </span>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
        
                            <div class="field">
                                <label for="password" class="label">{{ __('Password') }}</label>
        
                                <div class="control has-icons-left">
                                    <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <span class="icon is-small is-left">
                                            <i class="fas fa-lock"></i>
                                          </span>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
        
                            <div class="field">
                                <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
        
                                <div class="control has-icons-left">
                                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                                    <span class="icon is-small is-left">
                                            <i class="fas fa-lock"></i>
                                          </span>
                                </div>
                            </div>
        
                            <div class="field">
                                <div class="column is-offset-4">
                                    <button type="submit" class="button is-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
            </div>
            </div>
        </div>
    </div>


    {{-- Footer --}}
    @include('layouts.footer') {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                $notification = $delete.parentNode;
                $delete.addEventListener('click', () => {
                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>
</body>

</html>