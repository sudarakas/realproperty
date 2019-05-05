<link rel="stylesheet" href="/css/bootstrap.css">
<div class="column displaybox">
    @include('profile.navprofile')
    <nav class="breadcrumb has-arrow-separator has-background-white" aria-label="breadcrumbs">
        <ul>
            <li><a href="/profile">Profile</a></li>
            <li class="is-active"><a href="/profile">My Warehouse</a></li>
        </ul>
    </nav>
    <div class="containerx">
        <div class="grayme">
            <div class="row">
                    @if($warehouses->count() > 0) 
                    @foreach ($warehouses as $warehouse)
                        @include('profile.threadwarehouse') 
                    @endforeach 
                    @else
                        @include('profile.noresult')
                    @endif
                    
            </div>
            {{ $warehouses->links() }}
        </div>
    </div>
</div>