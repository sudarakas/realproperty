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
                    <figure class="image is-64x64 ">
                      <img src="/uploads/avatars/{{$user->avatar}}" alt="Image" class="is-rounded">
                    </figure>
                    <div class="address">
                      <div class="has-text-link has-text-weight-semibold">{{$offer->subject}}</div>
                      <div class="is-7"><span class="subtitle is-7">To: {{$user->name}}
                            <span class="subtitle is-7 has-text-black-bis has-text-weight-bold"> (Registered User) </span> 
                        </span>
                      </div>
                      <div class="subtitle is-7">Contact Details:<span class="subtitle is-7"> {{$user->email}} | {{$user->phoneNo}}</span></div>
                      <div class="subtitle is-7 is-pulled-right">Regarding :<span class="subtitle is-7"> <a href="/{{$offer->property_url}}" target="_blank">View Property</a></span>
                      <br> 
                      <span class="subtitle is-7 has-text-black-bis has-text-weight-bold has-text-right">{{$offer->created_at->diffForHumans()}}</span></div>
                    </div>
                  </div>
                  <hr style="margin-top: 7%;">
                  <div class="content">
                    {{$offer->offer}}
                  </div>
                </div>
                <hr>
                <div class="contetnt">
                  <form action="/profile/message/reply" method="post">
                    @csrf
                    <div class="field">
                      <div class="field-body">
                        <div class="field">
                          <div class="control">
                            <input type="hidden" value="{{$offer->id}}" name="id">
                            <input type="hidden" value="{{$offer->sender_id}}" name="owner">
                            <input type="hidden" value="{{$offer->senderMail}}" name="email">
                            <input type="hidden" value="{{$offer->subject}}" name="subject">
                            <input type="hidden" value="{{$offer->property_url}}" name="path">
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
 