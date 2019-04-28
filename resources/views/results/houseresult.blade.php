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
    <link rel="stylesheet" href="/css/bootstrap.css"> {{-- Google Fonts --}}
    <link rel="stylesheet" href="font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet"> {{-- Styles for No Result Page --}}
    <style>
        .noresult {
            color: #7f8897;
            font-family: Lato, sans-serif;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 0.05em;
            line-height: 1.5em;
            text-align: center;
            margin-bottom: 10%;
        }

        .wrap {
            margin: 15% auto 0;
            width: 80px;
            height: 100px;
        }

        h2 {
            font-size: 16px;
            font-weight: 400;
            text-transform: uppercase;
            margin-top: 3em;
        }

        div.items {
            font-size: 10px;
        }
        div.items:hover {
            color: hsl(171, 100%, 41%) !important;
            transition: color 2s;
        }
    </style>

</head>

<body>
    @include('results.navresult')

    <div class="container">
        {{-- Search Box --}}
        <form method="POST" action="/search">
            @csrf
            <div class="field has-addons searchagain">
                <p class="control has-icons-left is-expanded">
                    <input class="input is-primary is-medium inputsearchbox" type="text" placeholder="Search by City,Postal Code" id="search"
                        name="searchquery">
                    <span class="icon is-small is-left">
                          <i class="fas fa-search"></i>
                        </span>
                </p>
                <div class="control">
                    <button class="button inputsearchbox is-primary is-medium"><p class="subtitle is-6 has-text-white">Search</p></button>
                </div>
            </div>
            <div class="is-hidden-touch">
                <div class="field has-addons">
                    <div class="control has-icons-left">
                        <div class="select selectbox is-small">
                            <select>
                              <option>Price(Min)</option>
                              <option>With options</option>
                              </select>
                        </div>
                        <span class="icon is-small is-left">
                            <i class="fas fa-dollar-sign"></i>
                          </span>
                    </div>
                    <div class="control has-icons-left">
                        <div class="select selectbox is-small">
                            <select>
                            <option>Price(Max)</option>
                            <option>With options</option>
                            </select>
                        </div>
                        <span class="icon is-small is-left">
                          <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <div class="control has-icons-left">
                        <div class="select selectbox is-small">
                            <select>
                            <option>Rooms</option>
                            <option>With options</option>
                            </select>
                        </div>
                        <span class="icon is-small is-left">
                          <i class="fas fa-walking"></i>
                        </span>
                    </div>
                    <label class="checkbox checktext has-text-primary">
                          <input type="checkbox">
                          Swimming pool
                      </label>
                    <label class="checkbox checktext has-text-primary">
                          <input type="checkbox">
                          Garage
                      </label>
                    <label class="checkbox checktext has-text-primary">
                          <input type="checkbox">
                          Balcony
                      </label>
                    <label class="checkbox checktext has-text-primary">
                          <input type="checkbox">
                          Outdoor area
                      </label>
                </div>
                <br>
            </div>
        </form>
    </div>

    {{--
    <div class="columns">
        <div class="column is-3">

        </div>
        <div class="column is-6 is-centered">
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')
        </div>
        <div class="column is-3">

        </div>
    </div> --}}

    <div class="grayme">
        <div class="row printarea">
            @if($houses->count() > 0) 
            @foreach ($houses as $house)
                @include('results.thread') 
            @endforeach 
            @else
            <div class="column noresult content">
                <div class="wrap">
                    <div class="items">
                        <i class="fa fa-file fa-7x"></i>
                    </div>
                </div>
                <h2>No results</h2>
                <p><em>We searched far and wide and couldn't <br/>find anyone matching your search.</em></p>
            </div>

            @endif
        </div>
    </div>
    {{-- Footer --}}
    @include('layouts.footer') {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src="/js/bootstrap.js"></script>

</body>

</html>