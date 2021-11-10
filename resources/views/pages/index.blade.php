@extends('layout.app')
    <!-- END Header-->
    <!-- Slidder-->
@section('content')
    <section class="slider">
      <!-- Swiper-->

      <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
                <div class="swiper-slide"><img src="/images/clubs/{{$banner->photo}}" alt="img">
                    <div class="slider_mask slider_1 wrapper">
                        <p>{{$banner->title}}</p>
                        <p>{{$banner->subtitle}}</p><a href="{{$banner->href}}">{{$banner->description}}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Add Pagination-->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows-->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
      <!-- Swiper JS-->
    </section>
    <!-- END Slider-->
    <!-- Article-->
    <div class="section1">
      <div class="section1_name">
        <p class="section1_hr"></p>
        <p><span>{{__('page.try now')}}</span></p>
      </div>
      <div class="section1_subname">{{__('page.choose the club')}}</div>
      <div class="section1_search wrapper">
        <div class="name_sort">{{__('page.cities')}}:
          <div class="wrap_select">
            <select>
              <option value="none" selected>{{__('page.empty')}}</option>
              @foreach($cities as $city)
              <option value="{{$city->title}}">{{$city->title}}</option>
              @endforeach
            </select>
          </div>
        </div>
            <form action="/" class="form_search">
          <input type="text" placeholder="{{__('page.search')}}">
          <button class="section1_search__text">
            <img src="/img/search.svg" alt="img">
          </button>
        </form>

        {{-- <div class="section1_hr">   </div> --}}
      </div>
      <div class="section1_grid wrapper">
        @foreach($clubs as $club)
        <div class="section1_item">
          <a href="{{route('card_club', $club->slug)}}" class="section1_img"><img src="/images/clubs/{{$club->photos[0]}}" alt="img">
              @if($club->discount == 20)
                  <img class="sticer" src="/images/main/stiker20.png" alt="img">
									<!-- <div class="sticer">
										-20%
									</div> -->
              @elseif($club->discount == 30)
                  <img class="sticer" src="/images/main/stiker30.png" alt="img">
									<!-- <div class="sticer">
										-30%
									</div> -->
              @elseif($club->discount == 50)
                  <img class="sticer" src="/images/main/stiker50.png" alt="img">
									<!-- <div class="sticer">
										-50%
									</div> -->
              @endif
          </a>
					<div class="bottom_tovar_info">
						<p class="section1_title">{{$club->title}}</p>
						{{-- <div class="section1_info">
							<div class="rating">
								@for($i=0; $i<round($club->raiting->raiting, 0); $i++)
									<span>&#9733;</span>
								@endfor
								@for($i=0; $i<5-round($club->raiting->raiting, 0); $i++)
									<span><img src="/images/main/Stars1.png"></span>
								@endfor
							</div>
							<a class="more_info" href="/cardclub/{{$club->id}}" data-id="{{$club->id}}">{{ __('page.more_info')}}</a>
						</div>
						--}}
						<div class="info_cart">
							<div class="review_stars">
								@for($i=0; $i<5-round($club->raiting->raiting, 0); $i++)
									<div class="rs_star"></div>
								@endfor
								@for($i=0; $i<round($club->raiting->raiting, 0); $i++)
									<div class="rs_star active"></div>
								@endfor
							</div>
{{--							<a class="more_info" href="/cardclub/{{$club->id}}" data-id="{{$club->id}}">--}}
                                <a class="more_info" href="{{route('card_club', $club->slug)}}" data-id="{{$club->id}}">
								{{ __('page.more_info')}}
							</a>
						</div>
					</div>
        </div>
        @endforeach
        {{ $clubs }}
      </div>
      <div class="section1_btn"><a href="" class="see_more">{{__('page.show more')}}    </a></div>
    </div>
    <!-- END Article-->
    <!-- Footer-->
@endsection
