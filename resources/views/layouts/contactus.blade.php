<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RealProperty</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600" rel="stylesheet">
</head>
<body>

    <div class="column is-full is-mobile backgroundimg">
        <div class="container">
            <div class="column is-mobile is-centered">
                @include('layouts.navcontactus');
            </div>
        </div>
        <div class="container">
            <div class="has-text-centered centertext">
                <span class="icon has-text-white is-large">
                    <i class="far fa-comments fa-5x"></i>
                </span>
                <h1 class="has-text-white centertextword">Contact Us</h1>
            </div>
        </div>
    </div>
    {{-- <div class="columns">
        <div class="column is-centered">
              <br>
              <br>
                <div class="title has-text-primary has-text-centered">
                  Drop Us A Message!
                </div>
                <form action="" method="post">
                    <div class="field">
                      <label class="label">Name</label>
                      <div class="control">
                        <input class="input" type="text" placeholder="Enter your name">
                      </div>
                    </div>
                    <div class="field">
                      <label class="label">Email Address</label>
                      <div class="control">
                        <input class="input" type="email" placeholder="Enter your email">
                      </div>
                    </div>
                    <div class="field">
                      <label class="label">Message</label>
                      <div class="control">
                        <textarea class="textarea" placeholder="Enter your message"></textarea>
                      </div>
                    </div>
                    <div class="control">
                        
                      <button class="button is-link is-centered">
                        <span class="icon">
                          <i class="far fa-comment-alt"></i>
                        </span> &nbsp; Send
                      </button>
                    </div>
                </form>
          </div>
          <div class="column contactusimg">

          </div>
    </div> --}}

    {{-- Photo Frame Section --}}
    <div class="columns">
        <div class="column coloredback">
                <br>
                <br>
                  <div class="title has-text-white has-text-centered">
                    Drop Us A Message!
                  </div>
            <div class="insidemoved">
                <form action="/sendmessage" method="post">
                  @csrf
                    <div class="field">
                      <label class="label has-text-white">Name</label>
                      <div class="control">
                        <input class="input is-info{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" name="name" placeholder="Enter your name">
                        @if ($errors->has('name'))
                          <span class="invalid-feedback " role="alert">
                            <strong class="has-text-danger">{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="field">
                      <label class="label has-text-white">Email Address</label>
                      <div class="control">
                        <input class="input is-info{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" placeholder="Enter your email">
                        @if ($errors->has('email'))
                        <span class="" role="alert">
                            <strong class="has-text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="field">
                      <label class="label has-text-white">Inquery Type</label>
                      <div class="control">
                        <div class="select is-info is-fullwidth{{ $errors->has('type') ? ' is-danger' : '' }}">
                          <select name="type">
                            <option>General Inquery</option>
                            <option>Technical Inquery</option>
                            <option>Service Inquery</option>
                          </select>
                          @if ($errors->has('type'))
                        <span class="" role="alert">
                            <strong class="has-text-danger">{{ $errors->first('type') }}</strong>
                        </span>
                        @endif
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label class="label has-text-white">Message</label>
                      <div class="control">
                        <textarea class="textarea is-info{{ $errors->has('message') ? ' is-danger' : '' }}" rows="12" name="message" placeholder="Enter your message"></textarea>
                        @if ($errors->has('message'))
                          <span class="" role="alert">
                            <strong class="has-text-danger">{{ $errors->first('message') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="control">
                      <button class="button is-link is-pulled-right msgbutton">
                        <span class="icon">
                          <i class="far fa-comment-alt"></i>
                        </span> &nbsp; Send
                      </button>
                    </div>
                </form>
            </div>
          </div>
        <div class="column image is-2by1 contactusimg">
          
        </div>
      </div>

    

    {{-- Footer --}}
    @include('layouts.footer')


      {{-- JavaScript Files --}}
      <script src="/js/jquery-3.3.1.min.js"></script>
      <script src="/js/fontawesome.js"></script>
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
</body>
</html>