@extends('layout.app')
    <!-- END Header-->
    <!-- Package-page-->
@section('content')
    @php
     if (\Illuminate\Support\Facades\Auth::guest()){
        session(['previous-url' => request()->url()]);
    }
    @endphp
    <section class="package-page">
      <!-- <div class="package-page__banner" style="background: url('/images/clubs/{{$activity->image}}') no-repeat center; "> -->
			<div class="package-page__banner">
          <div class="breadcrumbs"><span><a href="/"></a></span><span>/</span><span><a href="{{route('activities')}}">{{__('page.activities')}}</a></span><span>/</span><span>
                    {{$activity->title}}
            </span></div>
						<img src="/images/clubs/{{$activity->image}}" alt="">
        <div class="wrapper">
          <div class="packages__name activities">
            <p>
                    {{$activity->title}}
            </p>

          </div>
        </div>
      </div>
			<div class="wrap_sec_about">
		<section class="sec_about wrapper">
			<div class="sb_left">
				<h2>
					{{ __('page.about_package')}}
				</h2>
				<div class="sb_text">
                        {!! $activity->information !!}
			</div>
			</div>
			<div class="sb_right">
				<h2>
					{{ __('page.activity_details')}}
				</h2>
				<div class="sb_info">
					<div class="sb_info_top">
						<div class="sb_list">
							<div class="sbl_item">
								{{ __('page.city')}}:
                                <?php   if(app()->isLocale('en')){ ?>
                                {{$cities->first()->title ?? ''}}
                                <?php } elseif(app()->isLocale('ru')){ ?>
                                {{$cities->first()->title_ru ?? ''}}
                                <?php } elseif(app()->isLocale('fi')){?>
                                {{$cities->first()->title_fi ?? ''}}
                                <?php } elseif (app()->isLocale('et')){ ?>
                                {{$cities->first()->title_et ?? ''}}
                                <?php }?>
							</div>
							<div class="sbl_item">
								{{ __('page.date')}}: {{$activity->date->format('M d Y')}}
							</div>
							<div class="sbl_item">
								{{ __('page.number_of_persons')}}: {{$activity->amount_person}}
							</div>
						</div>
						<div class="sb_preim">
							@foreach($features as $feature)
								<div class="sbp_item">{{$feature->title}}</div>
              @endforeach
							<!-- <div class="sbp_item Champagne">
								Champagne room
							</div>
							<div class="sbp_item Sauna">
								Sauna
							</div> -->
						</div>
					</div>
					<div class="sb_info_bottom">
{{--						<a href="/cardclub/{{$activity->club_id}}" class="sb_show">--}}
{{--							{{ __('page.show_on_club')}}--}}
{{--						</a>--}}
						<!-- <a href="#" class="sb_share">
							Share
						</a> -->
					</div>
				</div>
				<div class="sb_bottom">
					<div class="sb_price">
						{{__('page.price from')}}
						<span>
							{{$activity->price}}€
						</span>
					</div>
					<a href="#sec_about" class="sb_btn">
						{{ __('page.booking_request')}}
					</a>
				</div>
			</div>
		</section>
	</div>
      <div class="package-page__block2 wrapper">
        <div class="package-block2__name" id="sec_about">{{__('page.add information')}}</div>
        <div class="package-block2__text">
          <!-- <p> -->
              {!! $activity->additional_information !!}
          <!-- </p> -->
        </div>
      </div>
    </section>
    <!-- Packages-page_filter-->
    <section class="package-filter wrapper" >
      <form action="/">
        <div class="wrap_inp1">
          <label>{{__('page.select city')}}</label>
          <div class="wrap_select custom1">
            <select id="select-city">
              <option value="none" selected>{{__('page.search')}}</option>
              @foreach($cities as $city)
{{--              <option value="{{$city->title}}">{{$city->title}}</option>--}}
                    <?php   if(app()->isLocale('en')){ ?>
                    <option value="{{$city->title}}">{{$city->title}}</option>
                    <?php } elseif(app()->isLocale('ru')){ ?>
                    <option value="{{$city->title_ru}}">{{$city->title_ru}}</option>
                    <?php } elseif(app()->isLocale('fi')){?>
                    <option value="{{$city->title_fi}}">{{$city->title_fi}}</option>
                    <?php } elseif (app()->isLocale('et')){ ?>
                    <option value="{{$city->title_et}}">{{$city->title_et}}</option>
                    <?php }?>
              @endforeach
            </select>
          </div>
        </div>

        <div class="wrap_inp1">
          <label>
            {{__('page.select date')}}
          </label>
          <input id="select-date" type="date" name="date">
        </div>
        <div class="wrap_inp1">
          <label>{{__('page.select the number')}}</label>
           <div class="wrap_select custom2">
              <select  id="select-person">
              <option value="none" selected>{{__('page.empty')}}</option>
              @for($i=0; $i<$activity->amount_person; ++$i)
              <option value="{{$i+1}}">{{$i+1}}</option>
              @endfor
              </select>
          </div>
        </div>
        <div class="wrap_inp1">
          <div class="title_btn">{{__('page.select the number')}}</div>
          <a href="#"  data-action="" data-id="{{$activity->id}}" class="active_buy" onclick="openModal2()">
              {{__('page.continue')}}
          </a>
        </div>
      </form>
    </section>
    <!-- Packages-page_joinmore-->
    <section class="joinmore">
      <div class="section1_name">
        <p class="section1_hr"></p>
        <p><span>{{__('page.join more')}}</span></p>
      </div>
      <div class="joinmore-block wrapper">
        @foreach($recently_activities as $activity)
        <a href="{{route('activity_card', $activity)}}" class="joinmore-block_item">
          <div class="masc-item">
            <img src="/images/clubs/{{$activity->image}}" alt="">
            <p>
                    @php
                        if(app()->isLocale('en')){
                            echo $activity->title;
                        }
                        elseif(app()->isLocale('ru')){
                            echo $activity->title_ru;
                        }
                        elseif(app()->isLocale('fi')){
                            echo $activity->title_fi;

                        }
                        elseif(app()->isLocale('et')){
                            echo $activity->title_et;
                        }
                    @endphp

                 </p><div class="learn_more">{{ __('page.learn_more')}}</div>
          </div>
        </a>
        @endforeach
      </div>
    </section>
    <!-- Footer-->
@endsection
