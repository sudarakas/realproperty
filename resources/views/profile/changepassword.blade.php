<div class="column displaybox">
  @include('profile.navprofile')
  <nav class="breadcrumb has-arrow-separator has-background-white" aria-label="breadcrumbs">
    <ul>
      <li><a href="/profile">Profile</a></li>
      <li class="is-active"><a href="/profile">Change Password</a></li>
    </ul>
  </nav>
  <div class="card cardmargin">
    <div class="containerx">
      <h1 class="title has-text-centered"> Change Your Password</h1>
      <div class="centerinputbox">
        <form action="" method="post">
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="password" placeholder="Current Password">
              <span class="icon is-small is-left">
                                                <i class="fas fa-lock"></i>
                                              </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="password" placeholder="New Password">
              <span class="icon is-small is-left">
                                                    <i class="fas fa-lock"></i>
                                                  </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="password" placeholder="New Password Again">
              <span class="icon is-small is-left">
                                                        <i class="fas fa-lock"></i>
                                                      </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-text-centered">
              <button class="button is-success">
                                                <span class="buttonspace">Save</span>
                                              </button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>