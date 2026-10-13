<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About Us | DevBlog</title>
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
        @php
            $stats = [
                ['500+', 'Tutorials Published', 'text-blue-500 bg-blue-100', 'M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20V6H6.5A2.5 2.5 0 0 0 4 8.5v11Zm0-11A2.5 2.5 0 0 1 6.5 6H20'],
                ['100K+', 'Monthly Readers', 'text-blue-500 bg-blue-100', 'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2m22 0v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z'],
                ['25K+', 'Community Members', 'text-blue-500 bg-blue-100', 'M18 8a3 3 0 1 0-6 0 3 3 0 0 0 6 0ZM6 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm12 11v-2a4 4 0 0 0-4-4h-4a4 4 0 0 0-4 4v2m16 0v-2a4 4 0 0 0-3-3.87M2 21v-2a4 4 0 0 1 3-3.87'],
                ['4.9&starf;', 'Average Rating', 'text-amber-500 bg-amber-100', 'm12 2 3.1 6.28 6.93 1-5.02 4.9 1.18 6.9L12 17.77 5.8 21.08l1.18-6.9-5.02-4.9 6.93-1L12 2Z'],
            ];

            $values = [
                ['Practical Learning', 'We focus on real-world examples, hands-on projects, and actionable guides you can actually use.', 'text-blue-500 bg-blue-100 from-blue-50', 'M22 10 12 5 2 10l10 5 10-5Zm-17 3v4.5L12 21l7-3.5V13'],
                ['Community First', 'We believe in the power of community and strive to create a welcoming space for all developers.', 'text-emerald-500 bg-emerald-100 from-emerald-50', 'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2m22 0v-2a4 4 0 0 0-3-3.87M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z'],
                ['Quality Content', 'We are committed to accurate, well-researched, and up-to-date content that adds real value.', 'text-amber-500 bg-amber-100 from-amber-50', 'M12 2 15 8l6.5.95-4.7 4.58 1.1 6.47L12 16.9 6.1 20l1.1-6.47L2.5 8.95 9 8l3-6Z'],
                ['Continuous Growth', 'We learn, adapt, and evolve constantly, just like the technology we write about.', 'text-rose-500 bg-rose-100 from-rose-50', 'M3 17 9 11l4 4 8-8m0 0v6m0-6h-6'],
            ];

            $milestones = [
                ['2022', 'DevBlog Launches', 'Started with a mission to share practical developer tutorials.', 'text-blue-500 bg-blue-100', 'M5 16c2-7 6-11 14-13-2 8-6 12-13 14l-3-3Zm0 0-3 6 6-3'],
                ['2023', 'Reached 10K Readers', 'Our community began to grow, hitting 10,000 monthly readers.', 'text-emerald-500 bg-emerald-100', 'M8 2h8l4 4v16H8V2Zm8 0v4h4M11 11h6M11 15h6M11 19h6'],
                ['2024', '100K+ Readers', 'A major milestone with 100,000+ monthly readers and 500+ tutorials.', 'text-violet-500 bg-violet-100', 'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2m22 0v-2a4 4 0 0 0-3-3.87M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z'],
                ['Today', 'A Growing Community', 'Continuing to create better content and a brighter future for developers.', 'text-rose-500 bg-rose-100', 'm12 2 3.1 6.28 6.93 1-5.02 4.9 1.18 6.9L12 17.77 5.8 21.08l1.18-6.9-5.02-4.9 6.93-1L12 2Z'],
            ];

            $team = [
                ['Alex Carter', 'Founder & Editor', 'Full-stack developer and tech writer. Passionate about making complex topics simple.', 'https://i.pravatar.cc/160?u=alex-carter'],
                ['Priya Sharma', 'Content Writer', 'Software engineer and technical writer. Loves creating beginner-friendly tutorials.', 'https://i.pravatar.cc/160?u=priya-sharma'],
                ['Daniel Kim', 'Developer Advocate', 'Passionate about developer tools, productivity, and open source.', 'https://i.pravatar.cc/160?u=daniel-kim'],
                ['Sarah Johnson', 'Community Manager', 'Builds and nurtures our amazing community. Believes in the power of people and knowledge.', 'https://i.pravatar.cc/160?u=sarah-johnson'],
            ];

            $testimonials = [
                ['James Wilson', 'Frontend Developer', '"DevBlog has been my go-to resource for learning modern web development. The tutorials are clear, practical, and always up-to-date."', 'https://i.pravatar.cc/120?u=james-wilson'],
                ['Emily Rodriguez', 'Full-Stack Developer', '"The best tech blog out there. Step-by-step guides feel like having a mentor available 24/7."', 'https://i.pravatar.cc/120?u=emily-rodriguez'],
                ['Michael Chen', 'Software Engineer', '"High-quality content, real examples, and a supportive community. DevBlog has genuinely helped me grow."', 'https://i.pravatar.cc/120?u=michael-chen'],
            ];
        @endphp

        <header class="sticky top-0 z-40 bg-slate-950/95 text-white shadow-lg shadow-slate-950/10 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-5 py-4 lg:px-8">
                <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2 text-2xl font-extrabold">
                    <span class="text-blue-500">&lt;/&gt;</span>
                    <span>DevBlog</span>
                </a>

                <nav class="hidden items-center gap-8 text-sm font-semibold md:flex">
                    <a href="{{ route('home') }}" class="hover:text-blue-400">Home</a>
                    <a href="#">Tutorials</a>
                    <a href="#" class="inline-flex items-center gap-1">Categories <span class="text-xs">v</span></a>
                    <a href="#">Resources</a>
                    <a href="{{ route('about') }}" class="text-blue-400 underline underline-offset-8">About</a>
                    <a href="{{ route('contact') }}" class="hover:text-blue-400">Contact</a>
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

        <main>
            <section class="overflow-hidden bg-gradient-to-br from-white via-blue-50 to-slate-100">
                <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-10 lg:grid-cols-[1fr_1.15fr] lg:px-8 lg:py-12">
                    <div>
                        <nav class="mb-8 flex items-center gap-2 text-sm text-slate-500">
                            <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
                            <span>&gt;</span>
                            <span class="font-medium text-blue-600">About</span>
                        </nav>
                        <h1 class="text-5xl font-extrabold leading-tight text-slate-950 sm:text-6xl">About <span class="text-blue-500">DevBlog</span></h1>
                        <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-700">We help developers learn, build, and grow through high-quality tutorials, coding guides, and practical resources. Our mission is to make tech education accessible, practical, and enjoyable for everyone.</p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="#community" class="inline-flex items-center gap-2 rounded-lg bg-blue-500 px-7 py-4 text-sm font-bold text-white shadow-xl shadow-blue-500/25 transition hover:bg-blue-400">Join Our Community <span aria-hidden="true">-&gt;</span></a>
                            <a href="#" class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-7 py-4 text-sm font-bold text-slate-950 shadow-sm transition hover:border-blue-300 hover:text-blue-600">Explore Tutorials</a>
                        </div>
                    </div>

                    <div class="relative min-h-[330px]">
                        <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1200&q=85" alt="Developer desk with laptop and learning materials" class="absolute inset-0 h-full w-full rounded-lg object-cover shadow-2xl shadow-blue-200/70">
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-r from-white/25 via-transparent to-slate-950/10"></div>
                        <div class="absolute left-[34%] top-[18%] rounded-lg bg-slate-950/90 px-10 py-8 text-center text-white shadow-2xl">
                            <p class="text-3xl font-extrabold leading-tight">Better<br>Developers<br>Brighter<br>Futures</p>
                            <div class="mx-auto mt-4 h-1.5 w-20 rounded-full bg-blue-500"></div>
                        </div>
                        <div class="absolute bottom-10 left-6 rounded-lg bg-white/90 px-5 py-4 text-sm font-extrabold leading-tight text-slate-800 shadow-xl">Good<br>Code<br>Better<br>Tomorrow</div>
                        <div class="absolute bottom-8 right-8 hidden w-36 space-y-2 sm:block">
                            @foreach (['Learn', 'Build', 'Share', 'Grow'] as $word)
                                <div class="rounded-md bg-slate-800/95 px-5 py-2 font-semibold text-slate-100 shadow-lg">{{ $word }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto -mt-2 max-w-7xl px-5 lg:px-8">
                <div class="grid overflow-hidden rounded-lg bg-white shadow-xl shadow-slate-200/70 ring-1 ring-slate-200 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($stats as [$number, $label, $classes, $path])
                        <div class="flex items-center gap-5 border-b border-slate-200 px-7 py-5 last:border-b-0 sm:[&:nth-child(3)]:border-b-0 lg:border-b-0 lg:border-r lg:last:border-r-0">
                            <span class="{{ $classes }} grid h-14 w-14 shrink-0 place-items-center rounded-lg">
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" /></svg>
                            </span>
                            <div>
                                <p class="text-3xl font-extrabold">{{ $number }}</p>
                                <p class="text-sm text-slate-600">{{ $label }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="mx-auto grid max-w-7xl gap-8 px-5 py-12 lg:grid-cols-[1fr_1.15fr] lg:px-8">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.35em] text-slate-400">Our Story</p>
                    <h2 class="mt-3 text-3xl font-extrabold">Who We Are</h2>
                    <p class="mt-4 max-w-2xl text-lg leading-8 text-slate-600">DevBlog is a modern tech blog created by developers, for developers. We started with a simple idea: make high-quality, practical tech education accessible to everyone. Today, we are a growing community of learners, builders, and problem-solvers who believe in the power of sharing knowledge.</p>
                    <a href="#" class="mt-7 inline-flex items-center gap-2 rounded-lg bg-blue-500 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-400">Our Full Story <span aria-hidden="true">-&gt;</span></a>
                </div>
                <div class="grid gap-5 sm:grid-cols-2">
                    <article class="rounded-lg bg-white p-7 shadow-sm ring-1 ring-slate-200">
                        <span class="grid h-16 w-16 place-items-center rounded-lg bg-blue-100 text-blue-500"><svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0-9-9h4a5 5 0 1 1 5 5v4Zm0-9 6-6m0 0v5m0-5h-5" /></svg></span>
                        <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.3em] text-blue-500">Our Mission</p>
                        <h3 class="mt-2 text-2xl font-extrabold leading-tight">Make Tech Education Accessible</h3>
                        <p class="mt-3 leading-7 text-slate-600">We strive to create clear, practical, and up-to-date tutorials that help developers at every level build real skills.</p>
                    </article>
                    <article class="rounded-lg bg-white p-7 shadow-sm ring-1 ring-slate-200">
                        <span class="grid h-16 w-16 place-items-center rounded-lg bg-violet-100 text-violet-500"><svg class="h-9 w-9" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12Zm10 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" /></svg></span>
                        <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.3em] text-violet-500">Our Vision</p>
                        <h3 class="mt-2 text-2xl font-extrabold leading-tight">A Brighter Future for Developers</h3>
                        <p class="mt-3 leading-7 text-slate-600">We envision a world where anyone, anywhere can learn to code, build amazing things, and create better opportunities.</p>
                    </article>
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-5 pb-12 lg:px-8">
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.35em] text-slate-400">Our Values</p>
                        <h2 class="mt-3 text-3xl font-extrabold">What We Stand For</h2>
                    </div>
                    <a href="#" class="text-sm font-bold text-blue-600">Our Principles Guide Everything We Do <span aria-hidden="true">-&gt;</span></a>
                </div>
                <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                    @foreach ($values as [$title, $description, $classes, $path])
                        <article class="rounded-lg bg-gradient-to-br {{ $classes }} to-white p-6 shadow-sm ring-1 ring-slate-200">
                            <span class="{{ $classes }} grid h-14 w-14 place-items-center rounded-lg">
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" /></svg>
                            </span>
                            <h3 class="mt-7 text-lg font-extrabold">{{ $title }}</h3>
                            <p class="mt-2 leading-7 text-slate-600">{{ $description }}</p>
                        </article>
                    @endforeach
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-5 pb-12 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[0.95fr_2fr]">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.35em] text-slate-400">Our Journey</p>
                        <h2 class="mt-3 text-3xl font-extrabold">Key Milestones</h2>
                        <p class="mt-3 text-lg leading-8 text-slate-600">From a simple idea to a growing global community.</p>
                    </div>
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($milestones as [$year, $title, $description, $classes, $path])
                            <article class="relative text-center">
                                <span class="{{ $classes }} mx-auto grid h-16 w-16 place-items-center rounded-full shadow-sm">
                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" /></svg>
                                </span>
                                <p class="mt-4 text-xl font-extrabold text-blue-600">{{ $year }}</p>
                                <h3 class="mt-1 font-extrabold">{{ $title }}</h3>
                                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $description }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-5 pb-12 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[0.95fr_2fr]">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.35em] text-slate-400">Meet The Team</p>
                        <h2 class="mt-3 text-3xl font-extrabold leading-tight">The People Behind DevBlog</h2>
                        <p class="mt-3 text-lg leading-8 text-slate-600">We are a small team of developers, writers, and creators who are passionate about helping others learn and grow in tech.</p>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($team as [$name, $role, $bio, $avatar])
                            <article class="rounded-lg bg-white p-5 text-center shadow-sm ring-1 ring-slate-200">
                                <img src="{{ $avatar }}" alt="{{ $name }}" class="mx-auto h-20 w-20 rounded-full object-cover">
                                <h3 class="mt-4 font-extrabold">{{ $name }}</h3>
                                <p class="text-sm font-bold text-blue-600">{{ $role }}</p>
                                <p class="mt-3 text-sm leading-6 text-slate-600">{{ $bio }}</p>
                                <div class="mt-4 flex justify-center gap-4 text-sm font-extrabold text-slate-950">
                                    <a href="#">GH</a>
                                    <a href="#">X</a>
                                    <a href="#">in</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="community" class="mx-auto max-w-7xl px-5 pb-12 lg:px-8">
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.35em] text-slate-400">What Our Community Says</p>
                        <h2 class="mt-3 text-3xl font-extrabold">Why Developers Love DevBlog</h2>
                        <p class="mt-2 text-slate-600">Join thousands of developers who learn and grow with us.</p>
                    </div>
                    <a href="#" class="font-bold text-blue-600">View More Testimonials <span aria-hidden="true">-&gt;</span></a>
                </div>
                <div class="grid gap-5 lg:grid-cols-3">
                    @foreach ($testimonials as [$name, $role, $quote, $avatar])
                        <article class="grid grid-cols-[64px_1fr] gap-5 rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200">
                            <img src="{{ $avatar }}" alt="{{ $name }}" class="h-14 w-14 rounded-full object-cover">
                            <div>
                                <p class="leading-7 text-slate-600">{{ $quote }}</p>
                                <div class="mt-3 flex flex-wrap items-end justify-between gap-3">
                                    <div>
                                        <h3 class="font-extrabold">{{ $name }}</h3>
                                        <p class="text-sm text-slate-500">{{ $role }}</p>
                                    </div>
                                    <p class="text-amber-500">&starf;&starf;&starf;&starf;&starf;</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            <section id="subscribe" class="bg-gradient-to-r from-blue-50 via-white to-blue-100">
                <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-12 lg:grid-cols-[1.25fr_0.75fr] lg:px-8">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.35em] text-blue-300">Stay In The Loop</p>
                        <h2 class="mt-4 text-3xl font-extrabold text-blue-950 sm:text-4xl">Get the Latest Tutorials in Your Inbox</h2>
                        <p class="mt-3 text-lg text-slate-600">Join thousands of developers and never miss a new tutorial, update, or resource.</p>
                        <form class="mt-6 flex max-w-2xl flex-col gap-0 sm:flex-row">
                            <label class="sr-only" for="newsletter-email">Email address</label>
                            <input id="newsletter-email" type="email" placeholder="Enter your email address" class="min-h-14 flex-1 rounded-lg border border-slate-200 bg-white px-6 text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-blue-400 sm:rounded-r-none">
                            <button type="submit" class="min-h-14 rounded-lg bg-blue-500 px-9 font-bold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-400 sm:rounded-l-none">Subscribe</button>
                        </form>
                    </div>
                    <div class="hidden justify-end lg:flex">
                        <div class="relative grid h-40 w-80 rotate-[-7deg] place-items-center rounded-lg bg-white/80 shadow-xl shadow-blue-200/70">
                            <svg class="absolute left-8 h-24 w-24 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m3 10 18-7-7 18-3-8-8-3Zm8 3 10-10" /></svg>
                            <p class="ml-32 text-3xl font-extrabold leading-tight text-blue-950">Better<br>Developers<br>Brighter<br>Futures</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

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
                    <ul class="mt-3 grid gap-2 text-sm text-slate-300"><li><a href="#">Web Development</a></li><li><a href="#">Programming</a></li><li><a href="#">Databases</a></li><li><a href="#">DevOps</a></li><li><a href="#">Tools & Software</a></li></ul>
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
