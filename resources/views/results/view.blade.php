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
    <link rel="stylesheet" href="/css/flickity.css"> {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">

</head>

<body>
    @include('results.navresult')

    <div class="viewsection">

        <div class="column profileback">
            <div class="container">
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
        <div class="container detailssection">
            <div class="columns is-flex-mobile">
                <div class="column is-two-thirds is-flex-mobile">
                    <div class="container">
                        <a href="http://" class="button is-danger is-pulled-right"><span><i class="far fa-heart"></i></span></a>
                        <div class="is-pulled-left">
                            <div class="title">
                                98 Wellington st
                            </div>
                            <div class="subtitle">
                                Wallan, Vic 3756
                            </div>
                            <hr class="hrline">
                            <div class="subtitle has-text-weight-semibold">
                                Property Details
                            </div>
                            <div class="columns">
                                <div class="column detailscolumn">
                                    <p>Property Type: <span class="has-text-weight-semibold">House</span></p>
                                    <p>Bedrooms: <span class="has-text-weight-semibold">4</span></p>
                                    <p>Floor area: <span class="has-text-weight-semibold">10000</span></p>
                                    <p>No. of floors: <span class="has-text-weight-semibold">2</span></p>
                                    <p>Car parking spaces: <span class="has-text-weight-semibold">4</span></p>
                                </div>
                                <div class="column">
                                    <p>Area of land: <span class="has-text-weight-semibold">10</span></p>
                                    <p>Availability: <span class="has-text-weight-semibold">Availabale</span></p>
                                    <p>Nearest bus stop: <span class="has-text-weight-semibold">Maradana</span></p>
                                    <p>Nearest train station: <span class="has-text-weight-semibold">Maradana</span></p>
                                </div>

                                <div class="column is-hidden-desktop">
                                    <div class='is-flex is-horizontal-center'>
                                        <figure class="image is-128x128">
                                            <img class="is-rounded is-horizontal-center" src="/uploads/avatars/1552585682.jpg">
                                        </figure>
                                    </div>
                                    <div class="subtitle has-text-centered">@NanoEstate</div>
                                    <div class="has-text-centered">
                                        <button class="button is-success" onclick="showPnox()">Show Contact Number</button>
                                        <p class="has-text-dark customerpno" id="pnox"><span class="has-text-dark">071 300 90 95</span></p>
                                        <p>Current Bid: <span class="has-text-danger has-text-weight-bold">4500000</span> LKR</p>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-hidden-touch">
                    <div class='is-flex is-horizontal-center'>
                        <figure class="image is-128x128">
                            <img class="is-rounded is-horizontal-center" src="/uploads/avatars/1552585682.jpg">
                        </figure>
                    </div>
                    <div class="subtitle has-text-centered">@NanoEstate</div>
                    <div class="has-text-centered">
                        <button class="button is-success" onclick="showPno()">Show Contact Number</button>
                        <p class="has-text-dark customerpno" id="pno">071 300 90 95</p>
                        <p>Current Bid: <span class="has-text-danger has-text-weight-bold">4500000.00</span> LKR</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- Footer --}}
    @include('layouts.footer') {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/flickity.pkgd.min.js"></script>
    <script>
        function showPno() {
            var x = document.getElementById("pno");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function showPnox() {
            var x = document.getElementById("pnox");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

</body>

</html>