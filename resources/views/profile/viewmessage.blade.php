<div class="column displaybox">
  @include('profile.navprofile')
  <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
    <ul>
      <li><a href="/profile">Profile</a></li>
      <li class="is-active"><a href="/profile">Change Password</a></li>
    </ul>
  </nav>
  <div class="column profileback upmemargin">

    @foreach ($records as $item)
        @if ($item->type == "me")
        <div class="box has-background-link messageOwn">
            <div class="media">
              <div class="media-content">
                <div class="content">
                  <p class="has-text-white">
                    {{$item->message}}
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
          </div>
            
        @else
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
                    {{$item->message}}
                    <br>
                    <br>
                    <small class="is-pulled-right has-text-dark has-text-weight-bold">31m ago</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endif
    @endforeach
    
    {{-- Own Message --}}
    {{-- <div class="box has-background-link messageOwn">
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
    </div> --}}

    {{-- Customer Message --}}
    {{-- <div class="box has-background-white messageCus">
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


  </div>
</div>