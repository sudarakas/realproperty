<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600" rel="stylesheet">

</head>
<body>
    <div class="columns">
        <div class="column is-one-fifth has-background-link sidebar">
            <aside class="menu">
                <figure class="image is-128x128 profileavatar" id="myBtn">
                    <img class="is-rounded is-centered has-text-centered" src="/uploads/avatars/user.jpg">
                </figure>
                <p class="has-text-white has-text-centered is-4 has-text-weight-semibold">Welcome, Nanox</p>
                <p class="menu-label has-text-white">
                  General
                </p>
                <ul class="menu-list">
                  <li><a>Dashboard</a></li>
                </ul>
                <p class="menu-label has-text-white">
                  Administration
                </p>
                <ul class="menu-list">
                  <li><a>Edit Account</a></li>
                  <li><a>Change Password</a></li>
                  <li><a>Delete Account</a></li>
                </ul>
                <p class="menu-label has-text-white">
                  My Properties
                </p>
                <ul class="menu-list">
                  <li><a>Houses</a></li>
                  <li><a>Lands</a></li>
                  <li><a>Buidlings</a></li>
                  <li><a>Aprtments</a></li>
                  <li><a>Warehouses</a></li>
                </ul>
              </aside>
        </div>
        <div class="column has-background-dark">
                
        </div>
        <div id="myModal" class="modal column is-half is-offset-one-quarter">
            <div class="modal-content">
                <div class="is-pulled-right">
                        <span class="close has-text-danger"><i class="far fa-times-circle"></i></span>
                </div>
                <p>Select proile picture</p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="file has-name">
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
                </form>
            </div>   
        </div>
    </div>

    {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script>
            // Get the modal
            var modal = document.getElementById('myModal');
            
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
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