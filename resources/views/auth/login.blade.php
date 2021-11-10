@extends('layout.app')
@section('content')
<section class="registry_content">
    {{-- <div class="sign_in"><span class="close"></span>
        <div class="sign_in__name">Sign in</div>
        <form class="sign_in__form" action="{{route('login')}}" method="POST">

            <input type="text" name="nickname" placeholder="Nickname">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Sign in">
            <p>Do you have an account? <a href="">Sign Up</a></p>
        </form>
    </div> --}}
    <div class="wrap_form_reg">
        <div class="fr_title">
            <span>{{ __('auth.sign_in')}}</span>

        </div>
        <form action="{{route('login')}}" method="POST" class="form_reg in">
            @csrf
            <div class="fr_inputs">
                <div class="fr_wrap_inp">
                    <input type="text" name="nickname" placeholder="{{ __('auth.name')}}" required>
                </div>
                <div class="fr_wrap_inp">
                    <input type="password" name="password" placeholder="{{ __('auth.password')}}" required>
                </div>
            </div>
            <button class="btn_akk">
                {{ __('auth.sign_in')}}
            </button>
            <p class="fr_text">
                {{ __('auth.an_account')}}
                <a href="{{route('register')}}">{{ __('auth.register')}}</a>
            </p>
            <a href="{{route('forget.password.get')}}" class="f_pas">Forgot password?</a>
        </form>
    </div>
</section>
@endsection
