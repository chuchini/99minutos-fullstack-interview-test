<html>

<head>
    <title>Github-API-Wrapper - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
<<<<<<< HEAD
    <a class="navbar-brand" href="/">HOME</a>
=======
    <a class="navbar-brand" href="#">OPTIONS</a>
>>>>>>> bbaa79f4204216eceb63f5c06b28253e587027ac
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="\branches">branches</a>
            </li>
            <li class="nav-item">
<<<<<<< HEAD
                <a class="nav-link" href="\pullrequests">View pull requests</a>
=======
                <a class="nav-link" href="\pullrequests">View Pull Requests</a>
>>>>>>> bbaa79f4204216eceb63f5c06b28253e587027ac
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\pullrequests\newpr">New pull request</a>
            </li>
        </ul>
    </div>
</nav>

<body>
    <div class="container pt-5">
        @yield('content')
    </div>
</body>

</html>
