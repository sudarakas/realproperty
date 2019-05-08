<div class="column displaybox">
  @include('profile.navprofile')
  <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
    <ul>
      <li><a href="/profile">Profile</a></li>
      <li class="is-active"><a href="/profile">View Message</a></li>
    </ul>
  </nav>
  <div class="column profileback upmemargin">
    <div class="columns is-mobile is-centered">
      <div class="column is-half">
  @include('layouts.errors') @if(session()->has('errormsg'))
        <div class="notification is-danger">
          <button class="delete"></button>
          <h1 class="is-size-7"><b> {{ session()->get('errormsg') }}</b></h1>
        </div>
        @endif @if(session()->has('warningmsg'))
        <div class="notification is-warning">
          <button class="delete"></button>
          <h1 class="is-size-7"><b> {{ session()->get('warningmsg') }}</b></h1>
        </div>
        @endif @if(session()->has('success'))
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
        <div class="containerx">
          <div class="top">
            <div>
              <figure class="image is-64x64">
                <img class="is-rounded" src="/uploads/avatars/user.jpg">
              </figure>
              <div class="address">
                <div class="has-text-link has-text-weight-semibold">{{$message->subject}}</div>
                <div class="is-7"><span class="subtitle is-7">From: {{$message->senderName}}</span></div>
                <div class="subtitle is-7">Contact Details:<span class="subtitle is-7"> {{$message->senderMail}} | {{$message->phoneNo}}</span></div>
                <div class="is-7 is-pulled-right"><span class="subtitle is-7 has-text-black-bis has-text-weight-bold">{{$message->created_at->diffForHumans()}}</span></div>
              </div>
            </div>
            <hr>
            <div class="content">
              {{$message->message}}
            </div>
          </div>
          <hr>
          <div class="contetnt">
            <form action="" method="post">
              @csrf
              <div class="field">
                <div class="field-body">
                  <div class="field">
                    <div class="control">
                      <input type="hidden" value="{{$message->senderMail}}" name="email">
                      <input type="hidden" value="{{$message->subject}}" name="subject">
                      <textarea class="textarea {{ $errors->has('message') ? ' is-danger' : '' }}" placeholder="Enter your reply for this message"
                        name="message"></textarea> {!! $errors->first('message', '
                      <p class="help-block has-text-danger">:message</p>') !!}
                    </div>
                  </div>
                </div>
                <br>
                <div class="field-body">
                  <div class="field">
                    <div class="control is-pulled-right">
                      <button class="button is-primary">
                          Send Reply
                      </button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
</div>

{{-- Layout Lines --}} {{-- Owner Message --}} {{--
<div class="box has-background-link messageOwn">
  <div class="media">
    <div class="media-content">
      <div class="content">
        <p class="has-text-white">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum
          luctus turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla
          egestas. Nullam condimentum luctus turpis.
          <br>
          <br>
          <small class="is-pulled-left has-text-white has-text-weight-bold">31m ago</small>
        </p>
      </div>
    </div>
    <div class="media-right">
      <figure class="image is-64x64">
        <img class="is-rounded" src="/uploads/avatars/{{$user->avatar}}" alt="Image">
      </figure>
    </div>
  </div>
</div> --}} {{-- Customer Message --}} {{--
<div class="box has-background-white messageCus">
  <div class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img class="is-rounded" src="/uploads/avatars/{{$user->avatar}}" alt="Image">
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p class="has-text-dark">

          <br>
          <br>
          <small class="is-pulled-right has-text-dark has-text-weight-bold">31m ago</small>
        </p>
      </div>
    </div>
  </div>
</div> --}}