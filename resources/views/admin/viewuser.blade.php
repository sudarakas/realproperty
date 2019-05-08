<div class="column displaybox">
    @include('admin.navprofile')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/admin">Admin</a></li>
            <li class="is-active"><a href="/profile">View User</a></li>
        </ul>
    </nav>
    <div class="columns is-mobile is-centered">
        <div class="column is-half">
    @include('layouts.errors') @if(session()->has('message'))
            <div class="notification is-success">
                <button class="delete"></button>
                <h1 class="is-size-7"><b> {{ session()->get('message') }}</b></h1>
            </div>
            @endif
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                    $notification = $delete.parentNode;
                    $delete.addEventListener('click', () => {
                        $notification.parentNode.removeChild($notification);
                    });
                });
            });
        </script>
    </div>
    <div class="card cardmargin">
        <div class="containerx">
            <div class="media">
                <figure class="image is-128x128">
                    <img class="is-rounded" src="/uploads/avatars/{{$user->avatar}}">
                </figure>
                <div class="media-content detailsuser">
                    <p class="is-6 is-marginless"> Name : <span class="has-text-black-bis">{{$user->name}}</span> </p>
                    <p class="is-6 is-marginless"> Email : <span class="has-text-black-bis">{{$user->email}}</span> </p>
                    <p class="is-6 is-marginless"> From : <span class="has-text-black-bis">{{$user->city}}</span> </p>
                    <p class="is-6 is-marginless"> Age : <span class="has-text-black-bis">{{Carbon\Carbon::parse($user->birthday)->age}} years old</span> </p>
                    <hr>
                    <div class="is-pulled-right">
                        <p class="subtitle is-7 is-marginless">
                            @if($user->email_verified_at==NULL)
                            <span class="has-text-danger has-text-weight-bold">Not Verified</span> 
                          @else
                          <span class="has-text-success has-text-weight-bold">Verified User</span> 
                          @endif
                        </p>
                        <p class="subtitle is-7 is-marginless">
                        @if($user->NIC==null || $user->description==null || $user->address==null || $user->city==null || $user->gender==null || $user->NIC==null || $user->birthday==null || $user->phoneNo==null)
                            <span class="has-text-warning has-text-weight-bold">Incompleted Profile</span> 
                        @else
                            <span class="has-text-link has-text-weight-bold">Completed Profile</span> 
                        @endif
                        </p>
                        <hr>
                        <p class="subtitle is-7 is-marginless"> Name : <span class="has-text-black-bis">{{$user->name}}</span> </p>
                        <p class="subtitle is-7 is-marginless"> Email : <span class="has-text-black-bis">{{$user->email}}</span> </p>
                        <p class="subtitle is-7 is-marginless"> From : <span class="has-text-black-bis">{{$user->city}}</span> </p>
                        <p class="subtitle is-7 is-marginless"> Age : <span class="has-text-black-bis">{{Carbon\Carbon::parse($user->birthday)->age}} years old</span> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
</div>