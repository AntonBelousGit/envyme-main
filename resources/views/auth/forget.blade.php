@extends('layout.app')
@section('content')
    <section class="registry_content">
        <div class="wrap_form_reg">
            <div class="fr_title">
{{--                <span>{{ __('auth.sign_in')}}</span>--}}
                <span>Reset Password</span>

            </div>
            <form action="{{route('forget.password.post')}}" method="POST" class="form_reg in">
                @csrf
                <div class="fr_inputs">
                    <div class="fr_wrap_inp">
                        <input type="text" name="email" placeholder="email" required>
                    </div>
                </div>
                <button class="btn_akk">
{{--                    {{ __('auth.sign_in')}}--}}
                    Send Password Reset Link
                </button>

            </form>
        </div>
    </section>
@endsection
