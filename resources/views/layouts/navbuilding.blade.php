<nav class="navbar is-transparent navcolor">
    <div class="navbar-brand">
      <a class="navbar-item" href="https://bulma.io">
        <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
      </a>
      <div class="navbar-burger burger navcolor" onclick="document.querySelector('.navbar-menu').classList.toggle('is-active');" data-target="navid">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  
    <div id="navid" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item menutext" href="/house">
            Houses
        </a>
        <a class="navbar-item menutext" href="/land">
            Lands
        </a>
        <a class="navbar-item menutext" href="/apartment">
            Apartments
        </a>
        <a class="navbar-item menutext thisactive" href="/building">
            Buildings
        </a>
        <a class="navbar-item menutext" href="/warehouse">
          Warehouses
        </a>
        <a class="navbar-item menutext" href="/blog">
          Blog
        </a>
        <a class="navbar-item menutext" href="/about">
          About
        </a>
        <a class="navbar-item menutext" href="/contactus">
          Contact Us
        </a>
      </div>
  
      <div class="navbar-end">
        <div class="navbar-item">
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-primary is-inverted is-outlined signupbutton" target="_blank" href="/">
                <span>
                  Sign in
                </span>
              </a>
            </p>
            <p class="control">
              <a class="button is-primary is-inverted is-outlined loginbutton" href="/">
                <span>Join</span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </nav>