<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{asset('dist/css/app.css')}}" rel="stylesheet" />
</head>

<body class="antialiased">
    <div class="container">
        <div class="wrapper">
            <img src="{{asset('dist/images/Honda Jateng Gunungan.png')}}" alt="logo" class="logo"><br>
            <img src="{{asset('dist/images/coming_soon.png')}}" alt="Coming Soon" class="coming_soon">
        </div>
    </div>
</body>

</html>