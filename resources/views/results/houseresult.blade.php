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
</head>

<body>
    @include('results.navresult')

    <div class="container">
        {{-- Search Box --}}
        <form method="POST" action="/house/search">
            @csrf
              <div class="field has-addons searchagain">
                  <p class="control has-icons-left is-expanded">
                    <input class="input is-medium inputsearchbox" type="text" placeholder="Search by City,Postal Code" id="search" name="searchquery">
                    <span class="icon is-small is-left">
                      <i class="fas fa-search"></i>
                    </span>
                  </p>
                  <div class="control">
                      <button class="button inputsearchbox is-primary is-medium"><span class="subtitle is-6 has-text-white">Search</span></button>
                  </div>
              </div>
              <div class="is-hidden-touch">
              <div class="field has-addons">
                  <div class="control has-icons-left">
                      <div class="select selectbox is-small">
                          <select name="minprice">
                          <option value="0">Price(Min)</option>
                          <option value="1000000">1 Million</option>
                          <option value="2000000">2 Million</option>
                          <option value="3000000">3 Million</option>
                          <option value="4000000">4 Million</option>
                          <option value="5000000">5 Million</option>
                          <option value="6000000">6 Million</option>
                          <option value="7000000">7 Million</option>
                          <option value="8000000">8 Million</option>
                          <option value="9000000">9 Million</option>
                          <option value="10000000">10 Million</option>
                          <option value="50000000">50 Million</option>
                          <option value="100000000">100 Million</option>
                          <option value="200000000">200 Million</option>
                          <option value="1000000000">1 Billion</option>
                          <option value="50000000000">50 Billion</option>
                          <option value="100000000000">100 Billion</option>
                          </select>
                      </div>
                      <span class="icon is-small is-left">
                        <i class="fas fa-dollar-sign"></i>
                      </span>
                  </div>
                  <div class="control has-icons-left">
                    <div class="select selectbox is-small">
                        <select name="maxprice">
                          <option value="9999999999999999999999999999999">Price(Max)</option>
                          <option value="1000000">1 Million</option>
                          <option value="2000000">2 Million</option>
                          <option value="3000000">3 Million</option>
                          <option value="4000000">4 Million</option>
                          <option value="5000000">5 Million</option>
                          <option value="6000000">6 Million</option>
                          <option value="7000000">7 Million</option>
                          <option value="8000000">8 Million</option>
                          <option value="9000000">9 Million</option>
                          <option value="10000000">10 Million</option>
                          <option value="50000000">50 Million</option>
                          <option value="100000000">100 Million</option>
                          <option value="200000000">200 Million</option>
                          <option value="1000000000">1 Billion</option>
                          <option value="50000000000">50 Billion</option>
                          <option value="100000000000">100 Billion</option>
                        </select>
                    </div>
                    <span class="icon is-small is-left">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <div class="control has-icons-left">
                    <div class="select selectbox is-small">
                        <select name="room">
                        <option value="0">Rooms</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">More</option>
                        </select>
                    </div>
                    <span class="icon is-small is-left">
                      <i class="fas fa-walking"></i>
                    </span>
                  </div>
                  <label class="checkbox checktext has-text-primary">
                      <input type="checkbox" name="swimmingpool" value="yes">
                      Swimming pool
                  </label>
                  <label class="checkbox checktext has-text-primary">
                      <input type="checkbox" name="balcony">
                      Balcony
                  </label>
                  <label class="checkbox checktext has-text-primary">
                      <input type="checkbox" name="outdoor"> 
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
                @include('results.noresult')
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