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
      <!-- <div class="package-page__banner" style="background: url('/images/clubs/{{$package->image}}') no-repeat center; "> -->
			<div class="package-page__banner">
			<img src="/images/clubs/{{$package->image}}" alt="">
			<div class="breadcrumbs">
				<span>
					<a href="/"></a>
				</span>
				<span>/</span>
				<span>{{$package->title}}</span>
				<span>
				</span>
				<span>
				</span>
			</div>

        <!-- <div class="breadcrumbs"><span><a href="/"></a></span><span>/</span><span><a href="{{route('packages')}}">{{__('page.packages')}}</a></span><span>/</span><span></span></div> -->
        <div class="wrapper">
          <div class="packages__name activities">
            <p>{{$package->title}}</p>
          </div>
        </div>
      </div>
      <!-- <div class="package-page__block1">
        <div class="package-page__item1">
          <p class="section1_hr"></p>
        </div>
        <div class="package-page__item2">
          <div class="package-item2_name"><span>{{ __('page.about_package')}}</span></div>
          <div class="package-item2_text">{{$package->information}}</div>
        </div>
        <div class="package-page__item3">
          <div class="package-item3__block">
            <div class="package-item3_name">{{ __('page.package_details')}}</div>
            <p class="section1_hr"></p>
            <div class="package-item3_line1"><span>{{ __('page.city')}}: {{$cities[0]->title ?? ''}}</span><a href=""> {{ __('page.show_on_club')}}</a></div>
            <div class="package-item3_line2">{{ __('page.date')}}: {{$package->date->format('M d Y')}}</div>
            <div class="package-item3_line3">{{ __('page.number_of_persons')}}: {{$package->amount_person}}</div>
            <div class="package-item3_line4">
              @foreach($features as $feature)
              <span>{{$feature->title}}</span>
              @endforeach
              </div>
            <p class="section1_hr"></p>
            <div class="package-item3_footer"><span>Price From <strong>{{$package->price}}€</strong></span><a href="">{{ __('page.booking_request')}}</a></div>
          </div>
        </div>
      </div> -->
	<div class="wrap_sec_about">
		<section class="sec_about wrapper">
			<div class="sb_left">
				<h2>
					{{ __('page.about_package')}}
				</h2>
				<div class="sb_text">
			{!! $package->information !!}
			</div>
			</div>
			<div class="sb_right">
				<h2>
					{{ __('page.package_details')}}
				</h2>
				<div class="sb_info">
					<div class="sb_info_top">
						<div class="sb_list">
{{--                            {{dd($cities)}}--}}
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
								{{ __('page.date')}}: {{$package->date->format('M d Y')}}
							</div>
							<div class="sbl_item">
								{{ __('page.number_of_persons')}}: {{$package->amount_person}}
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
{{--						<a href="#" class="sb_show">--}}
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
							{{$package->price}}€
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
          <p>
              {!! $package->additional_information !!}
          </p>
        </div>
      </div>
    </section>

    <section class="package-filter wrapper" id="package-filter">
      <form action="/">
        <div class="wrap_inp1">
          <label>{{__('page.select city')}}</label>
          <div class="wrap_select custom1">
            <select id="select-city">
              <option value="none" selected>{{__('page.empty')}}</option>
              @foreach($cities as $city)
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
              @for($i=0; $i<$package->amount_person; ++$i)
              <option value="{{$i+1}}">{{$i+1}}</option>
              @endfor
              </select>
          </div>
        </div>

{{--        <label for="submit">You will be redirected to the next step--}}
{{--          <input type="submit" class="active_buy" name="submit" data-action="хуй" value="continue">--}}
{{--        </label>--}}
        <div class="wrap_inp1">
          <div class="title_btn">{{__('page.select the number')}}</div>
          <a href="#"  data-action="" data-id="{{$package->id}}" class="active_buy" onclick="openModal2()">
              <!-- {{__('page.buy_ticket')}} -->
							{{__('page.continue')}}
          </a>
        </div>
      </form>
    </section>
    <!-- Packages-page_filter-->
    {{-- <section class="package-filter wrapper">
        <form action="/">
            <label for="name">Select city
                <select id="select-city">
                    <option value="none" selected>empty</option>
                    @foreach($cities as $city)
                        <option value="{{$city->title}}">{{$city->title}}</option>
                    @endforeach
                </select>

            </label>
            <label for="name">Select date
                <input id="select-date" type="date" name="date" placeholder="30/01/2021">
            </label>
            <label for="name">Select the number

                <select  id="select-person">
                    <option value="none" selected>empty</option>
                    @for($i=0; $i<$package->amount_person; ++$i)
                        <option value="{{$i+1}}">{{$i+1}}</option>
                    @endfor
                </select>

            </label>

            <a href="#"  data-action="" data-id="{{$package->id}}" class="active_buy" onclick="openModal2()">
                Buy ticket
            </a>
        </form>
    </section> --}}
    <!-- Packages-page_joinmore-->
    <section class="joinmore">
      <div class="section1_name">
        <p class="section1_hr"></p>
        <p><span>{{__('page.join more')}}</span></p>
      </div>
      <div class="joinmore-block wrapper">
        @foreach($recently_packages as $package)
        <div class="joinmore-block_item">
          <div class="masc-item">
            <img src="/images/clubs/{{$package->image}}" alt="">
            <p>
                @php
                    if(app()->isLocale('en')){
                       echo $package->title;
                    }
                    elseif(app()->isLocale('ru')){
                       echo $package->title_ru;
                    }
                    elseif(app()->isLocale('fi')){
                       echo $package->title_fi;

                    }
                    elseif(app()->isLocale('et')){
                        echo $package->title_et;
                    }
                @endphp
            </p><a href="{{route('package_card', $package)}}">{{ __('page.learn_more')}}</a>
          </div>
        </div>
        @endforeach
      </div>
    </section>
    <!-- Footer-->
@endsection
