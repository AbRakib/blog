<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevBlog</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: "Inter", sans-serif;
            }
        </style>
    </head>
    <body class="bg-slate-50 text-slate-950 antialiased">
        <header class="relative overflow-hidden bg-slate-950 text-white">
            <img
                src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&w=1800&q=85"
                alt="Developer workspace with code editor open on a laptop"
                class="absolute inset-0 h-full w-full object-cover opacity-45"
            >
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-slate-950/35"></div>

            <div class="relative mx-auto flex max-w-7xl items-center justify-between px-6 py-6 lg:px-10">
                <a href="#" class="flex items-center gap-2 text-2xl font-extrabold">
                    <span class="text-blue-500">&lt;/&gt;</span>
                    <span>DevBlog</span>
                </a>

                <nav class="hidden items-center gap-10 text-sm font-semibold md:flex">
                    <a href="#" class="text-blue-400 underline underline-offset-4">Home</a>
                    <a href="#">Tutorials</a>
                    <a href="#">Categories</a>
                    <a href="#">Resources</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('contact') }}">Contact</a>
                </nav>

                <div class="flex items-center gap-5">
                    <button type="button" aria-label="Search" class="hidden text-white/90 sm:block">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35m1.1-5.15a6.25 6.25 0 1 1-12.5 0 6.25 6.25 0 0 1 12.5 0Z" />
                        </svg>
                    </button>
                    <a href="#" class="rounded-lg bg-blue-500 px-6 py-3 text-sm font-bold shadow-lg shadow-blue-500/30 transition hover:bg-blue-400">Subscribe</a>
                </div>
            </div>

            <section class="relative mx-auto grid max-w-7xl px-6 pb-20 pt-12 lg:min-h-[540px] lg:px-10 lg:pt-16">
                <div class="max-w-2xl">
                    <p class="mb-5 text-sm font-bold uppercase tracking-[0.35em] text-slate-300">Learn &bull; Build &bull; Grow</p>
                    <h1 class="text-5xl font-extrabold leading-tight tracking-normal sm:text-6xl">
                        Tech, Coding, &amp; Dev Tutorials
                        <span class="text-sky-400">(Highly Recommended)</span>
                    </h1>
                    <p class="mt-5 max-w-xl text-lg leading-8 text-slate-100">Step-by-step tutorials, practical tips, and real-world projects to help you grow as a developer.</p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="#" class="inline-flex items-center gap-2 rounded-lg bg-blue-500 px-7 py-4 text-sm font-bold shadow-xl shadow-blue-500/25 transition hover:bg-blue-400">
                            Explore Tutorials
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                        <a href="#" class="inline-flex items-center rounded-lg border border-white/70 px-7 py-4 text-sm font-bold transition hover:bg-white hover:text-slate-950">Read Latest Posts</a>
                    </div>

                    <div class="mt-10 flex flex-wrap gap-8 text-white">
                        <div>
                            <p class="text-3xl font-extrabold">500+</p>
                            <p class="mt-1 text-sm text-slate-200">Tutorials</p>
                        </div>
                        <div class="hidden h-9 w-px bg-white/20 sm:block"></div>
                        <div>
                            <p class="text-3xl font-extrabold">100K+</p>
                            <p class="mt-1 text-sm text-slate-200">Readers</p>
                        </div>
                        <div class="hidden h-9 w-px bg-white/20 sm:block"></div>
                        <div>
                            <p class="text-3xl font-extrabold">4.9&starf;</p>
                            <p class="mt-1 text-sm text-slate-200">Community Rating</p>
                        </div>
                    </div>
                </div>
            </section>
        </header>

        <main>
            <section class="bg-white py-10 shadow-sm">
                <div class="mx-auto grid max-w-7xl grid-cols-2 gap-8 px-6 text-center sm:grid-cols-3 lg:grid-cols-6 lg:px-10">
                    @foreach ([
                        ['Web Development', 'text-blue-500 bg-blue-100', 'M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm0 0c2.5 2.7 3.75 6 3.75 10S14.5 19.3 12 22m0-20C9.5 4.7 8.25 8 8.25 12s1.25 7.3 3.75 10M2 12h20'],
                        ['Programming', 'text-rose-500 bg-rose-100', 'm10 16-4-4 4-4m4 8 4-4-4-4'],
                        ['Databases', 'text-emerald-500 bg-emerald-100', 'M12 4c4.4 0 8 1.35 8 3s-3.6 3-8 3-8-1.35-8-3 3.6-3 8-3Zm-8 3v10c0 1.65 3.6 3 8 3s8-1.35 8-3V7m-16 5c0 1.65 3.6 3 8 3s8-1.35 8-3'],
                        ['DevOps', 'text-violet-500 bg-violet-100', 'M12 8.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7Zm8.3 3.5a8 8 0 0 0-.15-1.55l2-1.55-2-3.45-2.35.95a8.3 8.3 0 0 0-2.7-1.55L14.75 2h-5.5L8.9 4.85A8.3 8.3 0 0 0 6.2 6.4l-2.35-.95-2 3.45 2 1.55A8 8 0 0 0 3.7 12c0 .52.05 1.03.15 1.55l-2 1.55 2 3.45 2.35-.95a8.3 8.3 0 0 0 2.7 1.55L9.25 22h5.5l.35-2.85a8.3 8.3 0 0 0 2.7-1.55l2.35.95 2-3.45-2-1.55c.1-.52.15-1.03.15-1.55Z'],
                        ['Tools & Software', 'text-amber-500 bg-amber-100', 'm14.7 6.3 3-3a4 4 0 0 1-5.35 5.35l-7.7 7.7a2.1 2.1 0 1 1-2.98-2.98l7.7-7.7A4 4 0 0 1 14.7 6.3Z'],
                        ['Career & Freelancing', 'text-pink-500 bg-pink-100', 'M9 6V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1m5 4v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8m0 0h16m-16 0 3 3h10l3-3'],
                    ] as [$name, $classes, $path])
                        <a href="#" class="group flex flex-col items-center gap-4">
                            <span class="{{ $classes }} flex h-18 w-18 items-center justify-center rounded-xl p-4 transition group-hover:-translate-y-1">
                                <svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                </svg>
                            </span>
                            <span class="font-bold text-slate-900">{{ $name }}</span>
                        </a>
                    @endforeach
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-6 py-14 lg:px-10">
                <div class="mb-8 flex items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-extrabold text-slate-950">Latest Tutorials</h2>
                        <p class="mt-2 text-lg text-slate-500">From beginner guides to advanced topics &mdash; handpicked for you.</p>
                    </div>
                    <a href="#" class="hidden items-center gap-2 text-sm font-bold text-blue-500 sm:inline-flex">View All Posts <span aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="grid gap-8 lg:grid-cols-3">
                    @foreach ([
                        ['React for Beginners: A Step-by-Step Guide', 'Learn the basics of React, build your first component, and understand how modern web apps work.', 'Alex Carter', 'Mar 15, 2024', '8 min read', 'WEB DEVELOPMENT', 'React for Beginners', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', 'text-blue-500', route('tutorials.react-for-beginners')],
                        ['10 Python Projects to Build Your Skills', 'Hands-on Python projects that will help you practice and build a strong portfolio.', 'Priya Sharma', 'Mar 12, 2024', '6 min read', 'PROGRAMMING', 'Python Practical Projects', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg', 'text-rose-500', '#'],
                        ['15 VS Code Tips & Tricks for Higher Productivity', 'Supercharge your development workflow with these must-know VS Code tips.', 'Daniel Kim', 'Mar 10, 2024', '5 min read', 'TOOLS', 'VS Code Tips & Tricks', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg', 'text-violet-500', '#'],
                    ] as [$title, $excerpt, $author, $date, $read, $badge, $heroTitle, $icon, $badgeColor, $url])
                        <article class="overflow-hidden rounded-lg bg-white shadow-xl shadow-slate-200/70 ring-1 ring-slate-200">
                            <a href="{{ $url }}" class="relative flex h-40 items-center gap-6 bg-slate-950 px-9 text-white">
                                <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-blue-950"></div>
                                <img src="{{ $icon }}" alt="" class="relative h-24 w-24 object-contain">
                                <h3 class="relative text-3xl font-extrabold leading-tight">{{ $heroTitle }}</h3>
                            </a>
                            <div class="relative px-6 pb-7 pt-6">
                                <span class="{{ $badgeColor }} absolute -top-5 rounded-md bg-white px-4 py-2 text-xs font-extrabold shadow-md">{{ $badge }}</span>
                                <h4 class="text-xl font-extrabold leading-snug text-slate-950"><a href="{{ $url }}" class="transition hover:text-blue-600">{{ $title }}</a></h4>
                                <p class="mt-3 leading-7 text-slate-500">{{ $excerpt }}</p>
                                <div class="mt-8 flex items-center gap-4">
                                    <img src="https://i.pravatar.cc/80?u={{ urlencode($author) }}" alt="{{ $author }}" class="h-10 w-10 rounded-full">
                                    <div class="text-sm">
                                        <p class="font-semibold text-slate-950">{{ $author }}</p>
                                        <p class="text-slate-500">{{ $date }} <span class="px-1">&bull;</span> {{ $read }}</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            <section class="bg-gradient-to-r from-blue-50 via-white to-blue-100">
                <div class="mx-auto grid max-w-7xl items-center gap-10 px-6 py-14 lg:grid-cols-[1.2fr_0.8fr] lg:px-10">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.3em] text-blue-300">Stay Updated</p>
                        <h2 class="mt-4 text-3xl font-extrabold text-blue-950 sm:text-4xl">Get the Latest Tutorials in Your Inbox</h2>
                        <p class="mt-3 text-lg text-slate-600">Join thousands of developers and never miss a new tutorial.</p>
                        <form class="mt-6 flex max-w-2xl flex-col gap-0 sm:flex-row">
                            <label class="sr-only" for="email">Email address</label>
                            <input id="email" type="email" placeholder="Enter your email address" class="min-h-14 flex-1 rounded-lg border border-slate-200 bg-white px-6 text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-blue-400 sm:rounded-r-none">
                            <button type="submit" class="min-h-14 rounded-lg bg-blue-500 px-9 font-bold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-400 sm:rounded-l-none">Subscribe</button>
                        </form>
                    </div>

                    <div class="hidden justify-end lg:flex">
                        <div class="relative w-96">
                            <div class="absolute left-4 top-12 h-16 w-32 rounded-full bg-blue-200/60"></div>
                            <div class="relative ml-auto flex h-44 w-72 rotate-[-8deg] items-center justify-center rounded-2xl bg-white/80 shadow-xl shadow-blue-200/60">
                                <svg class="absolute left-6 top-4 h-20 w-20 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m3 10 18-7-7 18-3-8-8-3Zm8 3 10-10" />
                                </svg>
                                <p class="ml-24 text-3xl font-extrabold leading-tight text-blue-950">Better<br>Developers<br>Brighter<br>Futures</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-slate-950 text-white">
            <div class="mx-auto grid max-w-7xl gap-10 px-6 py-10 md:grid-cols-4 lg:px-10">
                <div>
                    <a href="#" class="flex items-center gap-2 text-2xl font-extrabold">
                        <span class="text-blue-500">&lt;/&gt;</span>
                        <span>DevBlog</span>
                    </a>
                    <p class="mt-5 max-w-xs text-sm leading-6 text-slate-300">Your go-to place for tech, coding, and development tutorials.</p>
                    <div class="mt-6 flex gap-3 text-white">
                        <a href="#" aria-label="GitHub" class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/10 transition hover:-translate-y-0.5 hover:bg-white hover:text-slate-950">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.1 3.29 9.42 7.86 10.95.58.1.79-.25.79-.55v-2.14c-3.2.69-3.88-1.36-3.88-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.04-.71.08-.7.08-.7 1.16.08 1.77 1.19 1.77 1.19 1.03 1.76 2.7 1.25 3.36.96.1-.75.4-1.25.73-1.54-2.55-.29-5.24-1.28-5.24-5.68 0-1.26.45-2.28 1.18-3.08-.12-.29-.51-1.46.12-3.04 0 0 .97-.31 3.16 1.18a10.9 10.9 0 0 1 5.76 0c2.19-1.49 3.15-1.18 3.15-1.18.63 1.58.24 2.75.12 3.04.74.8 1.18 1.82 1.18 3.08 0 4.41-2.69 5.38-5.25 5.67.41.36.78 1.06.78 2.14v3.18c0 .31.21.66.79.55A11.51 11.51 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5Z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="Twitter" class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/10 transition hover:-translate-y-0.5 hover:bg-sky-400">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M18.24 2.25h3.31l-7.24 8.27 8.52 11.23h-6.67l-5.22-6.82-5.98 6.82H1.65l7.74-8.85L1.22 2.25h6.84l4.72 6.23 5.46-6.23Zm-1.16 17.52h1.84L7.06 4.13H5.09l11.99 15.64Z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="YouTube" class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/10 transition hover:-translate-y-0.5 hover:bg-red-600">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M23.5 6.19a3 3 0 0 0-2.11-2.12C19.52 3.57 12 3.57 12 3.57s-7.52 0-9.39.5A3 3 0 0 0 .5 6.19 31.34 31.34 0 0 0 0 12a31.34 31.34 0 0 0 .5 5.81 3 3 0 0 0 2.11 2.12c1.87.5 9.39.5 9.39.5s7.52 0 9.39-.5a3 3 0 0 0 2.11-2.12A31.34 31.34 0 0 0 24 12a31.34 31.34 0 0 0-.5-5.81ZM9.55 15.57V8.43L15.82 12l-6.27 3.57Z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="LinkedIn" class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/10 transition hover:-translate-y-0.5 hover:bg-blue-600">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.42v1.56h.05a3.75 3.75 0 0 1 3.37-1.85c3.61 0 4.27 2.38 4.27 5.47v6.27ZM5.32 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12Zm1.78 13.02H3.54V9H7.1v11.45ZM22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.21 0 22.23 0Z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold">Quick Links</h3>
                    <ul class="mt-4 grid gap-2 text-sm text-slate-300">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Tutorials</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Resources</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold">Categories</h3>
                    <ul class="mt-4 grid gap-2 text-sm text-slate-300">
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Programming</a></li>
                        <li><a href="#">Databases</a></li>
                        <li><a href="#">DevOps</a></li>
                        <li><a href="#">Tools & Software</a></li>
                        <li><a href="#">Career & Freelancing</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold">Let's Connect</h3>
                    <p class="mt-4 text-sm leading-6 text-slate-300">Have questions or suggestions? We'd love to hear from you!</p>
                    <a href="{{ route('contact') }}" class="mt-5 inline-flex rounded-lg border border-white/70 px-6 py-3 text-sm font-semibold transition hover:bg-white hover:text-slate-950">Contact Us</a>
                </div>
            </div>

            <div class="mx-auto flex max-w-7xl flex-col gap-4 border-t border-white/10 px-6 py-5 text-sm text-slate-300 sm:flex-row sm:items-center sm:justify-between lg:px-10">
                <p>&copy; 2024 DevBlog. All rights reserved.</p>
                <div class="flex gap-8">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </footer>
    </body>
</html>
