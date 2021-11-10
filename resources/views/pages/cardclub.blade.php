@extends('layout.app')
    <!-- END Header-->
    <!-- Banner-full-club-->
@section('content')
    @php
        if (\Illuminate\Support\Facades\Auth::guest()){
           session(['previous-url' => request()->url()]);
       }
    @endphp
    <section class="banner-full-club">
      <div class="banner-full-club__1">{{-- <img src="/images/clubs/{{$club->photos[0]}}"> --}}
{{--          {{dd($club->photos)}}--}}
{{--          @php  $value = array_key_last($club->photos);  @endphp--}}
        <img src="/images/clubs/{{$club->photos[0]}}" alt="img">
				<div class="breadcrumbs">
				<span>
					<a href="/"></a>
				</span>
				<span>/</span>
				<span>{{__('page.clubs')}}</span>
				<span>
				</span>
				<span>
				</span>
			</div>
          <!-- <div class="breadcrumbs"><span><a href="/"></a></span><span>/</span><span>{{__('page.clubs')}}</span><span>/</span><span>{{$club->title}}</span></div> -->
        <div class="title-club-name">
            <div class="title-club-name_wrap">
            <div class="title-club-name__titil">{{$club->title}}</div>
            <div class="title-club-name__hr"></div>
            <div class="title-club-name__laoyt1"><span>

                    @php
                       $count = round($club->raiting->raiting);
                    @endphp

                    <?php for ($i = 0; $i < $count; $i++):?>
                         <div class="star"></div>
                    <?php endfor;?>

                    <span>{{$club->raiting->raiting}}</span></span><span>{{$club->schedule}}</span></div>

            <div class="title-club-name__laoyt2">
{{--                {{dd($features)}}--}}
              @foreach($features as $feature)

                <div class="wrap_icons">
                    <img src="{{$feature->img}}" alt="img">
                    {{$feature->title}}
                </div>
              @endforeach

            </div>
            <div class="title-club-name__laoyt3"><span>{{$city->first()->title}}</span><a href="http://maps.google.com/maps?q=?@php echo urlencode($club->map);  @endphp" target="_blank">Show on map</a></div>
            <div class="title-club-name__hr"></div>
            <div class="title-club-name__laoyt4">
              <div class="title-club-name__item1" style="width: 100%">

                  <div class="mbp_right">
                      <div class="mbp_price">
                          {{__('page.ticket_price')}} <span>{{$club->tickets[0]->price ?? __('page.no tickets') }}</span>
                      </div>
                      <div class="quantity modal">
                          <div class="quantity-button quantity-down">-</div>
                          <input type="number" min="1" max="99" step="1" value="1" data-parent="{{$club->id}}" class="amount_tickets">
                          <div class="quantity-button quantity-up">+</div>
                      </div>
                      <a href="#" data-parent="{{$club->id}}"  data-action="{{$club->id}}" class="mbp_buy">
                          {{__('page.buy_ticket')}}
                      </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
    <!-- END Banner-full-club-->
    <!-- Slidder-about-->
    <article class="slider_about">
      <div class="section1_name">
        <p class="section1_hr"></p>
        <p><span>{{ __('page.about_club')}}</span></p>
      </div>
      <div class="section1_subname">{{__('page.just buy a ticket')}}</div>
      <div class="slider_about__subname wrapper">{{$club->description}}</div>
      <section class="about_swiper wrapper">
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
{{--              {{dd($club->photos)}}--}}

              @foreach($club->photos as $item )
            <div class="swiper-slide" style="background-image:url(/images/clubs/{{$item}})"></div>
              @endforeach
          </div>
        </div>
        <div class="swiper-container gallery-thumbs">
          <div class="swiper-wrapper">
              @foreach($club->photos as $item )
                  <div class="swiper-slide" style="background-image:url(/images/clubs/{{$item}})"></div>
              @endforeach
          </div>
          <div class="swiper-button-next swiper-button-white"></div>
          <div class="swiper-button-prev swiper-button-white"></div>
        </div>
      </section>
    </article>
    <!-- END Slider-about-->
    <!-- Slider_reviews-->
    <section class="slider_reviews">
      <div class="section1_name">
        <p class="section1_hr"></p>
            <p><span>{{ __('page.reviews')}}</span></p>
      </div>
      <div class="section1_subname">{{__('page.clear opinion')}}</div>
      {{-- <div class="block_slider wrapper">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            @foreach($club->feedbacks as $feedback)
            <div class="swiper-slide">
              <div class="reviews_slider">
                <p >{{$feedback->message}}</p>
                <div class="flex_star">
                  @for($i=0; $i<intval($feedback->raiting); ++$i)
                  <div class="star"></div>
                  @endfor
                </div>
                <p class="reviews_slider_user_name">{{$feedback->user->name}} {{$feedback->user->surname}}</p>
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
      </div> --}}
{{--            {{dd($club->feedbacks)}}--}}
      <div class="wrap_slider_rew wrapper">
        <div class="slider_review">
          @foreach($club->feedbacks as $feedback)
           @if($feedback->status == 1 )
            <div class="sr_item">
              <!-- <div class="swiper-slide"> -->
                <div class="reviews_slider">
                  <p >{{$feedback->message}}</p>
                  <div class="flex_star">
                    @for($i=0; $i<intval($feedback->raiting); ++$i)
                    <div class="star"></div>
                    @endfor
                  </div>
                  <p class="reviews_slider_user_name">{{$feedback->user->name ?? ''}} {{$feedback->user->surname ?? ''}}</p>
                </div>
              <!-- </div> -->
            </div>
            @endif
          @endforeach
        </div>
      </div>
    </section>

    <!-- END Slider-->
    <!-- Forms-->
    <section class="formfull-club">
      <p>{{__('page.share your opinion')}}</p>
      <form id="feedback" action="{{route('send_feedback')}}" method="POST">
        @csrf
        <input type="hidden" name="club_id" value={{$club->id}}>
        <div class="top_form_rev">
          <div class="tfr_wrap_inp">
            <input type="text" placeholder="{{Auth::user()->name ?? ''}} {{Auth::user()->surname ?? ''}}" disabled>
          </div>
          <div class="review_stars">
              <input id="star-4" type="radio" value="5" name="stars">
              <label title="Отлично" for="star-4">
              </label>
              <input id="star-3" type="radio"  value="4" name="stars">
              <label title="Хорошо" for="star-3">
              </label>
              <input id="star-2" type="radio" value="3" name="stars">
              <label title="Нормально" for="star-2">
              </label>
              <input id="star-1" type="radio" value="2" name="stars">
              <label title="Плохо" for="star-1">
              </label>
              <input id="star-0" type="radio" value="1" name="stars">
              <label title="Ужасно" for="star-0">
              </label>
          </div>
        </div>
        <textarea type="text" name='text' placeholder="{{ __('page.type_your_option')}}">{{old('text')}}</textarea>
        <div class="formfull-club__submit">
          @if(Auth::check())
                <input type="submit" name="submit" value="{{ __('page.add_review')}}">
            @else
                <input type="button" class="addfeedback" name="submit" value="{{ __('page.add_review')}}">
          @endif

        </div>
        <input type="hidden" name="reset" value="Hidden">
      </form>
    </section>
    <!-- END Forms-->
    <!-- Footer-->
@endsection
