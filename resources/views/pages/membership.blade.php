@extends('layout.app')
    <!-- membership-club-->
@section('content')
    <section class="membership-club">
        <div class="package-page__banner">
            <img src="/images/clubs/{{$banners->photo}}" alt="img">
            <div class="wrapper">
                <div class="packages__name">
                    <p>
                        {{$banners->title}}
                    </p>
                    <img src="/images/full-club/logo_banner.png" alt="img">
                </div>
            </div>
        </div>
{{--      <div class="membership-club__banner">--}}
{{--          <div class="breadcrumbs"><span><a href="/"></a></span><span>/</span><span>{{ __('page.membership_club')}}</span><span></span><span></span></div>--}}
{{--        <div class="membership-club__name"><span>{{ __('page.club_cards')}}</span><img src="/images/full-club/logo_banner.png" alt="img"></div>--}}
{{--      </div>--}}

        @php
        $photos = json_decode($membership->photos);
        @endphp
        <article class="membership-card-name">
        <div class="section1_name">
          <p class="section1_hr"></p>
          <p><span>{{ __('page.join_the_exclusive')}} {{ __('page.club')}}</span></p>
        </div>
        <div class="section1_subname">{!! $membership->description !!}</div>
      </article>
      <article class="membership-card wrapper">
        <section class="bonus-card1">
          <div class="bonus-card1__img"><img src="/images/clubs/{{$photos[3]}}" alt="img"></div>
          <div class="bonus-card1__text">
            <div class="bonus-card_name bonus">{{ __('page.bonus_club_card')}}</div>
            <div class="bonus-card_txt">
              {!! $membership->bonus_description !!}
            </div>
          </div>
        </section>
        <section class="bonus-card2">
          <div class="bonus-card2__text">
            <div class="bonus-card_name silver">{{ __('page.silver_club_card')}}</div>
            <div class="bonus-card_txt">
              {!! $membership->silver_description !!}
            </div>
          </div>
          <div class="bonus-card1__img"><img src="/images/clubs/{{$photos[2]}}" alt="img"></div>
        </section>
        <section class="bonus-card1">
          <div class="bonus-card1__img"><img src="/images/clubs/{{$photos[1]}}" alt="img"></div>
          <div class="bonus-card1__text">
            <div class="bonus-card_name gold">{{ __('page.gold_club_card')}}</div>
            <div class="bonus-card_txt">
               {!! $membership->gold_description !!}
            </div>
          </div>
        </section>
        <section class="bonus-card2 card-last">
          <div class="bonus-card2__text">
            <div class="bonus-card_name diamond"><span>{{ __('page.diamond_club_card')}}</span></div>
            <div class="bonus-card_txt">
              {!! $membership->diamond_description !!}
            </div>
          </div>
          <div class="bonus-card1__img"><img src="/images/clubs/{{$photos[0]}}" alt="img"></div>
        </section>
      </article>
    </section>
    <!-- News-club -->
    <section class="membership-table wrapper">
			<div class="wrap_table">
				<table class="header-fixed">
					<thead>
						<tr>
							<th>{{ __('page.card_benefits')}}</th>
							<th>{{ __('page.bonus')}}</th>
							<th>{{ __('page.silver')}}</th>
							<th>{{ __('page.gold')}}</th>
							<th>{{ __('page.diamond')}}</th>
						</tr>
					</thead>
					<tbody>

                        @foreach($membershipPrivilege as $privilege)

                        <tr>
                            @php
                                if(app()->isLocale('en')){
                                echo '<td>'. $privilege->title .'</td>' ;
                                }
                                elseif(app()->isLocale('ru')){
                                echo '<td>'. $privilege->title_ru .'</td>' ;

                                }elseif(app()->isLocale('fi')){
                                 echo '<td>'. $privilege->title_fi .'</td>' ;

                                }elseif (app()->isLocale('et')){
                                 echo '<td>'. $privilege->title_et .'</td>' ;
                                }
                            @endphp

                            <td>@if($privilege->bonus == 'on') <span class="check_table"></span> @endif</td>
                            <td>@if($privilege->silver == 'on') <span class="check_table"></span> @endif</td>
                            <td>@if($privilege->gold == 'on') <span class="check_table"></span> @endif</td>
                            <td>@if($privilege->diamond == 'on') <span class="check_table"></span> @endif</td>
                        </tr>

                        @endforeach
{{--						@foreach($membership->data as $key => $value)--}}
{{--						<tr>--}}
{{--							<td>{{$key}}</td>--}}
{{--							<td></td>--}}
{{--							<td></td>--}}
{{--							<td></td>--}}
{{--							<td></td>--}}

{{--							<!-- <td>{{$value[0]}}</td>--}}
{{--							<td>{{$value[1]}}</td>--}}
{{--							<td>{{$value[2]}}</td>--}}
{{--							<td>{{$value[3]}}</td> -->--}}
{{--						</tr>--}}
{{--						@endforeach--}}
					</tbody>
				</table>
			</div>

        <div class="membership-table__footnote">{{__('page.digital_club_card_first')}}  <a href="{{route('register')}}">here</a> {{__('page.digital_club_card_second')}}</div>
      <div class="membership-table__footer">{{__('page.digital_club_card_first')}}  <a href="{{route('register')}}">here</a> {{__('page.digital_club_card_second')}}</div>
    </section>
    <!-- Footer-->
@endsection
