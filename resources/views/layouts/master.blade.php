<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            @yield('title', 'Reward Maximizer')
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/bfe1ca38ca.js"></script>

        @stack('head')
    </head>
    <body>
        @include("common.navigation")
        @if(session('alert'))
        <div class='alert alert-success'>
            {{ session('alert') }}
        </div>
        @endif

        @if(session('alert-danger'))
        <div class='alert alert-danger'>
            {{ session('alert-danger') }}
        </div>
        @endif

        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="container">

            @yield('content')

        </div>
    </body>
</html>
