<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="index,follow">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123751041-5"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-123751041-5');
        </script>
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Marinsat.xyz">
        {!! SEO::generate(true) !!}
        <meta name="keywords" content="filma me titra, filma me titra shqip, titra shqip, filma24, filmaon, mistreci, filma shqiptar, filma shqip, filma falas, seriale falas, seriale me titra shqip seriale shqip">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" data-turbolinks-track="true">
        <script defer src="{{ mix('js/front.js') }}" data-turbolinks-track="true"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123751041-5"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-123751041-5');
        </script>

    </head>
    <body class="bg-gradient-to-tr from-blue-700 via-pink-800 to-green-900">
        <x-front.navbar></x-front.navbar>
        <div class="min-h-screen font-sans antialiased">
            {{ $slot }}
        </div>
        <x-front.footer></x-front.footer>
    </body>
</html>
