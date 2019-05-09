<div class="box">
    <article class="media">
      <div class="media-left">
        <figure class="image is-64x64 ">
          @if($message->sender_id == 0)
            <img src="/uploads/avatars/user.jpg" alt="Image" class="is-rounded">
          @elseif(strcmp($message->senderName,"Administrator") == 0)
            <img src="/img/admin.png" alt="Image" class="is-rounded"> 
          @else
            <img src="/uploads/avatars/{{userAvatarById($message->sender_id)}}" alt="Image" class="is-rounded">
          @endif
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
            <a class="button is-danger is-rounded nounnounderlinebtn" href="/profile/message/{{$message->id}}/delete">
                  Delete
                </a>
                <a class="button is-success is-rounded nounnounderlinebtn" href="/profile/message/{{$message->id}}/view">                
                  Read
                </a>
            </p>
        </div>
      </div>
    </article>
  </div>