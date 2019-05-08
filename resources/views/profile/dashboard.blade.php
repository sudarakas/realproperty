<div class="column displaybox profileback">
        @include('profile.navprofile')
        <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
            <ul>
                <li><a href="/profile">Profile</a></li>
                <li class="is-active"><a href="/profile">Dashboard</a></li>
            </ul>
        </nav>
        @if($user->NIC==null || $user->description==null || $user->address==null || $user->city==null || $user->gender==null || $user->NIC==null || $user->birthday==null || $user->phoneNo==null)
        <div class="columns is-mobile is-centered content">
            <div class="column is-half">
                <div class="notification is-warning">
                    <button class="delete"></button> {{ __('Please complete your profile,')
                    }} <a href="/profile/editaccount">click here to complete</a></div>

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
      @endif
        <div class="columns dashboxes profileback">
            <div class="column has-text-centered selecticon" onclick="location.href='/add'">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-home fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Sell Yours</h6>
            </div>
            <div class="column has-text-centered selecticon" onclick="location.href='/profile/myfavorite'">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-heart fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Favorites</h6>
            </div>
            <div class="column has-text-centered selecticon" onclick="location.href='/profile/message'">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-comments fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Inbox</h6>
            </div>
            <div class="column has-text-centered selecticon" onclick="location.href='/profile/editaccount'">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-edit fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Edit Profile</h6>
            </div>
            <div class="column has-text-centered selecticon" onclick="location.href='/profile/sold'">
              <span class="iicon has-text-centered is-large">
                <i class="far fa-check-circle fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Mark Sold</h6>
            </div>
            <div class="column has-text-centered selecticon" onclick="location.href='/'">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-search fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Search</h6>
            </div>
        </div>
        <div class="column profileback tableshow">
          <div class="title is-5 has-text-success">Recent Offers</div>
          <div style="overflow-x: auto;">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Pro. ID</th>
                <th>Pro. Name</th>
                <th>Pro. Location</th>
                <th>Pro. Type</th>
                <th>Offer</th>
                <th>Offered User</th>
                <th>Contact</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                  <th>No</th>
                  <th>Pro. ID</th>
                  <th>Pro. Name</th>
                  <th>Pro. Location</th>
                  <th>Pro. Type</th>
                  <th>Current Offer</th>
                  <th>Offered User</th>
                  <th>Contact</th>
              </tr>
            </tfoot>
            <tbody>
              @if(count($offers))
                  @foreach ($offers as $key=>$offer)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$offer->property_id}}</td>
                    <td>{{$offer->property->name}}</td>
                    <td>{{$offer->property->city}}</td>
                    <td>{{$offer->property->type}}</td>
                    <td>{{number_format($offer->offerAmount,2)}}</td>
                    <td>{{userNameById($offer->offeredUser)}}</td>
                    <td><a href="/profile/offers/{{$offer->id}}/contact" class="button is-success nounnounderlinebtn">Contact</a></td>
                  </tr>
                @endforeach
              @else
              <tr>
                  <td class="has-text-danger">No Result</td>
                  <td class="has-text-danger">No Result</td>
                  <td class="has-text-danger">No Result</td>
                  <td class="has-text-danger">No Result</td>
                  <td class="has-text-danger">No Result</td>
                  <td class="has-text-danger">No Result</td>
                  <td class="has-text-danger">No Result</td>
                  <td><a href="" class="button is-success disabled nounnounderlinebtn" disabled>Contact</a></td>
                </tr>
              @endif
            </tbody>
          </table>
          </div>
          <a href="/profile/alloffers" class="button is-link nounnounderlinebtn is-pulled-right">View All Offers</a>
        </div>
    </div>
