<!DOCTYPE html>
<html class="h-full" data-kt-theme="true" data-kt-theme-mode="light" dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title', 'Admin Dashboard')</title>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('dashboard-html/dist/assets/media/app/apple-touch-icon.png') }}" rel="apple-touch-icon" sizes="180x180">
        <link href="{{ asset('dashboard-html/dist/assets/media/app/favicon-32x32.png') }}" rel="icon" sizes="32x32" type="image/png">
        <link href="{{ asset('dashboard-html/dist/assets/media/app/favicon-16x16.png') }}" rel="icon" sizes="16x16" type="image/png">
        <link href="{{ asset('dashboard-html/dist/assets/media/app/favicon.ico') }}" rel="shortcut icon">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('dashboard-html/dist/assets/vendors/apexcharts/apexcharts.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard-html/dist/assets/vendors/keenicons/styles.bundle.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard-html/dist/assets/css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/toastr/toastr.min.css') }}" rel="stylesheet">
        <style>
            .page-bg {
                background-image: url("{{ asset('dashboard-html/dist/assets/media/images/2600x1200/bg-10.png') }}");
            }

            .dark .page-bg {
                background-image: url("{{ asset('dashboard-html/dist/assets/media/images/2600x1200/bg-10-dark.png') }}");
            }
        </style>
    </head>
    <body class="antialiased flex h-full text-base text-foreground bg-background">
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

        <div class="flex items-center justify-center grow bg-center bg-no-repeat page-bg px-4 py-8">
            @yield('content')
        </div>

        <script src="{{ asset('dashboard-html/dist/assets/js/core.bundle.js') }}"></script>
        <script src="{{ asset('dashboard-html/dist/assets/vendors/ktui/ktui.min.js') }}"></script>
        <script src="{{ asset('dashboard-html/dist/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
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
    </body>
</html>
