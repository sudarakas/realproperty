<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RealProperty</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/flickity.css"> 
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600" rel="stylesheet">

</head>

<body>
    @include('results.navresult')

    <div class="container">
        <div class="column">
            <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
            </div>

            <div class="carousel carousel-nav" data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
                <div class="carousel-cell"><img src="/img/testhouse.jpeg" /></div>
            </div>
        </div>
    </div>

    {{-- Footer --}} 
    @include('layouts.footer') 

    {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/flickity.pkgd.min.js"></script>

</body>

</html>