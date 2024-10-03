<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Climates')</title>
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @yield('head')</head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<body>
    <header id="custom-navbar">
        <div class="custom-nav-container">
            <div class="custom-climates">
                <a id="custom-climates" href="/"><span class="custom-white">C</span></a>
            </div>
            <ul class="custom-menu list-unstyled" id="custom-menu">
                @if(auth()->check() && auth()->user()->isAdmin())
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('dashboard.user') }}">User</a></li>
                <li><a href="{{ route('dashboard.event') }}">Event</a></li>
                <li><a href="{{ route('dashboard.article') }}">Article</a></li>
                @else
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('volunteer') }}">Volunteer</a></li>
                <li><a href="{{ route('article') }}">Article</a></li>
                <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                @endif
            </ul>

            @guest
            <ul class="custom-logreg" id="custom-logreg">
                <li id="custom-LoginBtn" class="custom-LoginBtn">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li id="custom-RegisterBtn" class="custom-RegisterBtn">
                    <a href="{{ route('register') }}">Register</a>
                </li>
            </ul>
            @endguest

            @auth
            <ul class="custom-userInfo" id="custom-userInfo">
                <li>
                    <a id="custom-userProfile" class="custom-userProfiles" href="{{ route('profile',auth()->id()) }}">{{ auth()->user()->username }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="custom-ButtonLogout" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
            @endauth
        </div>
    </header>  

    <script>
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("custom-navbar").classList.add("custom-scrolled");
                document.getElementById("custom-climates").classList.add("custom-scrolled");
                document.getElementById("custom-menu").classList.add("custom-scrolled");
                if (isLoggedIn) {
                    document.getElementById("custom-userProfile").classList.add("custom-scrolled");
                }
                document.getElementById("custom-LoginBtn").classList.add("custom-scrolled");
                document.getElementById("custom-RegisterBtn").classList.add("custom-scrolled");

            } else {
                document.getElementById("custom-navbar").classList.remove("custom-scrolled");
                document.getElementById("custom-climates").classList.remove("custom-scrolled");
                document.getElementById("custom-menu").classList.remove("custom-scrolled");
                if (isLoggedIn) {
                    document.getElementById("custom-userProfile").classList.remove("custom-scrolled");
                }
                document.getElementById("custom-LoginBtn").classList.remove("custom-scrolled");
                document.getElementById("custom-RegisterBtn").classList.remove("custom-scrolled");
            }
        }
    </script>
</body>
</html>
