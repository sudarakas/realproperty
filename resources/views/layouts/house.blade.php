<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RealProperty - Leader in Real Esate Business</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600" rel="stylesheet">
</head>
<body>

    <div class="column is-full is-mobile backgroundimg">
        <div class="container">
            <div class="column is-mobile is-centered">
                @include('layouts.navmaster');
            </div>
        </div>
        <div class="container">
            <div class="columns is-mobile is-centered">
               <div class="column is-8 searchbox">
                   <h1 class="subtitle is-4 has-text-white is-pulled-left">Search properties</h1>
                   <div class="tabs">
                    <ul>
                      <li class="is-active has-background-primary tabitem">
                        <a>
                          <span class="has-text-white">Houses</span>
                        </a>
                      </li>
                      <li  class="deadtabitem">
                        <a>
                          <span class="has-text-white">Lands</span>
                        </a>
                      </li>
                      <li class="deadtabitem">
                        <a>
                          <span class="has-text-white">Apartments</span>
                        </a>
                      </li>
                      <li class="deadtabitem">
                        <a>
                          <span class="has-text-white">Buildings</span>
                        </a>
                      </li>
                      <li class="deadtabitem">
                        <a>
                          <span class="has-text-white">Warehouses</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  
                  {{-- Search Box --}}
                <form method="POST" action="/house/find/">
                  @csrf
                    <div class="field has-addons searchinput">
                        <p class="control has-icons-left is-expanded">
                          <input class="input is-large inputsearchbox" type="text" placeholder="Search by City,Postal Code" id="search" name="searchquery">
                          <span class="icon is-small is-left">
                            <i class="fas fa-search"></i>
                          </span>
                        </p>
                        <div class="control">
                            <button class="button inputsearchbox is-primary is-large"><p class="subtitle is-6 has-text-white">Search</p></button>
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
                        <label class="checkbox checktext has-text-white">
                            <input type="checkbox">
                            Swimming pool
                        </label>
                        <label class="checkbox checktext has-text-white">
                            <input type="checkbox">
                            Garage
                        </label>
                        <label class="checkbox checktext has-text-white">
                            <input type="checkbox">
                            Balcony
                        </label>
                        <label class="checkbox checktext has-text-white">
                            <input type="checkbox">
                            Outdoor area
                        </label>
                    </div>
                    <br>
                    </div>
                </form>
               </div>
               <div class="column is-2 adbox">
                 <p class="has-text-white is-5">
                    Got Lost?
                 </p>
                 <br>
                 <p class="has-text-white">
                    If you don't have an idea about this platfrom work, you can simply visit our blog to get an instant idea about how this work.
                 </p>
                 <br>
                 <p class="control">
                    <a class="button is-primary is-inverted is-outlined loginbutton" href="/">
                      <span>Read</span>
                    </a>
                  </p>
               </div>
            </div>
            <div class="has-text-centered indexicon">
                <span class="icon has-text-white is-large">
                  <i class="fas fa-home fa-5x"></i>
                </span>
                <h1 class="has-text-white">JOIN NOW!</h1>
                <h4 class="has-text-white">Find Your Dream House</h4>
            </div>
        </div>
    </div>

    {{-- Deatils Section  --}}
    <div class="columns is-mobile is-centered details">
      <div class="column"></div>
      <div class="column has-text-centered">
        <span class="is-centered has-text-primary">
          <i class="fas fa-home fa-5x"></i>
        </span>
        <br>
        <div class="subtitle has-text-dark marginten">
          Searching for?
        </div>
        Our fast searching algorithm selects what best for you
          <div class="marginten">
            <a href="/" class="has-text-info">Search Now</a>
          </div>
      </div>
      <div class="column has-text-centered">
        <span class="is-centered has-text-primary">
            <i class="far fa-thumbs-up fa-5x"></i>
        </span>
        <br>
        <div class="subtitle has-text-dark marginten">
          Prefect house tips!
        </div>
          Subscribe our blog to get prefect house tips
          <div class="marginten">
            <a href="/" class="has-text-info marginten">Visit Blog</a>
          </div>
      </div>
      <div class="column has-text-centered">
        <span class="is-centered has-text-primary">
            <i class="fas fa-hand-holding-usd fa-5x"></i>
        </span>
        <br>
        <div class="subtitle has-text-dark marginten">
          Sell Yours?
        </div>
        Register now, sell your house,land or apartments easily and free
        <div class="marginten">
            <a href="/" class="has-text-info marginten">Register Now</a>
        </div>
      </div>
      <div class="column"></div>
    </div>

    {{-- Photo Frame Section --}}
    <div class="columns">
      <div class="column image is-2by1 childrenimg">
        
      </div>
      <div class="column colorred">
        <h1 class="title is-1 has-text-white has-text-centered maketheir">Make Thier</h1>
        <h2 class="title is-2 has-text-white has-text-centered futurebetter">Future Better!</h2>
        <p class="control has-text-centered">
          <a class="button is-primary is-inverted has-text-centered is-outlined signbuttonbelow" href="/">
              <span>Join</span>
            </a>
          </p>
      </div>
    </div>

    {{-- Article Section --}}
    <div class="column">
        <h3 class="title is-3 has-text-grey-darker has-text-centered">Recent Blog Articles</h3>
      <div class="container">
        @include('layouts.article')
        @include('layouts.article')
        @include('layouts.article')
      </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')


      {{-- JavaScript Files --}}
      <script src="/js/jquery-3.3.1.min.js"></script>
      <script src="/js/fontawesome.js"></script>
</body>
</html>