<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'DevBlog')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <style>
            html {
                scroll-behavior: smooth;
            }

            body {
                font-family: "Inter", sans-serif;
            }
        </style>
    </head>
    <body class="bg-slate-50 text-slate-950 antialiased">
        <header class="sticky top-0 z-40 bg-slate-950/95 text-white shadow-lg shadow-slate-950/10 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-5 py-4 lg:px-8">
                <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2 text-2xl font-extrabold">
                    <span class="text-blue-500">&lt;/&gt;</span>
                    <span>DevBlog</span>
                </a>

                <nav class="hidden items-center gap-8 text-sm font-semibold md:flex">
                    <a href="{{ route('home') }}" @class(['hover:text-blue-400', 'text-blue-400 underline underline-offset-8' => request()->routeIs('home')])>Home</a>
                    <a href="#">Tutorials</a>
                    <a href="#" class="inline-flex items-center gap-1">Categories <span class="text-xs">v</span></a>
                    <a href="#">Resources</a>
                    <a href="{{ route('about') }}" @class(['hover:text-blue-400', 'text-blue-400 underline underline-offset-8' => request()->routeIs('about')])>About</a>
                    <a href="{{ route('contact') }}" @class(['hover:text-blue-400', 'text-blue-400 underline underline-offset-8' => request()->routeIs('contact')])>Contact</a>
                </nav>

                <div class="hidden min-w-0 flex-1 justify-end gap-4 lg:flex">
                    <label class="flex h-10 w-full max-w-xs items-center gap-3 rounded-lg bg-white/10 px-4 text-sm text-slate-300 ring-1 ring-white/10">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35m1.1-5.15a6.25 6.25 0 1 1-12.5 0 6.25 6.25 0 0 1 12.5 0Z" /></svg>
                        <input type="search" placeholder="Search articles..." class="min-w-0 flex-1 bg-transparent outline-none placeholder:text-slate-400">
                        <kbd class="rounded bg-white/10 px-2 py-0.5 text-xs text-slate-200">Ctrl K</kbd>
                    </label>
                    <button type="button" aria-label="Toggle dark mode" class="grid h-10 w-10 place-items-center rounded-full text-slate-200 ring-1 ring-white/10">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12.8A8.5 8.5 0 1 1 11.2 3 6.5 6.5 0 0 0 21 12.8Z" /></svg>
                    </button>
                    <a href="#subscribe" class="rounded-lg bg-blue-500 px-5 py-2.5 text-sm font-bold shadow-lg shadow-blue-500/25 transition hover:bg-blue-400">Subscribe</a>
                </div>
            </div>
        </header>

        @yield('content')

        <footer class="bg-slate-950 text-white">
            <div class="mx-auto grid max-w-7xl gap-10 px-5 py-8 md:grid-cols-4 lg:px-8">
                <div>
                    <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-extrabold"><span class="text-blue-500">&lt;/&gt;</span><span>DevBlog</span></a>
                    <p class="mt-4 max-w-xs text-sm leading-6 text-slate-300">Your go-to place for tech, coding, and development tutorials.</p>
                </div>
                <div>
                    <h3 class="font-bold">Quick Links</h3>
                    <ul class="mt-3 grid gap-2 text-sm text-slate-300"><li><a href="{{ route('home') }}">Home</a></li><li><a href="#">Tutorials</a></li><li><a href="#">Categories</a></li><li><a href="#">Resources</a></li><li><a href="{{ route('about') }}">About</a></li><li><a href="{{ route('contact') }}">Contact</a></li></ul>
                </div>
                <div>
                    <h3 class="font-bold">Categories</h3>
                    <ul class="mt-3 grid gap-2 text-sm text-slate-300"><li><a href="#">Web Development</a></li><li><a href="#">Programming</a></li><li><a href="#">DevOps</a></li><li><a href="#">Databases</a></li><li><a href="#">Tools & Software</a></li></ul>
                </div>
                <div>
                    <h3 class="font-bold">Let's Connect</h3>
                    <p class="mt-4 text-sm leading-6 text-slate-300">Have questions or suggestions? We'd love to hear from you!</p>
                    <a href="{{ route('contact') }}" class="mt-5 inline-flex rounded-lg border border-white/70 px-6 py-3 text-sm font-semibold transition hover:bg-white hover:text-slate-950">Contact Us</a>
                </div>
            </div>
            <div class="mx-auto flex max-w-7xl flex-col gap-3 border-t border-white/10 px-5 py-5 text-sm text-slate-300 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                <p>&copy; 2024 DevBlog. All rights reserved.</p>
                <div class="flex gap-8"><a href="#">Privacy Policy</a><a href="#">Terms of Service</a></div>
            </div>
        </footer>
    </body>
</html>
