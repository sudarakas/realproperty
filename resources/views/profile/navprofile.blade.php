<nav class="navbar profilenavbar" role="navigation" aria-label="main navigation">
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-end is-pulled-right">
            <div class="navbar-item is-pulled-right">
                <div class="buttons is-pulled-right">
                    <style>
                    </style>
                    <a class="button is-transaprent is-pulled-right" href="/profile/message">
                        <span>
                            
                            @if(countMessageByUserId() > 0)
                                <i class="far fa-envelope has-text-danger"></i>
                                <span class="has-text-danger has-text-weight-bold">{{countMessageByUserId()}}</span>
                            @else
                                <i class="far fa-envelope"></i>
                            @endif
                        </span>
                        
                    </a>
                    <a class="button is-light is-pulled-right nounderlinebtn" href="{{ route('logout') }}">
                      Sign out
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>