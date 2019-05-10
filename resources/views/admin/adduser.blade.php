<div class="column displaybox">
    @include('admin.navprofile')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/admin">Admin</a></li>
            <li class="is-active"><a href="/profile">Add User</a></li>
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
        <div class="containerx" style="padding: 0 10% 0 10%;">
            <h1 class="title has-text-centered">Add User</h1>
            <form action="/admin/user/add" method="post" enctype="multipart/form-data">
              @csrf
              <div class="field">
                <label class="label">Name</label>
                <p class="control has-icons-left">
                  <input class="input" type="text" placeholder="Account Name" name="name">
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                  <label class="label">Email</label>
                <p class="control has-icons-left">
                  <input class="input" type="email" placeholder="Account Email" name="email">
                  <span class="icon is-small is-left">
                    <i class="fas fa-at"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                  <label class="label">Password</label>
                <p class="control has-icons-left">
                  <input class="input" type="password" placeholder="Account Password" name="password">
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </p>
              </div>
          <div class="field">
            <p class="control has-text-centered">
              <button type="submit" class="button is-success">
                    <span class="buttonspace">Add User</span>
              </button>
            </p>
          </div>
          </form>
        </div>
    </div>
</div>
<br>
<br>
</div>