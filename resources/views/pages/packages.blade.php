@extends('layout.app')
<!-- <style>
  body{
    color: white !important;
  }
</style> -->
    <!-- END Header-->
    <!-- Packages-->
@section('content')
    <section class="packages-club">

        <div class="package-page__banner">
            <img src="/images/clubs/{{$banners->photo}}" alt="img">
            <div class="wrapper">
                <div class="packages__name">
                    <p>
                        {{$banners->title}}
                    </p>
                    <p>
                        {{$banners->subtitle}}
                    </p>
                </div>
            </div>
        </div>
{{--      <div class="packages__banner">--}}
{{--        <div class="breadcrumbs"><span><a href="/"></a></span><span>/</span><span>{{ __('page.packages')}}</span><span></span><span></span></div>--}}
{{--        <div class="wrapper">--}}
{{--          <div class="packages__name">--}}
{{--            <p>{{__('page.check out')}}</p>--}}
{{--            <p>{{__('page.entertainment packages')}}</p>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
      <div class="packages_search wrapper">
          <div class="filter1">

            <div class="name_sort">{{ __('page.cities')}}:
              <div class="wrap_select">
                <select>
                  <option value="none" selected>{{__('page.empty')}}</option>
                  @foreach($cities as $city)
                  <option value="{{$city->title}}">{{$city->title}}</option>
                  @endforeach
                </select>
              </div>
						</div>

            <div class="name_sort">{{ __('page.category')}}:
              <div class="wrap_select category_search">
                <select>
                  <option value="none" selected>{{ __('page.all_packages')}}</option>
                  @foreach($gender as $city)
                        <option value="{{$city->title}}">{{$city->title}}</option>
                    @endforeach
                </select>
              </div>
						</div>
					</div>
          <span class="packages_search__text"></span>
        <form action="/" class="form_search">
          <input type="text" placeholder="{{__('page.search')}}">
          <button class="section1_search__text">
            <img src="/img/search.svg" alt="img">
          </button>
        </form>
      </div>
      <article class="news-block wrapper">
        @foreach($packages as $package)
        <section class="news-article">
          <div class="news-article__img"><img src="/images/clubs/{{$package->image}}" alt="img"></div>
          <div class="news-article__text">
            <div class="news-article__name"><span>
                    @php
                        if(app()->isLocale('en')){
                        echo $package->title ;
                        }
                        elseif(app()->isLocale('ru')){
                        echo $package->title_ru;

                        }elseif(app()->isLocale('fi')){
                        echo $package->title_fi;

                        }elseif (app()->isLocale('et')){
                        echo $package->title_et;
                        }
                    @endphp
                </span></div>
            <div class="news-article__txt">
                @php
                    if(app()->isLocale('en')){
                     echo $package->information;
                    }
                    elseif(app()->isLocale('ru')){
                    echo $package->information_ru;

                    }elseif(app()->isLocale('fi')){
                    echo $package->information_fi;

                    }elseif (app()->isLocale('et')){
                    echo $package->information_et;
                    }
                @endphp
            </div>
            <div class="news-article__more"><a href="{{route('package_card', $package->slug)}}"> {{ __('page.to_book')}}</a></div>
          </div>
        </section>
        @endforeach
        {{$packages->links()}}
      </article>
    </section>
    <!-- News-club card-->

    <section class="news-bonus wrapper">
        <div class="news-bonus__img"><img src="/images/Cards/Bonus_A.jpg" alt="img"></div>
        <div class="news-bonus__text">
            <div class="news-bonus__name">{{ __('page.join_the_exclusive')}}<span>{{ __('page.club')}}</span></div>
            <div class="news-bonus__txt">
                {{__('page.the envyme club card')}}
            </div>
            <div class="news-bonus__more"><a href=""> {{ __('page.learn_more')}}</a></div>
        </div>
    </section>
    <!-- News-club subscription-->
    <section class="news-subscription">
        <div class="section1_name">
            <p class="section1_hr"></p>
            <p><span>{{ __('page.envyme_subscr')}}</span></p>
        </div>
        <div class="section1_subname">{{ __('page.stay_on_top')}}</div>
        <div class="news-subscription__form wrapper">
            <form action="{{ route('subscribe') }}" method="POST">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <input type="email" name="email" placeholder="{{ __('page.enter_email')}}">
                <input type="submit" name="submit" value="{{ __('page.subscribe')}}">
            </form>
            <div class="news-subscription__uslug">{{ __('page.subscribing')}}</div>
        </div>
    </section>
    <!-- Footer-->
@endsection
