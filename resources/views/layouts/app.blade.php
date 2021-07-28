<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <title>@yield('title')</title>
</head>

<body>
    <div class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav justify-content-start navbar-light bg-light">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('EventController@index') }}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('PersonController@index') }}">People</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('AttendeeController@index') }}">Attendees</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
