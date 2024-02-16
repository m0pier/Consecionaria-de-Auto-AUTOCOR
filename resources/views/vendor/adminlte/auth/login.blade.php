<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesion</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="logindise/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="logindise/css/style.css">
</head>

<body>
    @php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
    @php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))
    @php($password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset'))

    @if (config('adminlte.use_route_url', false))
        @php($login_url = $login_url ? route($login_url) : '')
        @php($register_url = $register_url ? route($register_url) : '')
        @php($password_reset_url = $password_reset_url ? route($password_reset_url) : '')
    @else
        @php($login_url = $login_url ? url($login_url) : '')
        @php($register_url = $register_url ? url($register_url) : '')
        @php($password_reset_url = $password_reset_url ? url($password_reset_url) : '')
    @endif

    <div class="main">

        <!-- Sign in form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="logindise/images/AUTOCOR.png" alt="sing up image"></figure>
                        {{-- <a href="{{ $register_url }}"
                            class="signup-image-link">{{ __('adminlte::adminlte.register_a_new_membership') }}</a> --}}

                        {{-- Password reset link --}}
                        @if (Route::has('password.request'))
                            <p class="my-0">
                                <a href="{{ route('password.request') }}">
                                    {{ __('adminlte::adminlte.i_forgot_my_password') }}
                                </a>
                            </p>
                        @endif
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Iniciar sesion</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{ $login_url }}">
                            @csrf
                            {{-- email --}}
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}"
                                    autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- password --}}
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="{{ __('adminlte::adminlte.password') }}" />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label for="remember-me"
                                    class="label-agree-term"><span><span></span></span>{{ __('adminlte::adminlte.remember_me') }}</label>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="signin" id="signin"
                                    class="form-submit btn-flat btn-primary btn-flat btn-primary {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}"
                                    value="Log in">{{ __('adminlte::adminlte.sign_in') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="logindise/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
