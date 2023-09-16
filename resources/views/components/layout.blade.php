@extends('welcome')
@section('content')
<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if ($posts->count())
        <article
        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
            <div class="py-6 px-5 lg:flex">
                <div class="flex-1 lg:mr-8">
                    <img src="{{ asset('images/illustration-1.png') }}" alt="Blog Post illustration" class="rounded-xl">
                </div>

                <div class="flex-1 flex flex-col justify-between">
                    <header class="mt-8 lg:mt-0">
                        <div class="space-x-2">
                            <a href="{{ route('category', $posts[0]->category->slug) }}"
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                            style="font-size: 10px">{{ $posts[0]->category->title }}</a>
                        </div>

                        <div class="mt-4">
                            <h1 class="text-3xl">
                                <a href="{{ route('post', $posts[0]->slug) }}">
                                    {{ $posts[0]->title }}
                                </a>
                            </h1>

                            <span class="mt-2 block text-gray-400 text-xs">
                                Published: <time>{{ $posts[0]->created_at->diffForHumans() }}</time>
                            </span>
                        </div>
                    </header>

                    <div class="text-sm mt-2">
                        <p> {{$posts[0]->excerpt}} </p>
                    </div>

                    <footer class="flex justify-between items-center mt-8">
                        <div class="flex items-center text-sm w-3/5">
                            <img src="{{ asset('images/lary-avatar.svg') }}" alt="Lary avatar">
                            <div class="ml-3">
                                <h5 class="font-bold">{{ $posts[0]->user->name }}</h5>
                                <h6>Mascot at Laracasts</h6>
                            </div>
                        </div>

                        <div class="hidden lg:block">
                            <a href="{{route('post', $posts[0]->slug)}} "
                            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                            >Read More</a>
                        </div>
                    </footer>
                </div>
            </div>
        </article>
    @else
        <p class="text-center font-bold">No Posts Here!!!</p>
    @endif

    @if ($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-6">
            @foreach ($posts->skip(1) as $post)
                <article
                    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl {{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}">
                    <div class="py-6 px-5">
                        <div>
                            <img src="{{ asset('images/illustration-3.png') }}" alt="Blog Post illustration" class="rounded-xl">
                        </div>

                        <div class="mt-8 flex flex-col justify-between">
                            <header>
                                <div class="space-x-2">
                                    <a href="{{ route('category', $post->category->slug) }}"
                                    class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                    style="font-size: 10px">
                                    {{ $post->category->title }} </a>
                                </div>

                                <div class="mt-4">
                                    <h1 class="text-3xl">
                                        <a href="{{ route('post', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h1>

                                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published: <time>{{ $post->created_at->diffForHumans() }}</time>
                                    </span>
                                </div>
                            </header>

                            <div class="text-sm mt-4">
                                <p>
                                    {{ $post->excerpt }}
                                </p>
                            </div>

                            <footer class="flex justify-between items-center mt-8">
                                <div class="flex items-center text-sm">
                                    <img src="{{ asset('images/lary-avatar.svg') }}" alt="Lary avatar">
                                    <div class="ml-3">
                                        <h5 class="font-bold">{{ $post->user->name }}</h5>
                                        <h6>Mascot at Laracasts</h6>
                                    </div>
                                </div>

                                <div>
                                    <a href="{{route('post', $post->slug)}}"
                                    class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-7"
                                    >Read More</a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <p class="text-center font-bold">No posts yet. Please check back later.</p>
    @endif
    
</main>
@endsection