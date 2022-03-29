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
    <link rel="stylesheet" href="../css/spur.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="form-screen">
            <a href="{{ url('/') }}" class="spur-logo"><i class="fas fa-bolt"></i> <span>{{ config('app.name', 'Laravel') }}</span></a>
            <div class="card account-dialog">
                <div class="card-header bg-primary text-white">
                    {{ $website_title }}
                </div>
                <div class="card-body">
                    @isset($errors)
                        @if($errors->any())
                            <div class="errors mt-3">
                                <div class="mt-3 form-error-top">
                                    @foreach($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                    @if(session('success') != "")
                        <div class="container mt-3">
                            @php(printSuccessMessage(session('success')))
                        </div>
                    @endif

                    @if(session('error') != "")
                        <div class="container mt-3">
                            @php(printErrorMessage(session('error')))
                        </div>
                    @endif


                    <main class="py-4">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/spur.js"></script>
</body>
</html>
