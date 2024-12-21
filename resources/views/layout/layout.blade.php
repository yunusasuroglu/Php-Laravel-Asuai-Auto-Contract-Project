<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Asur Ai | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dompurify@2.3.7/dist/purify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html-docx-js@0.3.1/dist/html-docx.min.js"></script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Asur Ai">
    <meta name="robots" content="{{ $robots ?? 'index, follow' }}">
    <meta name='copyright' content='Asur Ai'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="@yield("title")">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="{{asset('/')}}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:locale" content="tr">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Asur Ai">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@softasur">
    <meta name="twitter:creator" content="Asur Soft">
    <meta name="twitter:title" content="Asur Ai">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/assets/images/fav')}}/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('/assets/images/fav')}}/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/assets/images/fav')}}/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/assets/images/fav')}}/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('/assets/images/fav')}}/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('/assets/images/fav')}}/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('/assets/images/fav')}}/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/assets/images/fav')}}/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/assets/images/fav')}}/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('/assets/images/fav')}}/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/assets/images/fav')}}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/assets/images/fav')}}/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/assets/images/fav')}}/favicon-16x16.png">
    <link rel="manifest" href="{{asset('/assets/images/fav')}}/manifest.json">
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('/assets/images/fav')}}/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div id="load" class="gooey">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    @include('include.header')
    @yield('content')
    @include('include.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

</body>
</html>
