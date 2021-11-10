@extends('layout.app')
<!-- <style>
  body{
    color: white !important;
  }
</style> -->
@section('content')
    <!-- News-club-->
    <section class="news-club">
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
{{--      <div class="news-club__banner">--}}
{{--        <div class="breadcrumbs"><span><a href="/"></a></span><span>/</span><span>{{__('page.news')}}</span><span></span><span></span></div>--}}
{{--        <div class="news-club__name wrapper"><span>{{__('page.news')}}</span><img src="/images/full-club/logo_banner.png" alt="img"></div>--}}
{{--      </div>--}}


      {{-- <div class="section1_search wrapper"><span>Category:<a href="">all news</a></span><span class="section1_search__text"><img src="/images/main/search_1894.png" alt="img"></span>
        <p class="section1_hr"></p>
      </div> --}}
      <div class="section1_search wrapper">
               {{-- <div class="section1_hr">   </div> --}}
      </div>
      <article class="news-block wrapper">
        @foreach($newses as $news)
        <section class="news-article">
          <div class="news-article__img"><img alt="img" src="/images/clubs/{{$news->image}}"  style="width: 100%;"></div>
          <div class="news-article__text">
            <div class="news-article__name"><span>{{$news->title}} </span><span>{{$news->date}}</span></div>
            <div class="news-article__txt">
              {!! $news->content !!}
            </div>
            <div class="news-article__more"><a href="{{route('news_card', $news->slug)}}"> {{ __('page.learn_more')}}</a></div>
          </div>
        </section>
        @endforeach
        {{$newses->links()}}
      </article>
    </section>
    <!-- News-club card-->
    <section class="news-bonus wrapper">
        <div class="news-bonus__img"><img src="/images/Cards/Silver_A.jpg" alt="img"></div>
        <div class="news-bonus__text">
            <div class="news-bonus__name">{{ __('page.join_the_exclusive')}}<span>{{ __('page.club')}}</span></div>
            <div class="news-bonus__txt">
            {{__('page.the envyme club card')}}
            </div>
            <div class="news-bonus__more"><a href="{{route('membership')}}"> {{ __('page.learn_more')}}</a></div>
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

@endsection
