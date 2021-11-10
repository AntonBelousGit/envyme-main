<?php

namespace App\Providers;

use App\Repositories\Interfaces\ClubRepositoryInterface;
use App\Repositories\EventRepository;
use App\Service\Clubs\ClubService;
use App\Service\Pages\Handlers\PageHandler;
use App\Repositories\Interfaces\FilterRepositoryInterface;
use App\Service\FilterService;
use Illuminate\Support\ServiceProvider;

class HandlerServiceProvider extends ServiceProvider
{
    public function register()
    {

    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            PageHandler::class,
            function($app){
                return new PageHandler($app->make(PageRepositoryInterface::class));
            }
        );
    }
}
