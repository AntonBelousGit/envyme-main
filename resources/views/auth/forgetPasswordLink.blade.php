@extends('layout.app')
@section('content')
    <section class="registry_content">
        <div class="wrap_form_reg">
            <div class="fr_title">
                {{--                <span>{{ __('auth.sign_in')}}</span>--}}
                <span>Reset Password</span>

            </div>
            <form action="{{ route('reset.password.post') }}" method="POST" class="form_reg in">
                @csrf
                <div class="fr_inputs fr_inputs_my">
                    <input type="hidden" name="tokenservice" value="{{ $token }}">
                    <div class="fr_wrap_inp">
                        <input type="text" id="email_address" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Password confirm" required>
                    </div>
                </div>
                <button type="submit" class="btn_akk">
                    {{--                    {{ __('auth.sign_in')}}--}}
                    Reset Password
                </button>

            </form>
        </div>
    </section>
@endsection
