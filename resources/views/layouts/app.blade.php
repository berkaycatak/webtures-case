<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @isset($website_title)
        <title>{{ $website_title }} - {{ config('app.name', 'Laravel') }}</title>
    @elseif(isset($website_home_title))
        <title>{{ $website_home_title }}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    @isset($website_description)
        <meta name="description" content="{{ $website_description }}">
@endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="dash">
            <sidebar-component>{{ config('app.name', 'Laravel') }}</sidebar-component>
            <div class="dash-app">
                <header-component>
                    <form method="POST" action="{{ route("logout") }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </header-component>
                <main class="dash-content">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-md-10">
                                <h1 class="dash-title">{{ $website_title }}</h1>
                            </div>
                            @isset($header_action)
                                <div class="col-md-2">
                                    {{ $header_action }}
                                </div>
                            @endif
                        </div>

                        @isset($errors)
                            @if($errors->any())
                                <div class="errors mt-3">
                                    @foreach($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </div>
                            @endif
                        @endif

                        @if(session('success') != "")
                            <success-message-component>{{ session('success') }}</success-message-component>
                        @endif

                        @if(session('error') != "")
                            <error-message-component>{{ session('error') }}</error-message-component>
                        @endif

                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function deleteConfirm() {
            return confirm('Silmek istediğinizden emin misiniz?');
        }
    </script>
</body>
</html>
