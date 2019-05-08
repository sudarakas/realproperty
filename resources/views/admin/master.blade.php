<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{Auth::user()->name}}'s Profile</title>

  {{-- CSS Files --}}
  <link rel="stylesheet" href="/css/bulma.min.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/css/bootstrap.css"> {{-- Google Fonts --}}
  <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
    rel="stylesheet">

</head>

<body>
  <div class="columns panelboard">
    <div class="column is-one-fifth adminsidebar">
      <aside class="menu">
        <br>
        <br>
        <div class="subtitle has-text-white has-text-centered">Admin Panel</div>
        <figure class="image is-96x96 profileavatar adminprofileavatar adminavatar" id="myBtn">
          <img class="is-rounded is-centered has-text-centered adminavatarstyle" src="/uploads/avatars/{{Auth::user()->avatar}}">
          <figcaption>
            <p class="has-text-centered has-text-white"><span><i class="fas fa-cloud-upload-alt"></i></span><br>Change</p>
          </figcaption>
        </figure>
        <p class="has-text-white is-4 is-size-7 has-text-weight-bold has-text-centered is-uppercase">Welcome, {{Auth::user()->name}}</p>
        <p class="menu-label is-4 is-size-7 has-text-weight-bold has-text-dark is-uppercase">
            <i class="fas fa-pastafarianism"></i> General
          </p>
          <ul class="menu-list adminlistitem">
            <li><a href="/admin">Dashboard</a></li>
          </ul>
        <p class="menu-label is-4 is-size-7 has-text-weight-bold has-text-dark is-uppercase">
          <i class="fas fa-home"></i> Properties Management
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/profile/mybuilding">All</a></li>
          <li><a href="/admin">Houses</a></li>
          <li><a href="/profile/myland">Lands</a></li>
          <li><a href="/profile/mybuilding">Buildings</a></li>
          <li><a href="/profile/mybuilding">Apartments</a></li>
          <li><a href="/profile/mybuilding">Warehouse</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fab fa-blogger-b"></i> Blog Management
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/profile/mybuilding">New Post</a></li>
          <li><a href="/admin"> View Posts</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fas fa-users"></i> User Management
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/profile/mybuilding">New User</a></li>
          <li><a href="/profile/mybuilding">View Users</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fas fa-user-shield"></i> Administrator Management
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/profile/mybuilding">New Admin</a></li>
          <li><a href="/profile/mybuilding">View Admins</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fas fa-cogs"></i> Other
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/profile/mybuilding">Sign out</a></li>
        </ul>
      </aside>
    </div>
    @if(Request::is('admin'))
      @include('admin.dashboard')
    @elseif(Request::is('admin/user/*/view'))
      @include('admin.viewuser')
    @elseif(Request::is('admin/viewme'))
      @include('admin.viewme')
    @else
      @include('admin.dashboard') @endif
    <div id="myModal" class="modal column is-half is-offset-one-quarter">
      <div class="modal-content">
        <div class="is-pulled-right">
          <span class="close has-text-danger"><i class="far fa-times-circle"></i></span>
        </div>
        <p>Select proile picture</p>
        <form action="/admin/updateavatar" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="file has-name is-centered">
            <label class="file-label">
                              <input class="file-input" type="file" name="avatar" id="file-input">
                              <span class="file-cta">
                                <span class="file-icon">
                                  <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                  Choose a file…
                                </span>
                              </span>
                              <div class="file-name has-text-dark" id="file-name">
                                
                              </div>
                            </label>
          </div>
          <br>
          <div class="field is-centered has-text-centered">
            <button type="submit" class="button is-primary"><span class="savebutton">Save</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- JavaScript Files --}}
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/fontawesome.js"></script>
  <script src="/js/bootstrap.js"></script>
  <script>
    var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
              modal.style.display = "block";
            }
            span.onclick = function() {
              modal.style.display = "none";
            }
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }

            //Display File Name
            var input = document.getElementById( 'file-input' );
            var infoArea = document.getElementById( 'file-name' );
            input.addEventListener( 'change', showFileName );
            function showFileName( event ) {      
            var input = event.srcElement;         
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
}
  </script>

</body>

</html>