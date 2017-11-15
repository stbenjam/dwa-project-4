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
        <div class="container">

            @yield('content')

        </div>
    </body>
</html>
