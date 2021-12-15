    <html>
    <head>
        <title>App Name - @yield('title')</title>
        @include('layouts.head')
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
        @include('layouts.foot')
    </body>
</html>
