@extends('layout.app')
    <!-- END Header-->
@section('content')
    <section class="account-banner">
			<div class="breadcrumbs"><span><a href="/"></a></span><span>/</span><span>{{ __('page.my')}} {{ __('page.account')}}</span></div>

			<div class="wrapper">
				<div class="banner-account__laoyt1">
            <div class="banner-account-name">{{ __('page.hello')}} {{$user->name}}!</div>
            <div class="banner-account-subname">{{ __('page.very_glad')}}<br>{{ __('page.nice_day')}}</div>
          </div>
				<div class="banner-account">
						@switch($user->user_profile->card_status)
							@case('none')
								<img src="/images/Cards/Banner_myaccount.jpg">
								@break
							@case('silver club card')
								<img src="/images/Cards/Silver_A.jpg">
								@break
							@case('gold club card')
								<img src="/images/Cards/Gold_A.jpg">
								@break
							@case('diamond club card')
								<img src="/images/Cards/Diamond_A.jpg">
								@break
						@endswitch
				</div>
				<!-- <div class="banner-account__laoyt"> -->

          <div class="banner-account__laoyt2">
            <div class="account-laoyt2__item1"><span>{{__('page.level')}} {{$user->user_profile->level}}</span><span>{{__('page.for next level')}} /10 {{__('page.tickets')}}</span></div>
            <div class="account-line">
              <div class="account-line__progres">
                  <div class="progress_line" style="width: {{$user->user_profile->level / 50 * 100}}%;"></div>
              </div>
            </div>
            <div class="banner-account__level1">
              @php $inactive_ticket = 10 - $user->user_profile->buyed_ticket_current_level @endphp
              @for($i=0; $i<$user->user_profile->buyed_ticket_current_level; $i++)

              <span class="bilet active"></span>
              @endfor
              @for($i=0; $i<$inactive_ticket; $i++)

              <span class="bilet"></span>
              @endfor
            </div>
            <div class="banner-account__question">{{ __('page.have_a_question')}} <a href="">{{ __('page.here')}}</a></div>
          </div>
        <!-- </div> -->
			</div>



      </div>
    </section>
    <!-- My-account_account-info-->
    <section class="account-info">
      <div class="section1_name">
        <p class="section1_hr"></p>
        <p><span>{{ __('page.account_info')}}</span></p>
      </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('change_my_account', $user->id)}}" method="POST">
            @method('POST')
            @csrf
        <div class="section-account_left">
            <input type="text" name="name" placeholder="Alexsander" value="{{$user->name}}">
            <input type="text" name="nickname" placeholder="Nickname" value="{{$user->nickname}}">
            <input type="text" name="birthday" placeholder="22/10/1900" value="{{$user->birthday}}">

            <input type="hidden" name="surname" placeholder="Smith" value="{{$user->surname}}">
            <input type="text" name="phone" placeholder="Phone number" value="{{$user->phone}}">
            <input type="text" name="email" placeholder="E-mail" value="{{$user->email}}">
            <input type="text" name="country" placeholder="Country" value="{{$user->country}}">
        </div>
        <div class="section-account_right">
					<div class="title_form_pass	">
					{{ __('auth.change_password')}}
					</div>
          <!-- <p></p> -->
          <!-- <div class="section-account_password"> -->
            <input type="text" name="password" placeholder="{{ __('auth.password')}}">
            <input type="text" name="password_confirmation" placeholder="{{ __('auth.confirm_password')}}">
          <!-- </div> -->
          <div class="section-account_submit">
            <input type="submit" name="submit" value="{{__('page.save changes')}}">
          </div>
        </div>
      </form>
    </section>
    <!-- END Slider-about-->
    <!-- Footer-->
@endsection
