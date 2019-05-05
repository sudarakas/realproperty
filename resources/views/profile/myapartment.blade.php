<link rel="stylesheet" href="/css/bootstrap.css">
<div class="column displaybox">
    @include('profile.navprofile')
    <nav class="breadcrumb has-arrow-separator has-background-white" aria-label="breadcrumbs">
        <ul>
            <li><a href="/profile">Profile</a></li>
            <li class="is-active"><a href="/profile">My Apartment</a></li>
        </ul>
    </nav>
    <div class="containerx">
        <div class="grayme">
            <div class="row">
                    @if($apartments->count() > 0) 
                    @foreach ($apartments as $apartment)
                        @include('profile.threadapartment') 
                    @endforeach 
                    @else
                        @include('profile.noresult')
                    @endif
                    {{ $apartments->links() }}
            </div>
        </div>
    </div>
</div>