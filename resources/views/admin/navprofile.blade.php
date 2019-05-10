<nav class="navbar adminprofilenavbar" role="navigation" aria-label="main navigation">
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-end is-pulled-right">
            <div class="navbar-item is-pulled-right">
                <div class="buttons is-pulled-right">
                    <a class="button is-transaprent is-pulled-right" href="/admin">
                        <span>
                        <i class="fas fa-home"></i>
                      </span>
                    </a>
                    <a class="button is-light is-pulled-right nounderlinebtn" href="{{ route('admin.logout') }}">
                      Sign out
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>