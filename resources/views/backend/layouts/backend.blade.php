<!DOCTYPE html>
<html class="h-full" data-kt-theme="true" data-kt-theme-mode="light" dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Admin Dashboard')</title>
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('dashboard-html/dist/assets/media/app/apple-touch-icon.png') }}">
        <link rel="icon" sizes="32x32" type="image/png" href="{{ asset('dashboard-html/dist/assets/media/app/favicon-32x32.png') }}">
        <link rel="icon" sizes="16x16" type="image/png" href="{{ asset('dashboard-html/dist/assets/media/app/favicon-16x16.png') }}">
        <link rel="shortcut icon" href="{{ asset('dashboard-html/dist/assets/media/app/favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('dashboard-html/dist/assets/vendors/apexcharts/apexcharts.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard-html/dist/assets/vendors/keenicons/styles.bundle.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard-html/dist/assets/css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/toastr/toastr.min.css') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body class="antialiased flex h-full text-base text-foreground bg-background demo1 kt-sidebar-fixed kt-header-fixed">
        <script>
            const defaultThemeMode = 'light';
            let themeMode;

            if (document.documentElement) {
                if (localStorage.getItem('kt-theme')) {
                    themeMode = localStorage.getItem('kt-theme');
                } else if (document.documentElement.hasAttribute('data-kt-theme-mode')) {
                    themeMode = document.documentElement.getAttribute('data-kt-theme-mode');
                } else {
                    themeMode = defaultThemeMode;
                }

                if (themeMode === 'system') {
                    themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                }

                document.documentElement.classList.add(themeMode);
            }
        </script>

        <div class="flex grow">
            <aside class="kt-sidebar bg-background border-e border-e-border fixed top-0 bottom-0 z-20 hidden lg:flex flex-col items-stretch shrink-0 [--kt-drawer-enable:true] lg:[--kt-drawer-enable:false]" data-kt-drawer="true" data-kt-drawer-class="kt-drawer kt-drawer-start top-0 bottom-0" id="sidebar" aria-label="Admin sidebar">
                <div class="kt-sidebar-header hidden lg:flex items-center relative justify-between px-3 lg:px-6 shrink-0" id="sidebar_header">
                    <a class="dark:hidden" href="{{ route('admin.dashboard') }}">
                        <img class="default-logo min-h-[22px] max-w-none" src="{{ asset('dashboard-html/dist/assets/media/app/default-logo.svg') }}" alt="{{ config('app.name') }}">
                        <img class="small-logo min-h-[22px] max-w-none" src="{{ asset('dashboard-html/dist/assets/media/app/mini-logo.svg') }}" alt="{{ config('app.name') }}">
                    </a>
                    <a class="hidden dark:block" href="{{ route('admin.dashboard') }}">
                        <img class="default-logo min-h-[22px] max-w-none" src="{{ asset('dashboard-html/dist/assets/media/app/default-logo-dark.svg') }}" alt="{{ config('app.name') }}">
                        <img class="small-logo min-h-[22px] max-w-none" src="{{ asset('dashboard-html/dist/assets/media/app/mini-logo.svg') }}" alt="{{ config('app.name') }}">
                    </a>
                    <button class="kt-btn kt-btn-outline kt-btn-icon size-[30px] absolute start-full top-2/4 -translate-x-2/4 -translate-y-2/4" data-kt-toggle="body" data-kt-toggle-class="kt-sidebar-collapse" id="sidebar_toggle" type="button" aria-label="Toggle sidebar" title="Toggle sidebar">
                        <i class="ki-filled ki-black-left-line kt-toggle-active:rotate-180 transition-all duration-300" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="kt-sidebar-content flex grow shrink-0 py-5 pe-2" id="sidebar_content">
                    <div class="kt-scrollable-y-hover grow shrink-0 flex ps-2 lg:ps-5 pe-1 lg:pe-3" data-kt-scrollable="true" data-kt-scrollable-dependencies="#sidebar_header" data-kt-scrollable-height="auto" data-kt-scrollable-wrappers="#sidebar_content" id="sidebar_scrollable">
                        <nav class="kt-menu flex flex-col grow gap-1" data-kt-menu="true" data-kt-menu-accordion-expand-all="false" id="sidebar_menu" aria-label="Admin navigation">
                            @foreach (config('admin_menu.items') as $menuItem)
                                @php($isActive = request()->routeIs($menuItem['route']))
                                <div class="kt-menu-item {{ $isActive ? 'active' : '' }}">
                                    <a class="kt-menu-link flex items-center grow border border-transparent gap-[10px] ps-[10px] pe-[10px] py-[8px] rounded-lg kt-menu-item-active:bg-accent/60 kt-menu-item-active:text-primary hover:bg-accent/60" href="{{ route($menuItem['route']) }}" @if ($isActive) aria-current="page" @endif>
                                        <span class="kt-menu-icon items-start text-muted-foreground kt-menu-item-active:text-primary w-[20px]"><i class="ki-filled {{ $menuItem['icon'] }} text-lg" aria-hidden="true"></i></span>
                                        <span class="kt-menu-title text-sm font-medium text-foreground kt-menu-item-active:text-primary kt-menu-link-hover:!text-primary">{{ $menuItem['title'] }}</span>
                                    </a>
                                </div>
                            @endforeach
                            <div class="kt-menu-item pt-5 pb-2">
                                <span class="kt-menu-heading uppercase text-xs font-medium text-muted-foreground ps-[10px] pe-[10px]">Website</span>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link flex items-center grow border border-transparent gap-[10px] ps-[10px] pe-[10px] py-[8px] rounded-lg hover:bg-accent/60" href="{{ route('home') }}">
                                    <span class="kt-menu-icon items-start text-muted-foreground w-[20px]"><i class="ki-filled ki-home text-lg" aria-hidden="true"></i></span>
                                    <span class="kt-menu-title text-sm font-medium text-foreground kt-menu-link-hover:!text-primary">View Website</span>
                                </a>
                            </div>
                            @stack('sidebar-menu')
                        </nav>
                    </div>
                </div>
            </aside>
            <div class="kt-wrapper flex grow flex-col min-w-0">
                <header class="kt-header fixed top-0 z-10 start-0 end-0 flex items-stretch shrink-0 bg-background border-b border-border/70" data-kt-sticky="true" data-kt-sticky-class="border-b border-border shadow-xs" data-kt-sticky-name="header" id="header">
                    <div class="kt-container-fixed flex justify-between items-center gap-3 h-full">
                        <div class="flex items-center gap-4 min-w-0">
                            <button class="kt-btn kt-btn-icon kt-btn-ghost lg:hidden" data-kt-drawer-toggle="#sidebar" type="button" aria-label="Open navigation" title="Open navigation">
                                <i class="ki-filled ki-menu" aria-hidden="true"></i>
                            </button>
                            <nav class="hidden md:flex items-center gap-7 lg:gap-8 overflow-x-auto whitespace-nowrap text-sm text-[#1f2a44]" aria-label="Dashboard navigation">
                                <a class="font-semibold text-black" href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>Home</a>
                                <a class="font-medium hover:text-primary" href="{{ route('home') }}">Profiles</a>
                                <a class="font-medium hover:text-primary" href="#account-heading">My Account</a>
                                <a class="font-medium hover:text-primary" href="{{ route('home') }}">Network</a>
                                <a class="font-medium hover:text-primary" href="{{ route('home') }}">Store</a>
                                <a class="font-medium hover:text-primary" href="{{ route('admin.login') }}">Authentication</a>
                                <a class="font-medium hover:text-primary" href="{{ route('contact') }}">Help</a>
                            </nav>
                        </div>
                        <div class="flex items-center gap-2.5 sm:gap-4 min-w-0">
                            <button class="kt-btn kt-btn-icon kt-btn-ghost text-gray-500 hover:text-primary" type="button" aria-label="Search" title="Search">
                                <i class="ki-filled ki-magnifier text-xl" aria-hidden="true"></i>
                            </button>
                            <button class="hidden sm:inline-flex kt-btn kt-btn-icon kt-btn-ghost text-gray-500 hover:text-primary" type="button" aria-label="Tasks" title="Tasks">
                                <i class="ki-filled ki-some-files text-xl" aria-hidden="true"></i>
                            </button>
                            <button class="hidden sm:inline-flex kt-btn kt-btn-icon kt-btn-ghost text-gray-500 hover:text-primary" type="button" aria-label="Messages" title="Messages">
                                <i class="ki-filled ki-message-text-2 text-xl" aria-hidden="true"></i>
                            </button>
                            <a class="hidden sm:inline-flex kt-btn kt-btn-icon kt-btn-ghost text-gray-500 hover:text-primary" href="{{ route('admin.dashboard') }}" aria-label="Apps" title="Apps">
                                <i class="ki-filled ki-element-11 text-xl" aria-hidden="true"></i>
                            </a>
                            <a class="block rounded-full border-2 border-green-500 p-0.5" href="#account-heading" aria-label="{{ auth()->user()->name }} account" title="{{ auth()->user()->name }}">
                                <img class="size-8 rounded-full object-cover" src="{{ asset('dashboard-html/dist/assets/media/avatars/300-2.png') }}" alt="{{ auth()->user()->name }}">
                            </a>
                        </div>
                    </div>
                </header>
                <main class="grow pt-5" id="content">
                    <div class="kt-container-fixed" id="contentContainer">
                        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
                            <div class="flex flex-col justify-center gap-2 min-w-0">
                                <h1 class="text-xl font-medium leading-none text-mono">@yield('page-title', 'Dashboard')</h1>
                                @hasSection('page-description')
                                    <p class="text-sm text-secondary-foreground break-words">@yield('page-description')</p>
                                @endif
                            </div>
                            @hasSection('toolbar')
                                <div class="flex flex-wrap items-center gap-2.5">
                                    @yield('toolbar')
                                </div>
                            @endif
                        </div>
                        @yield('content')
                    </div>
                </main>
                <footer class="kt-footer">
                    <div class="kt-container-fixed flex flex-wrap justify-between items-center gap-3 py-5 text-sm text-secondary-foreground">
                        <span>&copy; {{ date('Y') }} {{ config('app.name') }}</span>
                        <a class="hover:text-primary" href="{{ route('home') }}">View Website</a>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('dashboard-html/dist/assets/js/core.bundle.js') }}"></script>
        <script src="{{ asset('dashboard-html/dist/assets/vendors/ktui/ktui.min.js') }}"></script>
        <script src="{{ asset('dashboard-html/dist/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('dashboard-html/dist/assets/js/layouts/demo1.js') }}"></script>
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
        <script>
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 5000,
            };

            @foreach (['success', 'info', 'warning', 'error'] as $flashType)
                @if (session($flashType))
                    toastr.{{ $flashType }}(@json(session($flashType)));
                @endif
            @endforeach

            @if ($errors->any())
                toastr.error(@json($errors->first()));
            @endif
        </script>
        @stack('scripts')
    </body>
</html>
