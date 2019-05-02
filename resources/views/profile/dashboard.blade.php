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
            <div class="column has-text-centered selecticon">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-home fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Sell Yours</h6>
            </div>
            <div class="column has-text-centered selecticon">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-heart fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Favorites</h6>
            </div>
            <div class="column has-text-centered selecticon">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-comments fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Inbox</h6>
            </div>
            <div class="column has-text-centered selecticon">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-edit fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Edit Profile</h6>
            </div>
            <div class="column has-text-centered selecticon">
              <span class="iicon has-text-centered is-large">
                <i class="far fa-check-circle fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Mark Sold</h6>
            </div>
            <div class="column has-text-centered selecticon">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-search fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Search</h6>
            </div>
        </div>
        <div class="column profileback tableshow">   
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Property ID</th>
                <th>Property Name</th>
                <th>Property Location</th>
                <th>Property type</th>
                <th>Current Offer</th>
                <th>Offered User</th>
                <th>Contact</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Property ID</th>
                <th>Property Name</th>
                <th>Property Location</th>
                <th>Property type</th>
                <th>Current Offer</th>
                <th>Offered User</th>
                <th>Contact</th>
              </tr>
            </tfoot>
            <tbody>
                <tr>
                  <td>1</td>
                  <td>455</td>
                  <td>Complete House</td>
                  <td>Badulla</td>
                  <td>House</td>
                  <td>8600000</td>
                  <td>Nimal</td>
                  <td><a href="" class="button is-success nounderlinebtn">Contact</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>455</td>
                    <td>Complete House</td>
                    <td>Badulla</td>
                    <td>House</td>
                    <td>8600000</td>
                    <td>Nimal</td>
                    <td><a href="" class="button is-success nounderlinebtn">Contact</a></td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>455</td>
                      <td>Complete House</td>
                      <td>Badulla</td>
                      <td>House</td>
                      <td>8600000</td>
                      <td>Nimal</td>
                      <td><a href="" class="button is-success nounderlinebtn">Contact</a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>455</td>
                        <td>Complete House</td>
                        <td>Badulla</td>
                        <td>House</td>
                        <td>8600000</td>
                        <td>Nimal</td>
                        <td><a href="" class="button is-success nounderlinebtn">Contact</a></td>
                      </tr>
            </tbody>
          </table>
        </div>
    </div>