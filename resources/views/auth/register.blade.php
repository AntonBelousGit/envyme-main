@extends('layout.app')
    <!-- END Header-->
@section('content')
    <section class="registry_content" s>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <div class="wrap_form_reg">
            <div class="fr_title">
                <span>Sign Up</span>

            </div>
            <form action="{{route('userStore')}}" method="POST" class="form_reg">
                @csrf
                <div class="fr_inputs">
                    <div class="fr_wrap_inp">
                        <input type="text" name="name" placeholder="Name" required value="{{old('name')}}">
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="text" name="surname" placeholder="Surname" required value="{{old('surname')}}">
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="text" name="nickname" placeholder="Nickname" required value="{{old('nickname')}}">
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="date" name="birthday" id="id_date" placeholder="Data if Birth" value="{{old('birthday')}}">
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="email" name="email" placeholder="E-mail" required value="{{old('email')}}">
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="tel" name="phone" placeholder="Phone number +" required pattern="(\+?)([0-9]{8,12})" value="{{old('phone')}}">
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="password" name="password_confirmation" placeholder="Confirm password">
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="text" name="country" placeholder="Country" required value="{{old('country')}}">
                    </div>
                </div>
                <button class="btn_akk">
                    Sing Up
                </button>
                <p class="fr_text">
                    Do you have an account?
                    <a href="{{route('login')}}">Sing In</a>
                </p>
            </form>
        </div>
        {{-- <form class="sign_up__form" action="{{route('userStore')}}" method="POST">
              @csrf
              <div class="sign_up_top">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="surname" placeholder="Surname" required>
                <input type="text" name="nickname" placeholder="Nickname" required>
                <input type="date" name="birthday" placeholder="Date of Birth" required>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="text" name="phone" placeholder="Phone number" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm password" required>
              </div>
              <div class="sign_up_bottom">
                <input type="text" name="country" placeholder="Country">
                <input type="submit" name="submit_up" value="Sign Up">
                <p>Do you have an account? <a href="">Sign in</a></p>
              </div>
        </form> --}}
      </div>
    </section>
    <!-- END Registry_content-->
    <!-- Footer-->
@endsection
