@extends('layouts.app')

@section('content')

<h2 class="titre1">S'inscrire</h2>

<div class="information-contenu">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name" >{{ __('Name') }}</label>
                <br>
            <div >
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <br>


        <div class="centrer">
            <label for="email" >{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <br>


        <div>
            <label for="password" >{{ __('Password') }}</label>

            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <br>


        <div class="information-series">
            <label for="password-confirm" >{{ __('Confirm Password') }}</label>

            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <br>
        <div>
            <button type="submit">
                    S'inscrire <i class="fas fa-angle-double-right"></i>
            </button>
        </div>

        <br>

    </form>
</div>


@endsection
