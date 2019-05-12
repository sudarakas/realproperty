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

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600" rel="stylesheet">
</head>
<body>

    <div class="column is-full is-mobile backgroundimg">
        <div class="container">
            <div class="column is-mobile is-centered">
                @include('layouts.navland');
            </div>
        </div>
        <div class="container">
            <div class="columns is-mobile is-centered">
               <div class="column is-8 searchbox">
                   <h1 class="subtitle is-4 has-text-white searchboxtitletext">Search properties</h1>
                   <div class="tabs">
                    <ul>
                      <li class="deadtabitem">
                        <a href="/house">
                          <span class="has-text-white">Houses</span>
                        </a>
                      </li>
                      <li  class="is-active has-background-primary tabitem">
                        <a href="/land">
                          <span class="has-text-white">Lands</span>
                        </a>
                      </li>
                      <li class="deadtabitem">
                        <a href="apartment">
                          <span class="has-text-white">Apartments</span>
                        </a>
                      </li>
                      <li class="deadtabitem">
                        <a href="/building">
                          <span class="has-text-white">Buildings</span>
                        </a>
                      </li>
                      <li class="deadtabitem">
                        <a href="/warehouse">
                          <span class="has-text-white">Warehouses</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  
                  {{-- Search Box --}}
                <form method="POST" action="/land/search">
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
                        <label class="checkbox checktext has-text-white">
                            <input type="checkbox" name="electricity">
                            3 Phase Electricity
                        </label>
                        <label class="checkbox checktext has-text-white">
                            <input type="checkbox" name="tapwater">
                            Tap Water
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
                    <a class="button is-primary is-inverted is-outlined loginbutton" href="/blog">
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
            <a href="/blog" class="has-text-info marginten">Visit Blog</a>
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
            <a href="register" class="has-text-info marginten">Register Now</a>
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
          <a class="button is-primary is-inverted has-text-centered is-outlined signbuttonbelow" href="register">
              <span>Join</span>
            </a>
          </p>
      </div>
    </div>

    {{-- Article Section --}}
    <div class="column">
        <h3 class="title is-3 has-text-grey-darker has-text-centered">Recent Blog Articles</h3>
      <div class="container">
          @foreach ($articles as $article)
            @include('layouts.article')
          @endforeach
      </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')


      {{-- JavaScript Files --}}
      <script src="/js/jquery-3.3.1.min.js"></script>
      <script src="/js/fontawesome.js"></script>
</body>
</html>