<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('meta-title',config('app.name'))</title>
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="{{config('app.keywords')}},@yield('meta-keywords')">

    <meta name="author" content="@yield('meta-author',config('app.name'))">
    <meta name="revisit-after" content="1 days">
    <meta name="robots" content="follow,index">


{{--<link rel="shortcut icon" href="img/favicon.ico">--}}



<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    @stack('styles')

    <style>
        *,body,html {
            direction: rtl !important;
            text-align: right !important;
        }
    </style>

</head>
<body>
<div id="app">
    @yield('content')
</div>


@stack('scripts')


</body>
</html>
