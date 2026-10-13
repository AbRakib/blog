@extends('layouts.frontend')

@section('title', 'DevBlog')

@section('content')
<section class="relative overflow-hidden bg-slate-950 text-white">
            <img
                src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&w=1800&q=85"
                alt="Developer workspace with code editor open on a laptop"
                class="absolute inset-0 h-full w-full object-cover opacity-45"
            >
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-slate-950/35"></div>



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
        </section>

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
@endsection
