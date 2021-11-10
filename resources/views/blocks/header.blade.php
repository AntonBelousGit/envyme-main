<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <!-- CharsetPage-->
    <meta charset="utf-8">
    <!-- Title Page-->
    <title>Envy me</title>
    <!-- Meta Description and Keywords-->
    <meta name="author" content="kav17"/>
    <meta name="description" content="Template for sites"/>
    <meta name="keywords" content="css, pug, layout, css-framework"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- IE Compatible-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Meta Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{asset('/images/icons/favicon-32x32.png')}}" sizes="32x32"/>
    <link rel="icon" type="image/png" href="{{asset('/images/icons/favicon-16x16.png')}}" sizes="16x16"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/images/icons/favicon.ico')}}"/>
    <!-- Favicon Apple-->
    <link rel="apple-touch-icon" href="{{asset('/images/icons/apple-touch-icon.png')}}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/images/icons/favicon.ico')}}"/>
    <!-- Favicon Apple-->
    <link rel="apple-touch-icon" href="{{asset('/images/icons/apple-touch-icon.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('/images/icons/apple-touch-icon-72x72.png')}}" sizes="72x72"/>
    <link rel="apple-touch-icon" href="{{asset('/images/icons/apple-touch-icon-114x114.png')}}" sizes="114x114"/>
    <!-- Stylesheets-->

    <link href="{{asset('/jivosite/jivosite.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('/assets/css/swiper.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/style.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/edits.css')}}">
    <link rel="stylesheet" href="{{asset('/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/css/jquery.arcticmodal-0.3.css')}}">
    <link rel="stylesheet" href="{{asset('/css/busket.css')}}">
    <!-- Translate  -->
{{--    <script defer src="{{asset('/js/translate.js')}}"></script>--}}
</head>
<body></body>
<div class="main-wrapper">
    <!-- Header-->
    <header class="head" id="header">
        <div class="header">
            <!-- Logo--><a class="logo" href="/" title="Logo"><img src="{{asset('images/icons/logo.png')}}" alt="img"></a>
            <!-- END Logo-->
            <!-- Main Menu-->
            <input id="nav-toggle" type="checkbox" hidden="">
            <div class="nav">

                <h2 class="logo"><a href="{{route('index')}}"><img src="{{asset('images/icons/logo.png')}}" alt="logo"></a></h2>
                <ul>
                    {{--                    <li><a href="{{route('index')}}">Clubs</a></li>--}}
                    <li><a href="{{route('activities')}}">{{ __('page.activities')}}</a></li>
                    <li><a href="{{route('membership')}}">{{ __('page.memberships_club')}}</a></li>
                    <li><a href="{{route('faqs')}}">{{ __('page.support_and_contact')}}</a></li>
                    <li><a href="{{route('news')}}">{{ __('page.news')}}</a></li>
                    <li><a href="{{route('packages')}}">{{ __('page.packages')}}</a></li>
                </ul>
            </div>
            <nav class="header-menu">
                {{--                <a class="h-menu" href="{{route('index')}}">Clubs</a>--}}
                <a class="h-menu" href="{{route('activities')}}">{{ __('page.activities')}}</a>
                <a class="h-menu" href="{{route('membership')}}">{{ __('page.memberships_club')}}</a>
                <a class="h-menu" href="{{route('faqs')}}">{{ __('page.support_and_contact')}}</a>
                <a class="h-menu" href="{{route('news')}}">{{ __('page.news')}}</a>
                <a class="h-menu" href="{{route('packages')}}">{{ __('page.packages')}}</a>


				{{--                <ul class="translate">--}}

				{{--                    @foreach( $langsSettings as $oneLang )--}}

				{{--                        <li>--}}
				{{--                            <a href="#" onclick="doGTranslate('{{$langFrom}}|{{$oneLang['GTLangName']}}');">--}}
				{{--                                <span>--}}
				{{--                           {{$oneLang['text']}}--}}
				{{--                        </span>--}}

				{{--                            </a>--}}
				{{--                        </li>--}}
				{{--                    @endforeach--}}

				{{--                </ul>--}}

            </nav>
            <div class="wrap_lang">
            	<div class="head_busket" onclick="busketOpen()">
            		<img src="/img/busket.png" alt="img">

            		<span>0</span>
            	</div>
            	@if(Auth::check())
                   <a class="h-account" title="{{Auth::user()->nickname}}" href="{{route('my_account', Auth::id())}}">
                        <img src="/images/icons/account.png" alt="account">
                        <span style="display: flex;">{{Auth::user()->nickname}}</span>
                    </a>
                @elseif(app()->isLocale('ru'))
                    <a class="h-account h-account-login">
                        <img src="/images/icons/account.png" alt="account">
                    </a>
                @else
                    <a class="h-account h-account-login">
                        <img src="/images/icons/account.png" alt="account">
                    </a>
                @endif

                <div class="nav_lang">

                    <a href="{{ route('setlocale', ['lang' => 'en']) }}" class="lang_ru lang_link @if(app()->isLocale('en')) active @endif">
                        EN
                    </a>
                    <a href="{{ route('setlocale', ['lang' => 'ru']) }}" class="lang_ru lang_link @if(app()->isLocale('ru')) active @endif">
                        RU
                    </a>
                    <a href="{{ route('setlocale', ['lang' => 'fi']) }}" class="lang_ru lang_link @if(app()->isLocale('fi')) active @endif">
                        FI
                    </a>
                    <a href="{{ route('setlocale', ['lang' => 'et']) }}" class="lang_ru lang_link @if(app()->isLocale('et')) active @endif">
                        ET
                    </a>
                    <img src="/images/icons/arrow.png" class="arr_rect_svg" alt="img">
{{--                    @php--}}
{{--                        $langFrom = 'en'; # С какого языка переводим. (Исходный язык сайта)--}}
{{--                        $langFlagsImgFolder = 'public\\Flags'; # Путь к папке с флагами.--}}

{{--                        $langsSettings = array(--}}
{{--                             # Подпись рядом с флагом--}}

{{--                            [ 'GTLangName'        => 'et',--}}
{{--                              'text'            => 'ET', ],--}}

{{--                            [ 'GTLangName'        => 'fi',--}}
{{--                                'text'            => 'FI', ],--}}
{{--                            [ 'GTLangName'        => 'ru',--}}
{{--                                'text'            => 'RU', ],--}}
{{--                        );--}}
{{--                    @endphp--}}

{{--                    @foreach( $langsSettings as $oneLang )--}}
{{--                        <a href="#" class="lang_ru lang_link @if(app()->isLocale($oneLang['GTLangName'])) active @endif"--}}
{{--                           onclick="doGTranslate('{{$langFrom}}|{{$oneLang['GTLangName']}}');">--}}
{{--                            {{$oneLang['text']}}--}}
{{--                        </a>--}}

{{--                        <a href="#" class="lang_ru lang_link"--}}
{{--                           onclick="doGTranslate('{{$langFrom}}|{{$oneLang['GTLangName']}}');">--}}
{{--                            {{$oneLang['text']}}--}}
{{--                        </a>--}}
                        {{--                                                <li>--}}
                        {{--                                                    <a href="#" onclick="doGTranslate('{{$langFrom}}|{{$oneLang['GTLangName']}}');">--}}

                        {{--                                                        <img height="20" width="30"--}}
                        {{--                                                             alt="{{$oneLang['img-alt']}}"--}}
                        {{--                                                             src="{{$langFlagsImgFolder}}\{{$oneLang['image-flag-name']}}.png">--}}

                        {{--                                                        <span>--}}
                        {{--                                                   {{$oneLang['text']}}--}}
                        {{--                                                </span>--}}

                        {{--                                                    </a>--}}
                        {{--                                                </li>--}}
{{--                    @endforeach--}}

{{--                    <img src="/images/icons/arrow.png" class="arr_rect_svg">--}}

                </div>
                <label class="nav-toggle" for="nav-toggle" onclick=""><img
                        src="{{asset('images/icons/icons_tickets/menu_burger.png')}}" alt="img"></label>
	            <!-- END Main Menu-->
	        </div>
					<script>
						function closeModal(elem) {
							$(elem).attr('style','display: none;')
						}
					</script>

	        @if(session('status'))
							<div style="text-align: center" class="alert alert-primary" onclick="closeModal(this)" title="Закрыть">
	                {!! session('status') !!}
	            </div>
	        @endif
	     </div>

    </header>
    <style>
        .nav_lang {
            position: relative;
        }

        .nav_lang:before {
            content: "";
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
            display: block;
            position: absolute;
            width: 150%;
            left: -10px;
            top: -10px;
            height: 150px;
            background: rgba(20, 20, 20, 0.578125);
        }

        .nav_lang:hover:before {
            opacity: 1;
            visibility: visible;
        }

        .lang_link {
            transition: all 0.3s ease;
        }

        .nav_lang .lang_link.active {
            position: relative;
            opacity: 1;
            visibility: visible;
            top: auto;
            margin-top: 4px;
        }

        .lang_link {
            opacity: 0;
            visibility: hidden;
            position: absolute;
        }

        .lang_link:nth-child(1) {
            top: 30px;
        }

        .lang_link:nth-child(2) {
            top: 60px;
        }

        .lang_link:nth-child(3) {
            top: 90px;
        }

        .nav_lang:hover .lang_link {
            opacity: 1;
            visibility: visible;
        }

        .ic_yt_svg,
        .ic_fb_svg,
        .ic_tg_svg,
        .ic_vb_svg {
            min-width: 26px;
            min-height: 26px;
            max-width: 26px;
            max-height: 26px;
        }

        .rus-flag,
        .uk-flag,
        .en_lang_svg {
            min-width: 29px;
            min-height: 21px;
            max-width: 29px;
            max-height: 21px;
            margin-right: 6px;
        }

        .uk_blue,
        .uk_yellow {
            height: 10.5px;
            width: 100%;
        }

        .uk_blue {
            background: #005bbb;
        }

        .uk_yellow {
            background: #ffd500;
        }

        .rf_white,
        .rf_blue,
        .rf_red {
            height: 7px;
            width: 100%;
        }

        .rf_white {
            background: #fff;
        }

        .rf_blue {
            background: #0039a6;
        }

        .rf_red {
            background: #d52b1e;
        }

        .nav_lang {
            position: relative;
            padding-right: 16px;
        }

        .lang_ru {
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
            line-height: 19px;
            /* identical to box height, or 116% */
            text-align: center;
            color: #EEEEEE;
            display: flex;
            align-items: center;
        }

        .lang_ru:hover {
            color: #EEEEEE;
        }

        .arr_rect_svg {
            min-width: 13px;
            min-height: 6px;
            max-width: 13px;
            max-height: 6px;
            position: absolute;
            right: 0;
            top: 14px;
        }
    </style>
