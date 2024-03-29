@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', __('adminlte::adminlte.verify_message'))

@section('auth_body')

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('adminlte::adminlte.verify_email_sent') }}
        </div>
    @endif

    {{ __('adminlte::adminlte.verify_check_your_email') }}
    {{ __('adminlte::adminlte.verify_if_not_recieved') }},

    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-success mt-4">
            {{ __('adminlte::adminlte.verify_request_another') }}
        </button>.
    </form>

    <div class="container">
        <a href="{{ route('profile.show') }}"
            class="btn btn-link p-0 m-0 align-baseline">
            {{ __('Edit Profile') }}</a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                    {{ __('Log Out') }}
                </button>
            </form>
    </div>


@stop


