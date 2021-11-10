<?php

namespace App\Providers;

use App\Repositories\ClubRepository;
use App\Repositories\Interfaces\RaitingRepositoryInterface;
use App\Service\Photo\Translators\PhotoTranslator;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\ClubRepositoryInterface;
use App\Repositories\EventRepository;
use App\Repositories\FilterRepository;
use App\Repositories\Interfaces\FilterRepositoryInterface;
use App\Repositories\Interfaces\PageRepositoryInterface;
use App\Repositories\PageRepository;
use App\Repositories\RaitingRepository;
use App\Repositories\TicketRepository;
use App\Repositories\UserRepository;
use App\Service\Clubs\ClubService;
use App\Service\Filter\FilterService;
use App\Service\Photo\PhotoService;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            TicketRepositoryInterface::class,
            TicketRepository::class
        );

        $this->app->bind(
            ClubRepositoryInterface::class,
            ClubRepository::class
        );

        $this->app->bind(
            PageRepositoryInterface::class,
            PageRepository::class
        );

        $this->app->bind(
            FilterRepositoryInterface::class,
            FilterRepository::class
        );

        $this->app->bind(
            RaitingRepositoryInterface::class,
            RaitingRepository::class
        );

        $this->app->bind(
            ClubRepositoryInterface::class,
            function($app){
                return new ClubRepository(
                    $app->make(FilterRepositoryInterface::class),
                    $app->make(UserRepositoryInterface::class)
                );
            }
        );
        $this->app->bind(
            ClubService::class,
            function($app){
                return new ClubService(
                    $app->make(ClubRepositoryInterface::class),
                    $app->make(PhotoService::class),
                    $app->make(FilterRepositoryInterface::class),
                    $app->make(TicketRepositoryInterface::class),
                    $app->make(RaitingRepositoryInterface::class)
                );
            }
        );

        $this->app->bind(
            FilterService::class,
            function($app){
                return new FilterService($app->make(FilterRepositoryInterface::class));
            }
        );

        $this->app->bind(
            PhotoService::class,
            function($app){
                return new PhotoService($app->make(PhotoTranslator::class));
            }
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
