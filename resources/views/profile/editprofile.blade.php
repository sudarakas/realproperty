<div class="column displaybox">
  @include('profile.navprofile')
  <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
    <ul>
      <li><a href="/profile">Profile</a></li>
      <li class="is-active"><a href="/profile">Edit Account</a></li>
    </ul>
  </nav>
  <div class="columns is-mobile is-centered">
      <div class="column is-half">
          @include('layouts.errors') 
          @if(session()->has('message'))
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
      <h1 class="title has-text-centered">Edit Your Account</h1>
      <div class="centerinputbox">
        <form action="/profile/updateAccount" method="post">
          @csrf
          <div class="field">
            <label class="label">Name</label>
            <p class="control has-icons-left">
              <input class="input" type="text" value="{{$user->name}}" placeholder="Your Name" name="name">
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
              <label class="label">Email</label>
            <p class="control has-icons-left">
              <input class="input" type="email" value="{{$user->email}}" placeholder="Your Email" name="email">
              <span class="icon is-small is-left">
                <i class="fas fa-at"></i>
              </span>
            </p>
          </div>
          <div class="field">
              <label class="label">Description (Max 100 Words)</label>
            <p class="control has-icons-left">
              <input class="input" type="text" value="{{$user->description}}" placeholder="Your Description (Max 100 Words)" name="descrption">
              <span class="icon is-small is-left">
                    <i class="fas fa-address-card"></i>
                </span>
            </p>
      </div>
      <div class="field">
          <label class="label">NIC</label>
        <p class="control has-icons-left">
          <input class="input" type="text" value="{{$user->NIC}}" placeholder="NIC" name="nic">
          <span class="icon is-small is-left">
            <i class="fas fa-id-badge"></i>
          </span>
        </p>
      </div>
      <div class="field">
          <label class="label">Address</label>
        <p class="control has-icons-left">
          <input class="input" type="text" value="{{$user->address}}" placeholder="Address" name="address">
          <span class="icon is-small is-left">
            <i class="fas fa-location-arrow"></i>
          </span>
        </p>
      </div>
      <div class="field">
          <label class="label">City</label>
        <p class="control has-icons-left">
          <input class="input" type="text" value="{{$user->city}}" placeholder="City" name="city">
          <span class="icon is-small is-left">
            <i class="fas fa-thumbtack"></i>
          </span>
        </p>
      </div>
      <div class="field">
          <label class="label">Birthday</label>
        <p class="control has-icons-left">
          <input class="input" type="date" value="{{$user->address}}"  name="birthday">
          <span class="icon is-small is-left">
            <i class="fas fa-calendar-alt"></i>
          </span>
        </p>
      </div>
      <div class="field">
          <label class="label">Gender</label>
        <div class="control has-icons-left">
          <div class="select">
          <select name="gender">
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
          <span class="icon is-small is-left">
            <i class="fas fa-venus-mars"></i>
          </span>
      </div>
    </div>
    </div>
    <div class="field">
          <label class="label">Phone No</label>
        <p class="control has-icons-left">
          <input class="input" type="text" value="{{$user->phoneNo}}" placeholder="Phone No" name="phoneno">
          <span class="icon is-small is-left">
            <i class="fas fa-phone-volume"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <p class="control has-text-centered">
          <button type="submit" class="button is-success">
                <span class="buttonspace">Save</span>
          </button>
        </p>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
