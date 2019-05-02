<div class="column displaybox">
  @include('profile.navprofile')
  <nav class="breadcrumb has-arrow-separator has-background-white" aria-label="breadcrumbs">
    <ul>
      <li><a href="/profile">Profile</a></li>
      <li class="is-active"><a href="/profile">Change Password</a></li>
    </ul>
  </nav>
  <div class="columns is-mobile is-centered">
      <div class="column is-half">
          @include('layouts.errors') 
          @if(session()->has('errormsg'))
          <div class="notification is-danger">
              <button class="delete"></button>
              <h1 class="is-size-7"><b> {{ session()->get('errormsg') }}</b></h1>
          </div>
          @endif
          @if(session()->has('warningmsg'))
          <div class="notification is-warning">
              <button class="delete"></button>
              <h1 class="is-size-7"><b> {{ session()->get('warningmsg') }}</b></h1>
          </div>
          @endif
          @if(session()->has('success'))
          <div class="notification is-success">
              <button class="delete"></button>
              <h1 class="is-size-7"><b> {{ session()->get('success') }}</b></h1>
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
      <h1 class="title has-text-centered"> Change Your Password</h1>
      <div class="centerinputbox">
        <form action="/profile/updatepassword" method="post">
          @csrf
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="password" placeholder="Current Password" name="current_password">
              <span class="icon is-small is-left">
                                                <i class="fas fa-lock"></i>
                                              </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="password" placeholder="New Password" name="password">
              <span class="icon is-small is-left">
                                                    <i class="fas fa-lock"></i>
                                                  </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="password" placeholder="New Password Again" name="password_confirmation">
              <span class="icon is-small is-left">
                                                        <i class="fas fa-lock"></i>
                                                      </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-text-centered">
              <button class="button is-success" type="submit">
                                                <span class="buttonspace">Save</span>
                                              </button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>