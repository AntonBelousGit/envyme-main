<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Request;
use URL;
use Redirect;

class Locale
{
     public static $mainLanguage = 'en';

     public static function getCurrentLanguage() {
        return session()->get('locale', self::$mainLanguage);
     }

     public static function getPrefix() {
         $locale = session()->get('prefix', self::$mainLanguage);
         if($locale === self::$mainLanguage){
           return '';
         }

         return $locale;
     }
    /*
    * Устанавливает язык приложения в зависимости от метки языка из URL
    */
    public function handle($request, Closure $next)
    {
        $lang = self::getCurrentLanguage();

        if($lang !== self::$mainLanguage) {
          app()->setLocale($lang);
        } else {
          app()->setLocale(self::$mainLanguage);
        }

      return $next($request); //пропускаем дальше - передаем в следующий посредник
    }

}
