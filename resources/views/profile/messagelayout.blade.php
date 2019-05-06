<div class="box">
    <article class="media">
      <div class="media-left">
        <figure class="image is-64x64">
          <img src="/uploads/avatars/user.jpg" alt="Image">
        </figure>
      </div>
      <div class="media-content">
        <div class="content">
          <p>
            <strong>{{$message->subject}}</strong> <br><small>From @<span class="has-text-link">{{$message->senderName}}</span></small> &nbsp;<small>{{$message->created_at->diffForHumans()}}</small>
            <br>
            <br>
            {{str_limit($message->message),30}}
          </p>
        </div>
        <div class="is-pulled-right">
            <p class="control has-text-centered">
            <a class="button is-danger is-rounded nounderlinebtn" href="/profile/message/{{$message->id}}/view">
                  <span>Delete</span>
                </a>
                <a class="button is-success is-rounded nounderlinebtn" href="/profile/message/{{$message->id}}/delete">
                  <span>Read</span>
                </a>
            </p>
        </div>
      </div>
    </article>
  </div>