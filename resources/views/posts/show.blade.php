@extends('welcome')
@section('content')
<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            @if ($post->image)
                <img src="{{ asset('uploads/'. $post->image) }}" alt="{{ $post->title }}" class="rounded-xl w-full">
            @else
                <img src="{{ asset('images/illustration-1.png') }}" alt="NewsDev Latest News" class="rounded-xl">
            @endif
            <p class="mt-4 block text-gray-400 text-xs">
                Published: <time> {{ $post->created_at->diffForHumans() }} </time>
            </p>

            <div class="flex items-center lg:justify-center text-sm mt-4">
                <img class="w-10" src="{{ asset('images/avatar.png') }}" alt="Lary avatar">
                <div class="ml-3 text-left">
                    <h5 class="font-bold"> 
                        <a class="text-yellow-500 hover:text-pink-500 transition" href="{{route('author', $post->user->slug)}}" rel="noopener noreferrer nofollow" >
                            {{ $post->user->name }}
                        </a>
                    </h5>
                    <h6>News at NewsDev</h6>
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
                    <a href="{{ route('category', $post->category->slug) }}"
                        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:text-white hover:bg-blue-500"
                        style="font-size: 10px" rel="noopener noreferrer nofollow">
                        {{ $post->category->title }}
                    </a>
                </div>
            </div>

            <h1 class="font-bold text-3xl lg:text-4xl mb-10 text-yellow-500 hover:text-pink-500 transition">
                {{ $post->title }}
            </h1>

            <div class="space-y-4 lg:text-lg leading-loose">
                <p>
                    {!! $post->body !!}
                </p>
            </div>
        </div>

        {{-- comments section  --}}
        <section class="col-span-8 col-start-5 mt-10 space-y-6">

            <form class="border border-gray-200 p-6 rounded-xl" action="{{route('comment.store', $post->slug)}}" method="post">
                @csrf
                <header class="flex items-center">
                    <img class="w-10" src="{{ asset('images/avatar.png') }}" alt="" width="40" height="40" class="rounded-full">
                    <h2 class="ml-4">Want to participate?</h2>
                </header>
                <div class="mt-6">
                    <textarea name="body" class="w-full text-small border focus:outline-none focus:ring p-2 @error('body') is-invalid @enderror" cols="10" rows="5" placeholder="Quick, think of something to say!" required></textarea>
                    @error('body')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button class="px-10 py-2 rounded-3xl bg-blue-500 uppercase font-semibold text-white text-sm hover:bg-blue-700">post</button>
                </div>
            </form>

            @foreach ($post->comments as $comment)
                <article class="flex bg-gray-100 p-6 rounded-xl border border-gray-200 space-x-4">
                    <div class="w-1/5">
                        <img class="rounded-xl w-10" src="{{ asset('images/avatar.png') }}" alt="{{ $post->title }}">
                    </div>
                    <div>
                        <header>
                            <h3 class="font-bold">{{ $comment->user->name }}</h3>
                            <p class="text-xs mb-4">Posted: 
                                <time> {{ $comment->created_at->format('D-m-y') }} </time>
                            </p>
                            <p>{{ $comment->body }}</p>
                        </header>
                    </div>
                </article>
            @endforeach
            
        </section>
        {{-- end comment section --}}

    </article>
</main>
@endsection