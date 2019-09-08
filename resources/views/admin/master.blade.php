<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Administrator Panel - RealProperty</title>

  {{-- CSS Files --}}
  <link rel="stylesheet" href="/css/bulma.min.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/css/bootstrap.css"> {{-- Google Fonts --}}
  <link
    href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
    rel="stylesheet">

</head>

<body>
  <div class="columns panelboard">
    <div class="column is-one-fifth adminsidebar">
      <aside class="menu">
        <br>
        <br>
        <div class="subtitle has-text-white has-text-centered">
          @if (Auth::user()->issuper)
          Super Admin Panel
          @else
          Admin Panel
          @endif
        </div>
        <figure class="image is-96x96 profileavatar adminprofileavatar adminavatar" id="myBtn">
          <img class="is-rounded is-centered has-text-centered adminavatarstyle"
            src="/uploads/avatars/{{Auth::user()->avatar}}">
          <figcaption>
            <p class="has-text-centered has-text-white"><span><i class="fas fa-cloud-upload-alt"></i></span><br>Change
            </p>
          </figcaption>
        </figure>
        <p class="has-text-white is-4 is-size-7 has-text-weight-bold has-text-centered is-uppercase">Welcome,
          {{Auth::user()->name}}</p>
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
          <li><a href="/admin/property/all">All</a></li>
          <li><a href="/admin/property/house">Houses</a></li>
          <li><a href="/admin/property/land">Lands</a></li>
          <li><a href="/admin/property/building">Buildings</a></li>
          <li><a href="/admin/property/apartment">Apartments</a></li>
          <li><a href="/admin/property/warehouse">Warehouse</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fas fa-lock"></i> Report Management
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/admin/report"> View Reports</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fab fa-blogger-b"></i> Blog Management
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/blog/new">New Article</a></li>
          <li><a href="/admin/articles"> View Articles</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fab fa-blogger-b"></i> Inquery Management
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/admin/inquery/view">View Inquiries</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fas fa-users"></i> User Management
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/admin/user/add">New User</a></li>
          <li><a href="/admin/user/all">View Users</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fas fa-user-shield"></i> Administrator Management
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="/admin/admin/add">New Admin</a></li>
          <li><a href="/admin/admin/all">View Admins</a></li>
        </ul>
        <p class="menu-label has-text-dark is-4 is-size-7 has-text-weight-bold is-uppercase">
          <i class="fas fa-cogs"></i> Other
        </p>
        <ul class="menu-list adminlistitem">
          <li><a href="{{ route('admin.logout') }}">Sign out</a></li>
        </ul>
      </aside>
    </div>
    @if(Request::is('admin'))
    @include('admin.dashboard')
    @elseif(Request::is('admin/user/*/view'))
    @include('admin.viewuser')
    @elseif(Request::is('admin/user/*/contact'))
    @include('admin.contactuser')
    @elseif(Request::is('admin/user/*/edit'))
    @include('admin.edituser')
    @elseif(Request::is('admin/user/add'))
    @include('admin.adduser')
    @elseif(Request::is('admin/house/*/edit'))
    @include('profile.edithouse')
    @elseif(Request::is('admin/land/*/edit'))
    @include('profile.editland')
    @elseif(Request::is('admin/building/*/edit'))
    @include('profile.editbuilding')
    @elseif(Request::is('admin/apartment/*/edit'))
    @include('profile.editapartment')
    @elseif(Request::is('admin/warehouse/*/edit'))
    @include('profile.editwarehouse')
    @elseif(Request::is('admin/property/all'))
    @include('admin.allproperty')
    @elseif(Request::is('admin/property/house'))
    @include('admin.allhouse')
    @elseif(Request::is('admin/property/land'))
    @include('admin.allland')
    @elseif(Request::is('admin/property/building'))
    @include('admin.allbuilding')
    @elseif(Request::is('admin/property/apartment'))
    @include('admin.allapartment')
    @elseif(Request::is('admin/property/warehouse'))
    @include('admin.allwarehouse')
    @elseif(Request::is('admin/user/all'))
    @include('admin.allusers')
    @elseif(Request::is('admin/admin/all'))
    @include('admin.alladmins')
    @elseif(Request::is('admin/admin/add'))
    @include('admin.addadmin')
    @elseif(Request::is('admin/admin/*/edit'))
    @include('admin.editadmin')
    @elseif(Request::is('admin/report'))
    @include('admin.reports')
    @elseif(Request::is('admin/articles'))
    @include('admin.allarticles')
    @elseif(Request::is('admin/inquery/view'))
    @include('admin.allinquery')
    @elseif(Request::is('admin/inquery/*/reply'))
    @include('admin.replyinquery')
    @else
    @include('admin.dashboard') @endif
    <div id="myModal" class="modal column is-half is-offset-one-quarter">
      <div class="modal-content">
        <div class="is-pulled-right">
          <span class="close has-text-danger"><i class="far fa-times-circle"></i></span>
        </div>
        <p>Select profile picture</p>
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
  <script src="/js/sweetalert2.all.min.js"></script>
  <script src="/js/sweetalert.min.js"></script>
  @include('sweet::alert')
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