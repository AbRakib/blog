@extends('welcome')
@section('content')
<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            <img src="{{asset('images/illustration-1.png')}}" alt="" class="rounded-xl">

            <p class="mt-4 block text-gray-400 text-xs">
                Published: <time> {{ $post->created_at->diffForHumans() }} </time>
            </p>

            <div class="flex items-center lg:justify-center text-sm mt-4">
                <img src="{{asset('/images/lary-avatar.svg')}}" alt="Lary avatar">
                <div class="ml-3 text-left">
                    <h5 class="font-bold"> 
                        <a class="text-yellow-500 hover:text-pink-500" href="{{route('author', $post->user->slug)}}">
                            {{ $post->user->name }}
                        </a>
                    </h5>
                    <h6>Mascot at Laracasts</h6>
                </div>
            </div>
        </div>

        <div class="col-span-8">
            <div class="hidden lg:flex justify-between mb-6">
                <a href="{{route('home')}}"
                    class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path class="fill-current"
                                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                            </path>
                        </g>
                    </svg>

                    Back to Posts
                </a>

                <div class="space-x-2">
                    <a href="#"
                        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:text-white hover:bg-blue-500"
                        style="font-size: 10px">
                        {{ $post->category->title }}
                    </a>
                </div>
            </div>

            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                {{ $post->title }}
            </h1>

            <div class="space-y-4 lg:text-lg leading-loose">
                <p>
                    {{ $post->body }}
                </p>
            </div>
        </div>

        {{-- comments section  --}}
        <section class="col-span-8 col-start-5 mt-10">
            <article class="flex bg-gray-100 p-6 rounded-xl border border-gray-200 space-x-4">
                <div class="">
                    <img class="w-32 rounded-xl" src="{{asset('/images/lary-avatar.svg')}}" alt="">
                </div>
                <div>
                    <header>
                        <h3 class="font-bold">Jone Doe</h3>
                        <p class="text-xs mb-4">Posted 
                            <time>8 month ago</time>
                        </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus placeat distinctio ducimus odit porro, rem, minima magnam esse facere inventore et in modi accusantium illo! A voluptate rerum explicabo perspiciatis?</p>
                    </header>
                </div>
            </article>
        </section>
        {{-- end comment section --}}

    </article>
</main>
@endsection