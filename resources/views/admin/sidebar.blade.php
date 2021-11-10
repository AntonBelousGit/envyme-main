<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">

        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.dashboard') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-3d"></use>
                </svg> {{ __('Dashboard') }}</a></li>
        <li class="c-sidebar-nav-title">{{ __('Settings') }}</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> Пользователи</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.users.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
            </ul>
        </li>
{{--        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">--}}
{{--            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.tickets.index')}}">--}}
{{--                <svg class="c-sidebar-nav-icon">--}}
{{--                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>--}}
{{--                </svg> {{ __('Tickets') }}</a>--}}
{{--            <ul class="c-sidebar-nav-dropdown-items">--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a class="c-sidebar-nav-link" href="{{route('admin.tickets.index')}}">--}}
{{--                        <svg class="c-sidebar-nav-icon">--}}
{{--                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>--}}
{{--                        </svg>--}}
{{--                        <span>{{ __('All tickets') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a class="c-sidebar-nav-link" href="{{route('admin.tickets.create')}}">--}}
{{--                        <svg class="c-sidebar-nav-icon">--}}
{{--                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>--}}
{{--                        </svg>--}}
{{--                        <span>{{ __('Add new') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">--}}
{{--            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.pages.index')}}">--}}
{{--                <svg class="c-sidebar-nav-icon">--}}
{{--                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>--}}
{{--                </svg> {{ __('Pages') }}</a>--}}
{{--            <ul class="c-sidebar-nav-dropdown-items">--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a class="c-sidebar-nav-link" href="{{route('admin.pages.index')}}">--}}
{{--                        <svg class="c-sidebar-nav-icon">--}}
{{--                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>--}}
{{--                        </svg>--}}
{{--                        <span>{{ __('All pages') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a class="c-sidebar-nav-link" href="{{route('admin.pages.create')}}">--}}
{{--                        <svg class="c-sidebar-nav-icon">--}}
{{--                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>--}}
{{--                        </svg>--}}
{{--                        <span>{{ __('Add new') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.clubs.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Клубы</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.clubs.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.clubs.create')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Добавить</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.feedback.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Комментарии</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.feedback.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.filters.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg> Фильтры</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.filters.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.filters.create')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Добавить</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.banners.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Банеры</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.banners.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.banners.create')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Добавить</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.news.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg> Новости</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.news.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.news.create')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Добавить</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.events.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg> Пакеты и активности</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.events.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.events.create')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Добавить</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.faqs.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Поддержка и контакты</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.faqs.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a class="c-sidebar-nav-link" href="{{route('admin.faqs.create')}}">--}}
{{--                        <svg class="c-sidebar-nav-icon">--}}
{{--                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>--}}
{{--                        </svg>--}}
{{--                        <span>Добавить</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.memberships.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Членство            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.memberships.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.benefits.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Привелегии</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.orders.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg> Заказы</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.orders.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a class="c-sidebar-nav-link" href="{{route('admin.faqs.create')}}">--}}
{{--                        <svg class="c-sidebar-nav-icon">--}}
{{--                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>--}}
{{--                        </svg>--}}
{{--                        <span>{{ __('Add new') }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.mails.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Запрос бронирования</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.mails.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.social.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Социальная связь</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.social.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.promo.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Промокоды</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.promo.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.adminmail.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Email администратора</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.adminmail.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="{{route('admin.exclusives.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                </svg>Блок перевода exclusives</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{route('admin.exclusives.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                        </svg>
                        <span>Все</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
