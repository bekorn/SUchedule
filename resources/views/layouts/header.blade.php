<header>

    <nav class="main">
        <a href="{{route('home')}}">
            Betterweb
        </a>

        <a href="{{route('home')}}">Home</a>

        <a href="{{route('courses')}}">Courses</a>

        <a href="{{route('home')}}">Schedules</a>
    </nav>

    <nav class="side">
        @if( auth()->user() )
            <div class="profile">
                <img src="{{ auth()->user()->avatar_url }}" class="profile">
                <span>{{auth()->user()->given_name}} {{auth()->user()->family_name}}</span>
            </div>

            <a href="{{route('logout')}}">Log Out</a>
        @else
            <a href="{{route('login')}}">Login</a>
        @endif
    </nav>


</header>
