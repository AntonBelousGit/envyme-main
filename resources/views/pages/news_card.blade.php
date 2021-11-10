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
        <div class="package-page__banner" style="background: url('/images/clubs/{{$news->image}}') no-repeat center; ">
            <div class="breadcrumbs"><span><a href="/"></a></span><span>/</span><span><a href="{{route('news')}}">{{__('page.news')}}</a></span><span>/</span><span>{{$news->title}}</span></div>
            <div class="wrapper">
                <div class="packages__name">
                    <p>{{$news->title}}</p>
                </div>
            </div>
        </div>
        <div class="package-page__block1 wrapper">
            <!-- <div class="package-page__item1">
                <p class="section1_hr"></p>
            </div> -->
						<div class="package-item2_name"><span>{{__('page.news')}}</span></div>
            <div class="package-item2_text">{!! $news->content !!}</div>
            <!-- <div class="package-page__item2">
                <div class="package-item2_name"><span>News</span></div>
                <div class="package-item2_text">{{$news->content}}</div>
            </div> -->

        </div>
        <!-- <div class="package-page__block2 wrapper">
            <div class="package-block2__name">Additional Information</div>
            <div class="package-block2__text">
                <p>{{$news->description}}</p>
            </div>
        </div> -->
    </section>
    <!-- Packages-page_filter-->

    <!-- Packages-page_joinmore-->

    <!-- Footer-->
@endsection
