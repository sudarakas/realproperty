<div class="container">
    <div class="is-centered">
        <a class="navbar-item is-centered is-horizontal-center" href="/">
            <img src="/img/logoblack.png"  width="112" height="28">
        </a>       
        <div class="buttons is-centered">
        @guest
          <a class="button is-light is-centered nounnounderlinebtn" href="/login">
            Log in
          </a>
        @if (Route::has('register'))
          <a class="button is-primary is-centered nounnounderlinebtn" href="/register">
              <strong>Sign up</strong>
          </a>
        @endif
        @else
        <a class="button is-primary is-centered nounderlinebtn" href="/profile">
            Profile
          </a>
          <a class="button is-light is-centered nounderlinebtn" href="/logout">
              Sign out
            </a>
        </div>
    </div>
</div>
  <nav class="navbar" role="navigation" class="is-centered" aria-label="main navigation">
    <div class="navbar-brand">
      <a role="button" class="navbar-burger burger button is-primary" aria-label="menu" aria-expanded="false" onclick="document.querySelector('.below').classList.toggle('is-active');" data-target="belownav">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="belownav" class="navbar-menu below is-centered navsearch">
      <div class="navbar-start">
            <a class="navbar-item menuitemnav" href="/house">
                Houses
            </a>
            <a class="navbar-item menuitemnav" href="/land">
                Lands
            </a>
            <a class="navbar-item menuitemnav" href="/apartment">
                Apartments
            </a>
            <a class="navbar-item menuitemnav" href="/building">
                Buildings
            </a>
            <a class="navbar-item menuitemnav" href="/warehouse">
              Warehouses
            </a>
            <a class="navbar-item menuitemnav" href="/blog">
              Blog
            </a>
            <a class="navbar-item menuitemnav" href="/about">
              About
            </a>
            <a class="navbar-item menuitemnav" href="/contactus">
              Contact Us
            </a>
      </div>
      <div class="navbar-end">
      <div class="navbar-item">
      @endguest
      </div>
    </div>
    </div>
  </nav>
