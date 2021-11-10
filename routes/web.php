<?php

use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Locale;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


$locale = app()->getLocale();
$segment = request()->segment(1);
$prefix_session = (strlen($segment) === 2 && empty(session()->get('prefix')) ? ['prefix' => $segment] : ['prefix' => '']);
$locale_session = (strlen($segment) === 2 ? ['locale' => $segment] : ['locale' => config('app.locale')]);
session($prefix_session);

if(in_array($locale, config('app.locales')) && $locale !== $segment){
    session($locale_session);
    app()->setLocale(Locale::getCurrentLanguage());
}
Route::get('/welcome', function(){
    return view('welcome');
});
Route::group([
    'middleware' => ['localize'],
    'prefix' => Locale::getPrefix()
], function() {
    Route::get('/', 'MainController@index')->name('index');
    Route::get('/membership', 'MainController@membership')->name('membership');
    Route::get('/my-account/{user}', 'MainController@myAccount')->name('my_account')->middleware('auth');
    Route::post('/change-account/{user}','Admin\UserController@update2')->name('change_my_account')->middleware('auth');
    Route::get('/news', 'MainController@news')->name('news');
    Route::get('/news/{news:slug}', 'MainController@cardNews')->name('news_card');
    Route::get('/cardclub/{club:slug}', 'MainController@cardClub')->name('card_club');
    Route::post('/send-feedback', 'Admin\FeedbackController@sendFeedback')->name('send_feedback')->middleware('auth');
    Route::get('/packages', 'MainController@packages')->name('packages');
    Route::get('/package/{package:slug}', 'Admin\EventController@getPackage')->name('package_card');
    Route::get('/activities', 'MainController@activities')->name('activities');
    Route::get('/activity/{activity:slug}', 'Admin\EventController@getActivity')->name('activity_card');
    Route::get('/support-and-contact', 'MainController@faq')->name('faqs');
    Route::post('/user-update/{user}', 'Admin\UserController@update')->name('user_update')->middleware('auth');
    Route::post('/check-promo-code', 'PaymentController@checkDiscount')->name('check_promo')->middleware('auth');
    Route::post('/get-current-order', 'Admin\OrderController@getCurrentOrder')->name('get_current_order')->middleware('auth');
    Route::post('/get-current-order-busket', 'Admin\OrderController@getCurrentOrderBusket')->name('get_current_order_busket')->middleware('auth');
//    Route::post('/get-current-order', 'Admin\OrderController@getCurrentOrder')->name('get_current_order');

    Route::get('/club/{club}', 'Admin\ClubController@show')->name('club.show');
    Route::get('/orders/{order}', 'Admin\OrderController@show2')->name('admin.orders.show2');
    Route::get('/is-authenticated', 'Auth\AuthController@isAuthenticated')->name('is_authenticated');
    Route::post('/add-ticket-order', 'Admin\OrderController@addTicketToOrder')->name('add_ticket_order')->middleware('auth');
    Route::get('/delete-club/{club_id}', 'Admin\OrderController@removeClubFromCart')->name('delete_club')->middleware('auth');

    Route::post('/change-amount-tickets', 'Admin\OrderController@changeAmountTickets')->name('change_amount_tickets')->middleware('auth');
    Route::get('/register', 'Auth\AuthController@register')->name('register');
    Route::post('/register', 'Auth\AuthController@storeUser')->name('userStore');
    Route::get('activate/{id}/{token}', 'Auth\AuthController@activation')->name('activation');

    Route::get('/login', 'Auth\AuthController@login')->name('login');
    Route::post('/login', 'Auth\AuthController@authenticate');
    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
    Route::get('setlocale/{lang}', function ($lang) {
        session(['locale' => $lang]);
        $prefix_session = $lang === Locale::$mainLanguage ? ['prefix' => ''] : ['prefix' => $lang];
        session($prefix_session);

        $referrer = url()->previous();
        $prefix = Locale::getPrefix();
        $referrer = explode('/', $referrer);

        if (!empty($referrer[3]) && in_array($referrer[3], config('app.locales'))) {
            $path_without_lang_mark = implode('/', array_slice($referrer, 4));
        } else {
            $path_without_lang_mark = implode('/', array_slice($referrer, 3));
        }

        return redirect("{$prefix}/{$path_without_lang_mark}");
    })->name('setlocale');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['isAdmin', 'auth'],
    'namespace' => 'Admin',
    'as' => 'admin.'
], function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('users', 'UserController', ['except' => ['create', 'show', 'store','update2']]);
    Route::resource('orders', 'OrderController', ['except' => ['create', 'store', 'edit', 'update', 'show','show2']]);
//    Route::resource('memberships', 'MembershipConrtoller', ['except' => ['create', 'store', 'edit', 'show', 'delete']]);
    Route::resource('adminmail', 'AdminMailController');
    Route::resource('exclusives', 'ExclusiveController');
    Route::resource('benefits', 'MembershipPrivilegeController');
    Route::resource('promo', 'PromoController');
    Route::resource('feedback','FeedbackController',['except' => ['create', 'store', 'edit', 'update', 'show', 'delete']]);
    Route::resources([
        'tickets' => 'TicketController',
        'pages' => 'PageController',
        'clubs' => 'ClubController',
        'filters' => 'FilterController',
        'banners' => 'BannerController',
        'news' => 'NewsController',
        'events' => 'EventController',
        'faqs' => 'FaqController',
        'mails' => 'BookingRequestController',
        'feedback' =>'FeedbackController',
        'social' => 'SocialController',
        'memberships'=>'MembershipConrtoller',
    ]);
});

Route::post('make-payment', 'PaymentController@makePayment')->name('make_payment')->middleware('auth');
Route::get('cancel-payment', 'PaymentController@paymentCancel')->name('cancel.payment');
Route::get('payment-success', 'PaymentController@paymentSuccess')->name('success.payment');

Route::post('/clubs/add-photo', 'Admin\ClubController@addPhoto')->name('club_add_photo');
Route::post('/clubs/remove-photo', 'Admin\ClubController@removePhoto')->name('club_remove_photo');
Route::post('/membership/add-photo', 'Admin\MembershipConrtoller@addPhoto')->name('membership_add_photo');
Route::post('/membership/remove-photo', 'Admin\MembershipConrtoller@removePhoto')->name('membership_remove_photo');
Route::post('/events/add-photo', 'Admin\EventController@addPhoto')->name('event_add_photo');
Route::post('/events/remove-photo', 'Admin\EventController@removePhoto')->name('event_remove_photo');
Route::post('/banners/add-photo', 'Admin\BannerController@addPhoto')->name('banner_add_photo');
Route::post('/banners/remove-photo', 'Admin\BannerController@removePhoto')->name('banner_remove_photo');
Route::post('/news/add-photo', 'Admin\NewsController@addPhoto')->name('news_add_photo');
Route::post('/news/remove-photo', 'Admin\NewsController@removePhoto')->name('news_remove_photo');
Route::post('/sendmail', 'Ajax\ContactController@send')->name('ajax_contact_send');
Route::post('/storemail', 'Ajax\ContactController@store')->name('ajax_contact_store');
Route::post('/savesubscribers', 'SignUpController@subscribe')->name('subscribe');

Route::get('forget-password', 'ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');


//qr
Route::get('/qrcode','QrcodeController@index')->name('qrcode');

//email verufy


Route::get('clear',function (){

    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');

    return 'cleared';
});
Route::get('migrate',function (){

    Artisan::call('migrate');
//    Artisan::call('db:seed');


    return 'eeee';
});
Route::get('composer',function (){

    if(shell_exec('composer dump_autoload')){
        return 'yes';
    }else{
        return 'no';
    }
});
