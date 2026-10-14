@extends('frontend.layouts.frontend')

@section('title', 'Contact Us | DevBlog')

@section('content')
@php
            $contactMethods = [
                ['Email', 'For general inquiries, support, or partnerships.', 'hello@devblog.com', 'text-blue-500 bg-blue-100', 'M4 6h16v12H4V6Zm0 0 8 7 8-7'],
                ['Phone', 'Mon - Fri, 9AM - 6PM (EST)', '+1 (555) 123-4567', 'text-emerald-500 bg-emerald-100', 'M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.35 1.9.65 2.8a2 2 0 0 1-.45 2.11L8.04 9.9a16 16 0 0 0 6.06 6.06l1.27-1.27a2 2 0 0 1 2.11-.45c.9.3 1.84.52 2.8.65A2 2 0 0 1 22 16.92Z'],
                ['Office Location', '123 Developer Lane, San Francisco, CA 94107, USA', 'Get Directions ->', 'text-rose-500 bg-rose-100', 'M12 22s7-5.1 7-12A7 7 0 0 0 5 10c0 6.9 7 12 7 12Zm0-9a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z'],
                ['Working Hours', 'Monday - Friday: 9:00 AM - 6:00 PM (EST)', 'Saturday - Sunday: Closed', 'text-amber-500 bg-amber-100', 'M12 6v6l4 2m6-2a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z'],
            ];

            $faqs = [
                'How can I suggest a tutorial topic?',
                'How can I partner with DevBlog?',
                'Are you open to guest posts?',
                "What's the best way to get support?",
            ];
        @endphp

        

        <main>
            <section class="overflow-hidden bg-gradient-to-br from-white via-blue-50 to-slate-100">
                <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-10 lg:grid-cols-[1fr_1.05fr] lg:px-8 lg:py-12">
                    <div>
                        <nav class="mb-8 flex items-center gap-2 text-sm text-slate-500">
                            <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
                            <span>&gt;</span>
                            <span class="font-medium text-blue-600">Contact</span>
                        </nav>
                        <p class="text-sm font-bold uppercase tracking-[0.35em] text-slate-400">Let's Connect</p>
                        <h1 class="mt-4 text-5xl font-extrabold leading-tight text-slate-950 sm:text-6xl">Contact Us</h1>
                        <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">Have a question, suggestion, or just want to say hello? We'd love to hear from you. Reach out to us whether you're a reader, developer, or potential partner.</p>
                    </div>

                    <div class="relative min-h-[270px]">
                        <div class="absolute right-0 top-4 hidden rotate-[-7deg] text-2xl font-extrabold leading-tight text-blue-950 sm:block">Ideas<br>Questions<br>Partnerships<br>Let's Talk!</div>
                        <div class="absolute left-4 top-12 grid h-14 w-20 place-items-center rounded-lg bg-blue-500 text-white shadow-xl shadow-blue-300">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4V6Zm0 0 8 7 8-7" /></svg>
                        </div>
                        <div class="absolute left-20 top-28 grid h-12 w-16 place-items-center rounded-lg bg-blue-500 text-white shadow-xl shadow-blue-300">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h10M4 17h7" /></svg>
                        </div>
                        <div class="absolute right-24 top-2 hidden text-blue-500 sm:block">
                            <svg class="h-28 w-28" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 120 120"><path d="M14 55c20-22 45-22 55-3 8 16-6 28-22 18-17-10 2-37 42-50" stroke-dasharray="7 8" stroke-linecap="round"/><path d="M88 18 113 7 100 35l-8-11-15-2 11-4Z" fill="currentColor" stroke="none"/></svg>
                        </div>
                        <div class="absolute bottom-0 left-20 right-14 rounded-lg bg-slate-900 p-5 shadow-2xl shadow-blue-200 ring-1 ring-slate-700">
                            <div class="rounded-md bg-slate-950 px-7 py-10 text-center text-white ring-1 ring-white/10">
                                <p class="text-5xl font-extrabold text-blue-500">&lt;/&gt;</p>
                                <p class="mt-3 text-3xl font-extrabold leading-tight">Let's<br>Build <span class="text-sky-400">Together</span></p>
                            </div>
                        </div>
                        <div class="absolute bottom-0 right-0 hidden h-24 w-24 rounded-lg bg-slate-950 p-4 text-sm font-semibold leading-tight text-white shadow-xl sm:block">Good<br>Code<br>Better<br>People</div>
                        <div class="absolute bottom-2 left-0 hidden h-28 w-20 rounded-t-full bg-emerald-200 sm:block">
                            <div class="mx-auto mt-8 h-20 w-12 rounded-t-full bg-emerald-600"></div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto grid max-w-7xl gap-6 px-5 py-8 lg:grid-cols-[1.45fr_0.95fr] lg:px-8">
                <form class="rounded-lg bg-white p-6 shadow-xl shadow-slate-200/70 ring-1 ring-slate-200 sm:p-7">
                    <h2 class="text-2xl font-extrabold">Send Us a Message</h2>
                    <p class="mt-2 text-sm text-slate-500">Fill out the form below and we'll get back to you as soon as possible.</p>
                    <div class="mt-6 grid gap-5 sm:grid-cols-2">
                        <label class="grid gap-2 text-sm font-bold">Full Name <span class="sr-only">required</span>
                            <input type="text" placeholder="Your full name" class="h-12 rounded-lg border border-slate-200 px-4 font-normal outline-none transition placeholder:text-slate-400 focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
                        </label>
                        <label class="grid gap-2 text-sm font-bold">Email Address <span class="sr-only">required</span>
                            <input type="email" placeholder="you@example.com" class="h-12 rounded-lg border border-slate-200 px-4 font-normal outline-none transition placeholder:text-slate-400 focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
                        </label>
                    </div>
                    <label class="mt-5 grid gap-2 text-sm font-bold">Subject <span class="sr-only">required</span>
                        <select class="h-12 rounded-lg border border-slate-200 px-4 font-normal text-slate-500 outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-100">
                            <option>Select a subject</option>
                            <option>Tutorial suggestion</option>
                            <option>Partnership</option>
                            <option>Support</option>
                        </select>
                    </label>
                    <label class="mt-5 grid gap-2 text-sm font-bold">Message <span class="sr-only">required</span>
                        <textarea rows="6" maxlength="1000" placeholder="Tell us how we can help..." class="resize-none rounded-lg border border-slate-200 px-4 py-3 font-normal outline-none transition placeholder:text-slate-400 focus:border-blue-400 focus:ring-4 focus:ring-blue-100"></textarea>
                    </label>
                    <p class="mt-2 text-right text-sm text-slate-500">0/1000</p>
                    <button type="submit" class="mt-4 inline-flex h-14 w-full items-center justify-center gap-3 rounded-lg bg-blue-500 px-6 font-bold text-white shadow-lg shadow-blue-500/25 transition hover:bg-blue-400">
                        <span aria-hidden="true">-&gt;</span>
                        Send Message
                    </button>
                </form>

                <aside class="rounded-lg bg-white p-6 shadow-xl shadow-slate-200/70 ring-1 ring-slate-200 sm:p-7">
                    <h2 class="text-xl font-extrabold">Other Ways to Reach Us</h2>
                    <div class="mt-5 grid gap-5">
                        @foreach ($contactMethods as [$title, $description, $action, $classes, $path])
                            <div class="grid grid-cols-[56px_1fr] gap-4 border-b border-slate-100 pb-5 last:border-b-0 last:pb-0">
                                <span class="{{ $classes }} grid h-14 w-14 place-items-center rounded-lg">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" /></svg>
                                </span>
                                <div>
                                    <h3 class="font-extrabold">{{ $title }}</h3>
                                    <p class="mt-1 text-sm leading-6 text-slate-500">{{ $description }}</p>
                                    <a href="#" class="text-sm font-bold text-blue-600">{{ $action }}</a>
                                </div>
                            </div>
                        @endforeach
                        <div class="grid grid-cols-[56px_1fr] gap-4">
                            <span class="grid h-14 w-14 place-items-center rounded-lg bg-violet-100 text-violet-500">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2m22 0v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" /></svg>
                            </span>
                            <div>
                                <h3 class="font-extrabold">Follow Us</h3>
                                <p class="mt-1 text-sm leading-6 text-slate-500">Stay connected for the latest updates.</p>
                                <div class="mt-3 flex gap-4 text-lg font-extrabold">
                                    <a href="#" class="text-slate-950">GH</a>
                                    <a href="#" class="text-sky-500">X</a>
                                    <a href="#" class="text-red-500">YT</a>
                                    <a href="#" class="text-blue-600">in</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </section>

            <section class="mx-auto max-w-7xl px-5 pb-8 lg:px-8">
                <div class="grid overflow-hidden rounded-lg bg-white shadow-xl shadow-slate-200/70 ring-1 ring-slate-200 lg:grid-cols-[0.85fr_1.15fr]">
                    <div class="p-6 sm:p-7">
                        <h2 class="text-2xl font-extrabold">Our Location</h2>
                        <p class="mt-2 text-slate-600">We're a remote-first team with an office in San Francisco. Feel free to reach out or visit us if you're in the area.</p>
                        <div class="mt-5 flex gap-4 rounded-lg bg-blue-50 p-5">
                            <span class="grid h-14 w-14 shrink-0 place-items-center rounded-lg bg-blue-100 text-blue-500">PIN</span>
                            <div class="text-sm">
                                <p class="font-extrabold text-slate-950">123 Developer Lane</p>
                                <p class="mt-1 text-slate-700">San Francisco, CA 94107, USA</p>
                                <a href="#" class="mt-2 inline-block font-bold text-blue-600">Get Directions -></a>
                            </div>
                        </div>
                    </div>
                    <div class="relative min-h-[240px] bg-blue-100">
                        <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(255,255,255,.6)_1px,transparent_1px),linear-gradient(0deg,rgba(255,255,255,.6)_1px,transparent_1px)] bg-[size:42px_42px]"></div>
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-100 via-white to-sky-200"></div>
                        <div class="absolute left-[18%] top-[54%] h-3 w-28 -rotate-12 rounded-full bg-orange-300"></div>
                        <div class="absolute left-[42%] top-[35%] h-3 w-44 rotate-12 rounded-full bg-slate-300"></div>
                        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl font-extrabold text-slate-700">San Francisco</div>
                        <div class="absolute right-[27%] top-[34%] grid h-12 w-12 place-items-center rounded-full bg-red-500 text-white shadow-xl">!</div>
                        <div class="absolute right-[13%] top-[32%] rounded-lg bg-white px-4 py-3 text-sm shadow-lg">
                            <p class="font-extrabold">DevBlog HQ</p>
                            <p class="text-slate-500">San Francisco, CA</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-5 pb-10 lg:px-8">
                <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <h2 class="text-3xl font-extrabold">Common Questions</h2>
                        <p class="mt-2 text-slate-500">Quick answers to the most common questions we receive.</p>
                    </div>
                    <a href="#" class="font-bold text-blue-600">Still have questions? Contact us -></a>
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    @foreach ($faqs as $question)
                        <details class="group rounded-lg bg-white px-5 py-4 shadow-sm ring-1 ring-slate-200">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-bold">
                                {{ $question }}
                                <span class="transition group-open:rotate-180">v</span>
                            </summary>
                            <p class="mt-3 text-sm leading-6 text-slate-500">Send us a note with the details and our editorial team will follow up with next steps.</p>
                        </details>
                    @endforeach
                </div>
            </section>

            <section id="subscribe" class="bg-gradient-to-r from-blue-50 via-white to-blue-100">
                <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-12 lg:grid-cols-[1.25fr_0.75fr] lg:px-8">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.35em] text-blue-300">Stay In Touch</p>
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
                            <svg class="absolute left-8 h-24 w-24 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4V6Zm0 0 8 7 8-7m7-2-6 6m0-6 6 6" /></svg>
                            <p class="ml-32 text-3xl font-extrabold leading-tight text-blue-950">Better<br>Developers<br>Brighter<br>Futures</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection
