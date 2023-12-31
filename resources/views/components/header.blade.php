@if (isset($categories))
<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-yellow-700 hover:text-yellow-500 transition">Best News From DEV</span> News
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">

            <div x-data="{ show: false }" class="w-full">
                {{-- Tigger category --}}
                <button @click="show = ! show" @click.away="show=false" class="w-full bg-transparent py-2 pl-3 pr-9 text-sm font-semibold lg:w-32 flex lg:inline-flex">
                    {{ isset($currentCategory) ? ucwords($currentCategory->title) : 'Categories' }}
                </button>

                {{-- dropdown category --}}
                <div x-show="show" class="py-2 absolute w-32 bg-gray-100 rounded-xl mt-2 w-full overflow-auto max-h-52">
                    @foreach ($categories as $category)
                        <a class="block w-full text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }}" href="{{route('category', $category->slug)}}">{{ ucwords($category->title) }}</a>
                    @endforeach
                </div>
            </div>

            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                 height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something" class="bg-transparent placeholder-black font-semibold text-sm" value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>
@endif