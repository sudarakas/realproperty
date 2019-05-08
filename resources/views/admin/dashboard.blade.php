<div class="column displaybox profileback">
    @include('admin.navprofile')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/admin">Admin</a></li>
            <li class="is-active"><a href="/admin">Dashboard</a></li>
        </ul>
    </nav>
    <div class="subtitle has-text-black-bis">Graph View</div>
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <p class="title">
                        “There are two hard things in computer science: cache invalidation, naming things, and off-by-one errors.”
                    </p>
                    <p class="subtitle">
                        Jeff Atwood
                    </p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <p class="title">
                        “There are two hard things in computer science: cache invalidation, naming things, and off-by-one errors.”
                    </p>
                    <p class="subtitle">
                        Jeff Atwood
                    </p>
                </div>
            </div>
        </div>
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
                @foreach ($properties as $key=>$property)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$property->id}}</td>
                    <td>{{$property->name}}</td>
                    <td>{{$property->city}}</td>
                    <td>{{$property->type}}</td>
                    <td>{{number_format($property->amount,2)}}</td>
                    <td>{{$property->user->name}}</td>
                    <td><a href="/{{checkPropertyTypeById($property->id)}}/{{getPropertyTypeIdById($property->id)}}" class="button is-success nounnounderlinebtn" target="_blank">View</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <hr>
          <div class="subtitle has-text-black-bis">Latest User Registations</div>
          <div class="column tableshow style="overflow-x: auto"">   
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User Id</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Pro. Type</th>
                  <th>Status</th>
                  <th>View User</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>User Id</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Pro. Type</th>
                  <th>Status</th>
                  <th>View User</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($users as $key=>$user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->NIC==null || $user->description==null || $user->address==null || $user->city==null || $user->gender==null || $user->NIC==null || $user->birthday==null || $user->phoneNo==null)
                          Not Completed
                        @else
                          Completed
                        @endif
                    </td>
                    <td>
                      @if($user->email_verified_at==NULL)
                        Not Verified
                      @else
                        Verified
                      @endif
                    </td>
                    <td><a href="" class="button is-info nounnounderlinebtn">View User</a></td>
                  </tr>
                @endforeach
            </tbody>
            </table>
          </div>
</div>