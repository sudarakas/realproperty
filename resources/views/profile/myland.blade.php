<link rel="stylesheet" href="/css/bootstrap.css">
<div class="column displaybox">
    @include('profile.navprofile')
    <nav class="breadcrumb has-arrow-separator has-background-white" aria-label="breadcrumbs">
        <ul>
            <li><a href="/profile">Profile</a></li>
            <li class="is-active"><a href="/profile">My Land</a></li>
        </ul>
    </nav>
    <div class="containerx">
        <div class="grayme">
            <div class="row">
                    @if($lands->count() > 0) 
                    @foreach ($lands as $land)
                        @include('profile.threadland') 
                    @endforeach 
                    @else
                        @include('profile.noresult')
                    @endif

            </div>
        </div>
    </div>
</div>