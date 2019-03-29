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
            <div class="containerx">
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
        <div class="containerx detailssection">
            <div class="columns is-flex-mobile">
                <div class="column is-two-thirds is-flex-mobile">
                    <div class="containerx">
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

                                {{-- Mobile/Tablet Section --}}
                                <div class="column is-hidden-desktop">
                                    <div class='is-flex is-horizontal-center'>
                                        <figure class="image is-128x128">
                                            <img class="is-rounded is-horizontal-center" src="/uploads/avatars/1552585682.jpg">
                                        </figure>
                                    </div>
                                    <div class="subtitle has-text-centered">@NanoEstate</div>
                                    <div class="has-text-centered">
                                        <button class="button is-success" onclick="showPnox()">Show Contact Number</button>
                                        <p class="has-text-dark customerpno" id="pnox">071 300 90 95</p>
                                        <hr>
                                        <p class="owneramount">Owner Estimated: <span class="has-text-success has-text-weight-bold">5900000.00</span>                                            LKR</p>
                                        <p class="bidamount">Current Highest Offer: <span class="has-text-danger has-text-weight-bold">4500000.00</span>                                            LKR</p>
                                        <button class="button is-link">Make an offer</button>
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
                        <button class="button is-dark" onclick="location.href='#contactbox'">Email Owner</button>
                        <button class="button is-success" onclick="showPno()">Call Owner</button>
                        <p class="has-text-dark customerpno" id="pno">071 300 90 95</p>
                        <hr>
                        <p class="owneramount">Owner Estimated: <span class="has-text-success has-text-weight-bold">5900000.00</span> LKR</p>
                        <p class="bidamount">Current Highest Offer: <span class="has-text-danger has-text-weight-bold">4500000.00</span> LKR</p>
                        <button class="button is-link">Make an offer</button>
                    </div>
                </div>
            </div>
            <hr> {{-- Google Map Here --}} {{--
            <div class=" is-flex-mobile"> --}}
                <div class="column maps is-flex-mobile">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="790" height="678" id="gmap_canvas" src="https://maps.google.com/maps?q=uva%20wellassa%20&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    /* height: 678px; */
                                    width: 790px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none!important;
                                    /* /* height: 678px; */
                                    width: 790px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            <hr>
            <div class="column is-flex-mobile">
                <div class="subtitle has-text-weight-semibold">Property Description</div>
                <p>
                    House 1 - (8,500 sq ft including terraces) 90 perches - Rs170m / $3,500pm
                    <br>
                    <br> Obscured by mature shade trees in the large front garden, the private driveway discreetly opens
                    to a paved courtyard that parks 6-8 vehicles. The unassuming front facade embodies understated elegance,
                    a feature that resonates throughout the property. The entrance foyer houses an internal flight of steps
                    and large open-to-sky ponds leading to the formal living area. A wide terraced verandah with alfresco
                    dining and bbq offer extended spaces for living and entertainment. Raised well above the level of the
                    paddy fields beyond, the gently sloped rear garden ends with a large infinity pool spanning the breadth
                    of the property. Previously tenanted to a senior western diplomat. Available for sale or for rent, fully
                    furnished. Lower floor: Entrance foyer, formal living, dining, guest room and toilet, powder room, pantry,
                    staff quarters Upper floor: Informal living, master bedroom and toilet, twin rooms with common toilet,
                    laundry room, library and entertainment room, study, gym External layout: large storage room, standby
                    generator, open parking, terraced verandah, alfresco dining, infinity pool, extensive front and rear
                    gardens
                    <br>
                    <br> House 2 (5,000 sqft including terraces) - 32 perches - Rs80m /$1,500pm
                    <br> For a moderately sized property, this newly completed house boasts a spacious front courtyard which
                    parks 3-4 vehicles. Thoughtfully designed to take advantage of natural light and ventilation, three levels
                    of living spaces with high ceilings, open to wide terraces that offer wonderful views of the paddy fields
                    beyond. Ideal as a spacious studio / home office or home for parents / adult children, this property
                    can be accessed from a bylane or the main compound.
                    <br>
                    <br> Entrance floor: Formal living, dining, twin bedrooms with common toilet, pantry
                    <br>
                    <br> Lower floor: Informal living, wet kitchen, laundry, storage room, staff quarters
                    <br> Upper floor: 2 bedrooms with attached toilets, library and study
                    <br> External layout: open parking, wide terraces on all levels, plunge pool, front and rear gardens
                    Potential for purchasing adjoining property to increase plot size exists.
                    <br>
                    <br> More information and photos available on request.
                </p>
            </div>
            <hr>
            <div class="column is-flex-mobile">
                <div class="subtitle has-text-weight-semibold">Property Features</div>

                <ul>
                    <li>LUXURY SPECS</li>
                    <li>SWIMMING POOL</li>
                    <li>HOT WATER</li>
                    <li>AC ROOM</li>
                </ul>

            </div>
            <hr>
            <div class="column is-flex-mobile" id="contactbox">
                <div class="subtitle has-text-weight-semibold">Contact Owner</div>
                <form action="" method="post">
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Name</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input class="input" type="text" placeholder="Name">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                      </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Email</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input class="input" type="email" placeholder="Email">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                      </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Phone No</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-expanded">
                                <div class="field has-addons">
                                    <p class="control">
                                        <a class="button is-static">
                                          +94
                                        </a>
                                    </p>
                                    <p class="control is-expanded">
                                        <input class="input" type="tel" placeholder="Your phone number">
                                    </p>
                                </div>
                                <p class="help has-text-link">Do not enter the first zero</p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Subject</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="text" placeholder="e.g. Need to visit property">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Message</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea" placeholder="Explain how I can help you"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <!-- Left empty for spacing -->
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary">
                                        Send message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <br>
                <div class="notification is-danger">
                    <button class="delete"></button>
                    <strong>Important information:</strong> This ad has been posted on Realproperty.lk by the above mentioned
                    advertiser. Realproperty.lk does not have any connection with this advertiser, nor do we vet the advertisers,
                    guarantee their services, responsible for the accuracy of the ad's content or are responsible for services
                    provided by the advertisers. Realproperty.lk does not provide any service other than list the advertisements
                    posted by advertisers. You will be contacting the advertiser (owner/agent) of this property directly.
                    We advise you to take precaution when making any payments or signing any agreements and be alert of any
                    possible scams. If making any payments we recommend that you have two permanent & verified methods of
                    contact of the payment receiver such as their landline number and home/business address.
                </div>
                <a href="" class="is-pulled-right link reportad"><span><i class="far fa-flag"></i></span><span class="has-text-balck"> Report Advertisement</span></a>
                <br>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                $notification = $delete.parentNode;
                $delete.addEventListener('click', () => {
                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>

</body>

</html>