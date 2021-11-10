<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Exclusive;
use App\Models\MembershipPrivilege;
use App\Models\Social;
use App\Models\User;
use App\Models\Membership;
use App\Models\News;
use App\Models\Filter;
use App\Models\Event;
use App\Models\Faq;
use App\Models\Club;
use App\Repositories\EventRepository;
use App\Repositories\Interfaces\ClubRepositoryInterface;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function index(Request $request, ClubRepositoryInterface $clubRepository)
    {

        $city = $request->query('city', null) ?? $request->query('title', null);
        $socials = Social::all()->sortBy('id');
        if ($request->has('city')){
            $clubs = $clubRepository->getPaginatedTicket($city);
        }else{
            $clubs = $clubRepository->getPaginatedTicketTitle($city);
        }

        $cities = Filter::where('type', 'city')->get();
        $banners = Banner::where('page','main')->get();

        if(!app()->isLocale('en')){
            foreach ($banners as $banner) {
                if(app()->isLocale('ru')){
                    $banner->title = $banner->title_ru;
                    $banner->description = $banner->description_ru;
                    $banner->subtitle = $banner->subtitle_ru;
                }
                elseif(app()->isLocale('fi')){
                    $banner->title = $banner->title_fi;
                    $banner->description = $banner->description_fi;
                    $banner->subtitle = $banner->subtitle_fi;
                }
                elseif(app()->isLocale('et')){
                    $banner->title = $banner->title_et;
                    $banner->description = $banner->description_et;
                    $banner->subtitle = $banner->subtitle_et;
                }
            }
            foreach ($clubs as $club) {
                if(app()->isLocale('ru')){
                    $club->title = $club->title_ru;
                }
                elseif(app()->isLocale('fi')){
                    $club->title = $club->title_fi;
                }
                elseif(app()->isLocale('et')){
                    $club->title = $club->title_et;
                }
            }
        }
        return view('pages.index', compact('clubs', 'cities','banners','socials'));
    }

    public function cardclub(Club $club)
    {
        $socials = Social::all()->sortBy('id');
        if(app()->isLocale('ru')){
            $club->title = $club->title_ru;
            $club->description = $club->description_ru;
            $club->map = $club->map_ru;
        }
        elseif(app()->isLocale('fi')){
            $club->title = $club->title_fi;
            $club->description = $club->description_fi;
            $club->map = $club->map_fi;
        }
        elseif(app()->isLocale('et')){
            $club->title = $club->title_et;
            $club->description = $club->description_et;
            $club->map = $club->map_et;
        }
        $features = $club->filters->where('type', 'feature');
        $city = $club->filters->where('type', 'city');

        return view('pages.cardclub', compact('club', 'features','city','socials'));
    }

    public function cardNews(News $news){
//        dd($news);
        $socials = Social::all()->sortBy('id');
        if(app()->isLocale('ru')){
            $news->title = $news->title_ru;
            $news->description = $news->description_ru;
            $news->content = $news->content_ru;
        }
        elseif(app()->isLocale('fi')){
            $news->title = $news->title_fi;
            $news->description = $news->description_fi;
            $news->content = $news->content_fi;
        }
        elseif(app()->isLocale('et')){
            $news->title = $news->title_et;
            $news->description = $news->description_et;
            $news->content = $news->content_et;
        }

        return view('pages.news_card',compact('news','socials'));
    }

    public function membership()
    {
        $membership = Membership::first();
        $banners = Banner::where('page','membership')->orderBy('created_at', 'desc')->first();
        $membershipPrivilege = MembershipPrivilege::all();
        if (app()->isLocale('en')){
            foreach($membership->data as $key => $value){
                $membership->data = $key;
            }
        }
        elseif(app()->isLocale('ru')){
            $membership->description = $membership->description_ru;
            $membership->bonus_description = $membership->bonus_description_ru;
            $membership->silver_description = $membership->silver_description_ru;
            $membership->gold_description = $membership->gold_description_ru;
            $membership->diamond_description = $membership->diamond_description_ru;
            $membership->data = $membership->data_ru;
            $banners->title = $banners->title_ru;
            $banners->subtitle = $banners->subtitle_ru;
        }
        elseif(app()->isLocale('fi')){
            $membership->description = $membership->description_fi;
            $membership->bonus_description = $membership->bonus_description_fi;
            $membership->silver_description = $membership->silver_description_fi;
            $membership->gold_description = $membership->gold_description_fi;
            $membership->diamond_description = $membership->diamond_description_fi;
            $membership->data = $membership->data_fi;
            $banners->title = $banners->title_fi;
            $banners->subtitle = $banners->subtitle_fi;
        }
        elseif(app()->isLocale('et')){
            $membership->description = $membership->description_et;
            $membership->bonus_description = $membership->bonus_description_et;
            $membership->silver_description = $membership->silver_description_et;
            $membership->gold_description = $membership->gold_description_et;
            $membership->diamond_description = $membership->diamond_description_et;
            $membership->data = $membership->data_et;
            $banners->title = $banners->title_et;
            $banners->subtitle = $banners->subtitle_et;
        }



        $socials = Social::all()->sortBy('id');
        return view('pages.membership', compact('membership','socials','banners','membershipPrivilege'));
    }

    public function news(Request $request, NewsRepository $newsRepository)
    {
        $city = $request->query('title', null);
        $socials = Social::all()->sortBy('id');
        $newses = $newsRepository->getPaginatedNewsTitle($city);
        $banners = Banner::where('page','news')->orderBy('created_at', 'desc')->first();
        $exclusive = Exclusive::where('page','news')->first();
        if(!app()->isLocale('en')){

            foreach ($newses as $news) {
                if(app()->isLocale('ru')){
                    $news->title = $news->title_ru;
                    $news->content = $news->content_ru;
                    $banners->title = $banners->title_ru;
                    $banners->subtitle = $banners->subtitle_ru;
                    $exclusive->content = $exclusive->content_ru;
                }
                elseif(app()->isLocale('fi')){
                    $news->title = $news->title_fi;
                    $news->content = $news->content_fi;
                    $banners->title = $banners->title_fi;
                    $banners->subtitle = $banners->subtitle_fi;
                    $exclusive->content = $exclusive->content_fi;
                }
                elseif(app()->isLocale('et')){
                    $news->title = $news->title_et;
                    $news->content = $news->content_et;
                    $banners->title = $banners->title_et;
                    $banners->subtitle = $banners->subtitle_et;
                    $exclusive->content = $exclusive->content_et;
                }
            }
        }

//        $newses = News::paginate(10);
        return view('pages.news', compact('newses','socials','banners','exclusive'));
    }

    public function packages(Request $request, EventRepository $eventRepository)
    {
        $city = $request->query('city', null) ?? $request->query('title', null) ?? $request->query('gender', null);
//        var_dump($city);
//        $packages = Event::where('type', 'package')->paginate(10);
        $cities = Filter::where('type', 'city')->get();
        $gender = Filter::where('type', 'gender')->get();
        $banners = Banner::where('page','packages')->orderBy('created_at', 'desc')->first();
        $socials = Social::all()->sortBy('id');
        $exclusive = Exclusive::where('page','packages')->first();


        if ($request->has('city')){
            $packages = $eventRepository->getPaginatedPackagesCity($city);
        }elseif ($request->has('title')){
            $packages = $eventRepository->getPaginatedPackagesTitle($city);
        }elseif ($request->has('gender')){
            $packages = $eventRepository->getPaginatedPackagesGender($city);
        }else{
            $packages = $eventRepository->getPaginatedPackagesCity($city);
        }

        if(app()->isLocale('ru')){
            $banners->title = $banners->title_ru;
            $banners->subtitle = $banners->subtitle_ru;
            $exclusive->content = $exclusive->content_ru;
        }
        elseif(app()->isLocale('fi')){
            $banners->title = $banners->title_fi;
            $banners->subtitle = $banners->subtitle_fi;
            $exclusive->content = $exclusive->content_fi;
        }
        elseif(app()->isLocale('et')){
            $banners->title = $banners->title_et;
            $banners->subtitle = $banners->subtitle_et;
            $exclusive->content = $exclusive->content_et;
        }

        return view('pages.packages', compact('packages', 'cities','gender','socials','banners','exclusive'));
    }

    public function activities(Request $request, EventRepository $eventRepository)
    {
        $city = $request->query('city', null) ?? $request->query('title', null) ?? $request->query('gender', null);
        $cities = Filter::where('type', 'city')->get();
        $gender = Filter::where('type', 'gender')->get();
        $banners = Banner::where('page','activities')->orderBy('created_at', 'desc')->first();
        $socials = Social::all()->sortBy('id');
        $exclusive = Exclusive::where('page','activities')->first();
//        $activities = Event::where('type', 'activity')->paginate(10);

        if ($request->has('city')){
            $activities = $eventRepository->getPaginatedActivitiesCity($city);
        }elseif($request->has('title')){
            $activities = $eventRepository->getPaginatedActivitiesTitle($city);
        }elseif ($request->has('gender')){
            $activities = $eventRepository->getPaginatedActivitiesGender($city);
        }else{
            $activities = $eventRepository->getPaginatedActivitiesCity($city);
        }

        if(app()->isLocale('ru')){
            $banners->title = $banners->title_ru;
            $banners->subtitle = $banners->subtitle_ru;
            $exclusive->content = $exclusive->content_ru;
        }
        elseif(app()->isLocale('fi')){
            $banners->title = $banners->title_fi;
            $banners->subtitle = $banners->subtitle_fi;
            $exclusive->content = $exclusive->content_fi;

        }
        elseif(app()->isLocale('et')){
            $banners->title = $banners->title_et;
            $banners->subtitle = $banners->subtitle_et;
            $exclusive->content = $exclusive->content_et;

        }


        return view('pages.activities', compact('activities', 'cities','gender','socials','banners','exclusive'));
    }

    public function faq()
    {
        $club = Filter::where('type','country')->with('cities.clubs')->get();
        $country = Filter::where('type','country')->count();
        $country_name = Filter::where('type','country')->get();
        $socials = Social::all()->sortBy('id');
        $exclusive = Exclusive::where('page','support-and-contact')->first();
        $count_club_per_country = [];
        for($i = 0; $i < $country; $i++){
            $count = 0;
            for ($j = 0; $j < count($club[$i]['cities']); $j++){
                $count += count($club[$i]['cities'][$j]['clubs']);
            }
            $count_club_per_country[$country_name[$i]['title']] = $count;
        }
        $event = Filter::where('type','country')->with('cities.events')->get();
        $count_event_package_per_country = [];
        for($i = 0; $i < $country; $i++){
            $count = 0;
            for ($j = 0; $j < count($event[$i]['cities']); $j++){
                for ($z = 0; $z < count($event[$i]['cities'][$j]['events']); $z++){
                    if ($event[$i]['cities'][$j]['events'][$z]['type'] == 'package') {
                        $count++;
                    }
                }
            }
            $count_event_package_per_country[$country_name[$i]['title']] = $count;
        }
        $count_event_activity_per_country = [];
        for($i = 0; $i < $country; $i++){
            $count = 0;
            for ($j = 0; $j < count($event[$i]['cities']); $j++){
                for ($z = 0; $z < count($event[$i]['cities'][$j]['events']); $z++){
                    if ($event[$i]['cities'][$j]['events'][$z]['type'] == 'activity') {
                        $count++;
                    }
                }
            }
            $count_event_activity_per_country[$country_name[$i]['title']] = $count;
        }
        if(app()->isLocale('en')){
            $faq = Faq::find(1);
        }elseif(app()->isLocale('ru')){
            $faq = Faq::find(2);
        }elseif(app()->isLocale('fi')){
            $faq = Faq::find(3);
        }elseif (app()->isLocale('et')){
            $faq = Faq::find(4);
        }
        return view('pages.support-contact', compact('faq','exclusive','count_club_per_country','count_event_package_per_country','count_event_activity_per_country','socials'));
    }

    public function myAccount(User $user)
    {
        $socials = Social::all()->sortBy('id');
        if (Auth::user()->can('view', $user)) {
            return view('pages.my_account', compact('user','socials'));
        } else {
            return redirect()->route('my_account', Auth::id());
        }
    }
}
