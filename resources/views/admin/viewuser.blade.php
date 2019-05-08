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
                            <span class="has-text-danger has-text-weight-bold">Incompleted Profile</span> 
                        @else
                            <span class="has-text-link has-text-weight-bold">Completed Profile</span> 
                        @endif
                        </p>
                        <hr>
                        <p class="subtitle is-7 is-marginless"> NIC : <span class="has-text-black-bis">{{$user->NIC}}</span> </p>
                        <p class="subtitle is-7 is-marginless"> Gender : <span class="has-text-black-bis">{{$user->gender}}</span> </p>
                        <p class="subtitle is-7 is-marginless"> Phone No : <span class="has-text-black-bis">{{$user->phoneNo}}</span> </p>
                        <p class="subtitle is-7 is-marginless"> Address : <span class="has-text-black-bis">{{$user->address}}</span> </p>
                        <p class="subtitle is-7 is-marginless"> Description : <span class="has-text-black-bis">{{$user->description}}</span> </p>
                    </div>
                </div>
                <hr>
            </div>
            <hr>
            <div class="subtitle has-text-black-bis">Latest Properties</div>
    <div class="column tableshow" style="overflow-x: auto">   
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pro. ID</th>
                  <th>Pro. Name</th>
                  <th>Pro. Location</th>
                  <th>Pro. type</th>
                  <th>Pro. Amount</th>
                  <th>Added By</th>
                  <th>View</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Pro. ID</th>
                  <th>Pro. Name</th>
                  <th>Pro. Location</th>
                  <th>Pro. type</th>
                  <th>Pro. Amount</th>
                  <th>Added By</th>
                  <th>View</th>
                </tr>
              </tfoot>
              <tbody>
                @if($properties->count() > 0)
                @foreach ($properties as $key=>$property)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$property->name}}</td>
                    <td>{{$property->city}}</td>
                    <td>{{$property->type}}</td>
                    <td>{{number_format($property->amount,2)}}</td>
                    <td>{{$property->user->name}}</td>
                    <td><a href="/{{checkPropertyTypeById($property->id)}}/{{getPropertyTypeIdById($property->id)}}" class="button is-success nounnounderlinebtn" target="_blank">View</a></td>
                  </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
<br>
<br>
</div>