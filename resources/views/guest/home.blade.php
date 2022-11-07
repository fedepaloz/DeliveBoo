<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- icon  --}}
    <link rel="icon" href="{{asset('/images/delivelogo.png')}}" />

    <title>Deliveboo</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <script defer src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <link href="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    {{-- ! CHECK --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> --}}

    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Font-Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="{{ asset('js/front.js') }}"></script>
    <script defer src="{{ asset('js/slider.js') }}"></script>
    <style>

    </style>


</head>

<body>
    <div id="root">

    </div>

</body>
</html>
