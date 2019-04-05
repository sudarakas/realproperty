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
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">

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
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')
    @include('results.thread')

        </div>
    </div>
    {{-- Footer --}}
    @include('layouts.footer') {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src="/js/bootstrap.js"></script>

</body>

</html>