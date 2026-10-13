<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A Complete Guide to React for Beginners | DevBlog</title>
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
        @php
            $relatedPosts = [
                ['10 JavaScript Projects for Beginners', 'Mar 10, 2024', 'JS', 'bg-yellow-400 text-slate-950'],
                ['CSS Flexbox: A Complete Guide', 'Feb 28, 2024', 'CS', 'bg-violet-500 text-white'],
                ['How to Use Git and GitHub Effectively', 'Feb 15, 2024', 'GH', 'bg-slate-900 text-white'],
                ['Build a To-Do App with React', 'Feb 10, 2024', 'Rx', 'bg-cyan-500 text-slate-950'],
                ['Understanding APIs in Simple Terms', 'Jan 25, 2024', 'API', 'bg-emerald-500 text-white'],
            ];

            $categories = [
                ['Web Development', '32', 'WD', 'bg-blue-100 text-blue-600'],
                ['Programming', '28', 'PG', 'bg-yellow-100 text-yellow-700'],
                ['DevOps', '16', 'DO', 'bg-emerald-100 text-emerald-700'],
                ['Databases', '12', 'DB', 'bg-rose-100 text-rose-700'],
                ['Tools & Software', '10', 'TS', 'bg-orange-100 text-orange-700'],
                ['Career & Freelancing', '8', 'CF', 'bg-pink-100 text-pink-700'],
            ];
        @endphp

        <header class="sticky top-0 z-40 bg-slate-950/95 text-white shadow-lg shadow-slate-950/10 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-5 py-4 lg:px-8">
                <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2 text-2xl font-extrabold">
                    <span class="text-blue-500">&lt;/&gt;</span>
                    <span>DevBlog</span>
                </a>

                <nav class="hidden items-center gap-8 text-sm font-semibold md:flex">
                    <a href="{{ route('home') }}" class="text-blue-400 underline underline-offset-4">Home</a>
                    <a href="#">Tutorials</a>
                    <a href="#" class="inline-flex items-center gap-1">Categories <span class="text-xs">v</span></a>
                    <a href="#">Resources</a>
                    <a href="#">About</a>
                    <a href="{{ route('contact') }}">Contact</a>
                </nav>

                <div class="hidden min-w-0 flex-1 justify-end gap-4 lg:flex">
                    <label class="flex h-10 w-full max-w-xs items-center gap-3 rounded-lg bg-white/10 px-4 text-sm text-slate-300 ring-1 ring-white/10">
                        <span>/</span>
                        <input type="search" placeholder="Search articles..." class="min-w-0 flex-1 bg-transparent outline-none placeholder:text-slate-400">
                        <kbd class="rounded bg-white/10 px-2 py-0.5 text-xs text-slate-200">Ctrl K</kbd>
                    </label>
                    <button type="button" aria-label="Toggle dark mode" class="grid h-10 w-10 place-items-center rounded-full text-slate-200 ring-1 ring-white/10">M</button>
                    <a href="#subscribe" class="rounded-lg bg-blue-500 px-5 py-2.5 text-sm font-bold shadow-lg shadow-blue-500/25 transition hover:bg-blue-400">Subscribe</a>
                </div>
            </div>
        </header>

        <main class="mx-auto grid max-w-7xl gap-10 px-5 py-8 lg:grid-cols-[minmax(0,1fr)_310px] lg:px-8">
            <article>
                <nav class="mb-5 flex flex-wrap items-center gap-2 text-sm text-slate-500">
                    <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
                    <span>&gt;</span>
                    <a href="#" class="hover:text-blue-600">Tutorials</a>
                    <span>&gt;</span>
                    <a href="#" class="hover:text-blue-600">Web Development</a>
                    <span>&gt;</span>
                    <span class="text-slate-700">A Complete Guide to React for Beginners</span>
                </nav>

                <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-bold text-blue-600">Web Development</span>
                <h1 class="mt-4 max-w-4xl text-4xl font-extrabold leading-tight text-slate-950 sm:text-5xl">A Complete Guide to React for Beginners</h1>
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">Learn the basics of React, build your first component, and understand how modern web applications work. This step-by-step guide will help you get started with React even if you have no prior experience.</p>

                <div class="mt-6 flex flex-col gap-5 border-b border-slate-200 pb-6 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center gap-4">
                        <img src="https://i.pravatar.cc/96?u=Alex%20Carter" alt="Alex Carter" class="h-12 w-12 rounded-full">
                        <div>
                            <p class="text-sm font-bold text-slate-900">By Alex Carter</p>
                            <p class="text-sm text-slate-500">Mar 15, 2024 <span class="px-1">&bull;</span> 8 min read <span class="px-1">&bull;</span> Updated Mar 20, 2024</p>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        @foreach (['f', 'X', 'in', 'url'] as $label)
                            <a href="#" class="grid h-10 w-10 place-items-center rounded-full bg-white text-sm font-bold text-slate-700 shadow-sm ring-1 ring-slate-200 transition hover:text-blue-600">{{ $label }}</a>
                        @endforeach
                    </div>
                </div>

                <figure class="mt-7 overflow-hidden rounded-lg bg-slate-950 shadow-xl shadow-slate-200 ring-1 ring-slate-200">
                    <div class="relative min-h-[280px] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&w=1400&q=85" alt="Laptop showing code editor beside a React beginner title" class="absolute inset-0 h-full w-full object-cover opacity-55">
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/85 to-slate-950/25"></div>
                        <div class="relative flex min-h-[280px] items-center gap-8 px-8 py-10 text-white sm:px-14">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="" class="h-28 w-28 object-contain sm:h-36 sm:w-36">
                            <div>
                                <p class="text-5xl font-extrabold leading-none">React</p>
                                <p class="text-4xl font-bold leading-tight">for Beginners</p>
                                <p class="mt-5 text-lg font-semibold tracking-wide text-slate-200">Build <span class="px-2">&bull;</span> Learn <span class="px-2">&bull;</span> Grow</p>
                            </div>
                        </div>
                    </div>
                </figure>

                <section id="introduction" class="prose prose-slate mt-8 max-w-none">
                    <h2 class="text-3xl font-extrabold text-slate-950">Introduction</h2>
                    <p class="mt-2 text-lg leading-8 text-slate-600">React is a popular JavaScript library for building user interfaces, developed and maintained by Facebook. It allows you to create reusable UI components and build fast, interactive web applications with ease. In this tutorial, we'll cover the fundamentals of React and build a simple project step by step.</p>
                </section>

                <div class="mt-5 flex gap-4 rounded-lg bg-blue-50 px-6 py-5 text-slate-700 ring-1 ring-blue-100">
                    <span class="text-sm font-extrabold text-blue-500">TIP</span>
                    <p>By the end of this tutorial, you'll have a solid understanding of React concepts and be ready to build your own projects.</p>
                </div>

                <section id="what-is-react" class="mt-8">
                    <h2 class="text-3xl font-extrabold text-slate-950">What is React?</h2>
                    <p class="mt-2 text-lg leading-8 text-slate-600">React is a JavaScript library for building user interfaces, particularly single-page applications. It makes it easy to create reusable UI components and efficiently update the UI when data changes.</p>
                    <ul class="mt-4 grid gap-3 rounded-lg bg-white p-5 text-slate-700 shadow-sm ring-1 ring-slate-200">
                        @foreach (['Component-based architecture', 'Virtual DOM for better performance', 'Large and active community', 'Used by top companies like Facebook, Instagram, and Netflix'] as $benefit)
                            <li class="flex items-center gap-3"><span class="grid h-5 w-5 place-items-center rounded-full bg-blue-500 text-xs font-bold text-white">Y</span>{{ $benefit }}</li>
                        @endforeach
                    </ul>
                </section>

                <section id="setup" class="mt-8">
                    <h2 class="text-3xl font-extrabold text-slate-950">Setting Up a React Project</h2>
                    <p class="mt-2 text-lg leading-8 text-slate-600">You can create a new React project using Vite or Create React App.</p>
                    <div class="mt-4 overflow-hidden rounded-lg bg-slate-950 shadow-lg shadow-slate-200">
                        <div class="flex bg-slate-100 text-sm font-bold">
                            <button type="button" class="border-b-2 border-blue-500 px-8 py-3 text-blue-600">Using Vite</button>
                            <button type="button" class="px-8 py-3 text-slate-500">Using Create React App</button>
                        </div>
                        <pre class="overflow-x-auto p-5 text-sm leading-7 text-slate-200"><code><span class="text-slate-500"># Create a new React project with Vite</span>
npm create vite@latest my-react-app -- --template react
cd my-react-app
npm install
npm run dev</code></pre>
                    </div>
                </section>

                <section id="component" class="mt-8">
                    <h2 class="text-3xl font-extrabold text-slate-950">Your First React Component</h2>
                    <p class="mt-2 text-lg leading-8 text-slate-600">Let's create a simple component that displays a welcome message.</p>
                    <pre class="mt-4 overflow-x-auto rounded-lg bg-slate-950 p-5 text-sm leading-7 text-slate-200 shadow-lg shadow-slate-200"><code>function Welcome() {
  return (
    &lt;h1&gt;Hello, React!&lt;/h1&gt;
  );
}

export default Welcome;</code></pre>
                    <p class="mt-4 text-lg leading-8 text-slate-600">You can now use this component in your main App.jsx file and see it in action.</p>
                </section>

                <section id="conclusion" class="mt-8">
                    <h2 class="text-3xl font-extrabold text-slate-950">Conclusion</h2>
                    <p class="mt-2 text-lg leading-8 text-slate-600">React is a powerful library that makes building modern web applications enjoyable and efficient. Keep practicing, explore the <a href="https://react.dev/" class="font-semibold text-blue-600">official documentation</a>, and try building your own projects.</p>
                </section>

                <nav class="mt-8 grid gap-4 rounded-lg bg-blue-50 p-4 sm:grid-cols-2">
                    <a href="#" class="text-sm font-semibold text-blue-600">&lt;- Previous Post<br><span class="font-bold text-slate-900">Understanding JavaScript ES6 Features</span></a>
                    <a href="#" class="text-left text-sm font-semibold text-blue-600 sm:text-right">Next Post -&gt;<br><span class="font-bold text-slate-900">Building a To-Do App with React</span></a>
                </nav>

                <div class="mt-6 flex flex-wrap items-center gap-3 text-sm text-slate-600">
                    <span>Tags:</span>
                    @foreach (['React', 'JavaScript', 'Frontend', 'Web Development', 'Beginner'] as $tag)
                        <a href="#" class="rounded-full bg-blue-100 px-3 py-1 font-semibold text-blue-600">{{ $tag }}</a>
                    @endforeach
                </div>
            </article>

            <aside class="space-y-6 lg:sticky lg:top-24 lg:self-start">
                <section class="rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200">
                    <h2 class="text-xl font-extrabold">Table of Contents</h2>
                    <ol class="mt-4 grid gap-4 border-l border-slate-200 pl-4 text-sm font-medium text-slate-600">
                        <li><a href="#introduction" class="text-blue-600">Introduction</a></li>
                        <li><a href="#what-is-react" class="hover:text-blue-600">What is React?</a></li>
                        <li><a href="#setup" class="hover:text-blue-600">Setting Up a React Project</a></li>
                        <li><a href="#component" class="hover:text-blue-600">Your First React Component</a></li>
                        <li><a href="#conclusion" class="hover:text-blue-600">Conclusion</a></li>
                    </ol>
                </section>

                <section id="subscribe" class="overflow-hidden rounded-lg bg-slate-950 p-6 text-white shadow-xl shadow-blue-100">
                    <p class="text-sm font-bold text-blue-400">Level Up Your Skills</p>
                    <h2 class="mt-4 text-2xl font-extrabold leading-tight">Get the latest tutorials in your inbox</h2>
                    <p class="mt-3 text-sm leading-6 text-slate-300">Join 100K+ developers and never miss a new article.</p>
                    <form class="mt-5 grid gap-3">
                        <label class="sr-only" for="sidebar-email">Email address</label>
                        <input id="sidebar-email" type="email" placeholder="Enter your email address" class="h-12 rounded-lg border-0 px-4 text-sm text-slate-900 outline-none">
                        <button type="submit" class="h-12 rounded-lg bg-blue-500 text-sm font-bold transition hover:bg-blue-400">Subscribe</button>
                    </form>
                </section>

                <section class="rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-extrabold">Related Posts</h2>
                        <a href="#" class="text-sm font-bold text-blue-600">View All -&gt;</a>
                    </div>
                    <div class="mt-5 grid gap-4">
                        @foreach ($relatedPosts as [$title, $date, $initials, $classes])
                            <a href="#" class="grid grid-cols-[56px_1fr] gap-4">
                                <span class="{{ $classes }} grid h-14 w-14 place-items-center rounded-lg text-lg font-extrabold">{{ $initials }}</span>
                                <span>
                                    <span class="block text-sm font-bold leading-snug text-slate-950">{{ $title }}</span>
                                    <span class="mt-1 block text-sm text-slate-500">{{ $date }}</span>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </section>

                <section class="rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200">
                    <h2 class="text-xl font-extrabold">Popular Categories</h2>
                    <div class="mt-5 grid gap-3">
                        @foreach ($categories as [$name, $count, $icon, $classes])
                            <a href="#" class="flex items-center justify-between border-b border-slate-100 pb-3 last:border-b-0 last:pb-0">
                                <span class="flex items-center gap-3 text-sm font-medium text-slate-700"><span class="{{ $classes }} grid h-8 w-8 place-items-center rounded-lg">{{ $icon }}</span>{{ $name }}</span>
                                <span class="text-sm text-slate-500">{{ $count }}</span>
                            </a>
                        @endforeach
                    </div>
                </section>

                <blockquote class="rounded-lg bg-blue-50 p-6 text-slate-700 shadow-sm ring-1 ring-blue-100">
                    <p class="text-5xl font-extrabold leading-none text-blue-500">"</p>
                    <p class="text-lg font-medium">The best way to learn is by doing.</p>
                    <footer class="mt-3 text-sm text-slate-500">- Unknown</footer>
                </blockquote>
            </aside>
        </main>

        <footer class="bg-slate-950 text-white">
            <div class="mx-auto grid max-w-7xl gap-10 px-5 py-8 md:grid-cols-4 lg:px-8">
                <div>
                    <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-extrabold"><span class="text-blue-500">&lt;/&gt;</span><span>DevBlog</span></a>
                    <p class="mt-4 max-w-xs text-sm leading-6 text-slate-300">Your go-to place for tech, coding, and development tutorials.</p>
                </div>
                <div>
                    <h3 class="font-bold">Quick Links</h3>
                    <ul class="mt-3 grid gap-2 text-sm text-slate-300"><li><a href="{{ route('home') }}">Home</a></li><li><a href="#">Tutorials</a></li><li><a href="#">Categories</a></li><li><a href="#">Resources</a></li><li><a href="#">About</a></li><li><a href="{{ route('contact') }}">Contact</a></li></ul>
                </div>
                <div>
                    <h3 class="font-bold">Categories</h3>
                    <ul class="mt-3 grid gap-2 text-sm text-slate-300"><li><a href="#">Web Development</a></li><li><a href="#">Programming</a></li><li><a href="#">DevOps</a></li><li><a href="#">Databases</a></li></ul>
                </div>
                <div>
                    <h3 class="font-bold">Newsletter</h3>
                    <form class="mt-4 flex overflow-hidden rounded-lg bg-white/10">
                        <label class="sr-only" for="footer-email">Email</label>
                        <input id="footer-email" type="email" placeholder="Enter your email" class="min-w-0 flex-1 bg-transparent px-4 py-3 text-sm outline-none placeholder:text-slate-400">
                        <button type="submit" class="bg-blue-500 px-4 font-bold">-&gt;</button>
                    </form>
                    <p class="mt-3 text-xs text-slate-400">No spam. Unsubscribe anytime.</p>
                </div>
            </div>
            <div class="mx-auto flex max-w-7xl flex-col gap-3 border-t border-white/10 px-5 py-5 text-sm text-slate-300 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                <p>&copy; 2024 DevBlog. All rights reserved.</p>
                <div class="flex gap-8"><a href="#">Privacy Policy</a><a href="#">Terms of Service</a></div>
            </div>
        </footer>
    </body>
</html>
