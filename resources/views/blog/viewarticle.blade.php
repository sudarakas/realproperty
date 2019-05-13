@include('blog.blognav')
<section class="hero is-info is-medium is-bold">
  <div class="hero-body" style='background-image: url("/img/home2.jpg");   filter: blur(8px);'>
  </div>
  <span class="container has-text-centered textbox">
            <h1 class="title is-1">{{$article->title}}</h1>
        </span>
</section>


<div class="container">

  <section class="articles">
    <div class="column is-8 is-offset-2">
      <div class="card article">
        <div class="card-content">
          <div class="media">
            <div class="media-center">
              <img src="/uploads/avatars/{{$article->admin->avatar}}" class="author-image" alt="Placeholder image">
            </div>
            <div class="media-content has-text-centered">
              <p class="title article-title">{{$article->title}}
                <p/>
                <div class="tags has-addons level-item">
                  <span class="tag is-rounded is-info">@<span>{{$article->admin->name}}</span></span>
                  <span class="tag is-rounded">{{$article->created_at->isoFormat('LLL')}}</span>
                </div>
            </div>
          </div>
          <div class="content article-body">
            {!! $article->content !!}
          </div>
        </div>
      </div>
    </div>
    <div class="column is-8 is-offset-2">
      @foreach ($article->comments as $comment)
      <article class="media">      
        <figure class="media-left">
          <p class="image is-64x64">
            <img class="is-rounded" src="/uploads/avatars/{{$comment->user->avatar}}">
          </p>
        </figure>
        <div class="media-content">
          <div class="content">
            <p>
              <strong>{{$comment->user->name}}</strong>
              <br> {{$comment->comment}}
              <br>
              <small class="media-right is-pulled-right has-text-link">{{$comment->created_at->diffForHumans()}}</small>
            </p>
            
          </div>
      </article>
      @endforeach
      <article class="media">
        <figure class="media-left">
          <p class="image is-64x64">
              @auth
                <img class="is-rounded"  src="/uploads/avatars/{{auth()->user()->avatar}}">    
              @endauth     
              @guest
                <img class="is-rounded"  src="/uploads/avatars/user.jpg">    
              @endguest
            </p>
        </figure>
        <div class="media-content">

          <form action="/blog/comment" method="post">
            @csrf
            <div class="field">
              <p class="control">
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <textarea class="textarea" placeholder="Add a comment..." name="comment" required></textarea>
              </p>
            </div>
            <div class="field">
              <p class="control">
                <button class="button is-primary">Post comment</button>
              </p>
            </div>
          </form>
        </div>
      </article>
      </div>
  </section>
  </div>


  {{-- JavaScript Files --}}
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/fontawesome.js"></script>
  <script src="/js/bootstrap.js"></script>
  </body>

  </html>