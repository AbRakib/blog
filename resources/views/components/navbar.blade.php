<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a class="font-semibold text-lg" href="{{ route('home') }}">
            <!--<img src="{{ asset('images/logo.svg') }}" alt="Laracasts Logo" width="165" height="16">-->
            <i>News<span class="text-red-600">Dev</span></i>
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex items-center">
        @auth
            <a href="/" class="text-xs font-bold uppercase">Welcome {{ Auth::user()->name }}</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="text-xs font-bold uppercase ml-3 text-blue-500 hover:underline">Logout</button>
            </form>
        @endauth
        @guest
            <a href="{{route('login')}}" class="text-xs font-bold uppercase ml-3">Login</a>
            <a href="{{route('register')}}" class="text-xs font-bold uppercase ml-3">Register</a>
        @endguest
        <a href="#subscribe" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>