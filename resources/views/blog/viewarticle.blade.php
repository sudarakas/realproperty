@include('blog.blognav')
    <section class="hero is-info is-medium is-bold">
        <div class="hero-body"style='background-image: url("/img/home2.jpg");   filter: blur(8px);'>
        </div>
        <span class="container has-text-centered textbox">
            <h1 class="title is-1">{{$article->title}}}</h1>
        </span>
    </section>


    <div class="container">

        <section class="articles">
            <div class="column is-8 is-offset-2">
                <div class="card article">
                    <div class="card-content">
                        <div class="media">
                                <div class="media-center">
                                        <img src="/img/1556832219.jpg" class="author-image" alt="Placeholder image">
                                    </div>
                            <div class="media-content has-text-centered">
                                <p class="title article-title">{{$article->title}}}<p/>
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
                    <article class="media">
                            <figure class="media-left">
                              <p class="image is-64x64">
                                <img src="https://bulma.io/images/placeholders/128x128.png">
                              </p>
                            </figure>
                            <div class="media-content">
                              <div class="content">
                                <p>
                                  <strong>Barbara Middleton</strong>
                                  <br>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta eros lacus, nec ultricies elit blandit non. Suspendisse pellentesque mauris sit amet dolor blandit rutrum. Nunc in tempus turpis.
                                  <br>
                                  <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
                                </p>
                              </div>
                          
                              <article class="media">
                                <figure class="media-left">
                                  <p class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png">
                                  </p>
                                </figure>
                                <div class="media-content">
                                  <div class="content">
                                    <p>
                                      <strong>Sean Brown</strong>
                                      <br>
                                      Donec sollicitudin urna eget eros malesuada sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam blandit nisl a nulla sagittis, a lobortis leo feugiat.
                                      <br>
                                      <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                                    </p>
                                  </div>
                          
                                  <article class="media">
                                    Vivamus quis semper metus, non tincidunt dolor. Vivamus in mi eu lorem cursus ullamcorper sit amet nec massa.
                                  </article>
                          
                                  <article class="media">
                                    Morbi vitae diam et purus tincidunt porttitor vel vitae augue. Praesent malesuada metus sed pharetra euismod. Cras tellus odio, tincidunt iaculis diam non, porta aliquet tortor.
                                  </article>
                                </div>
                              </article>
                          
                              <article class="media">
                                <figure class="media-left">
                                  <p class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png">
                                  </p>
                                </figure>
                                <div class="media-content">
                                  <div class="content">
                                    <p>
                                      <strong>Kayli Eunice </strong>
                                      <br>
                                      Sed convallis scelerisque mauris, non pulvinar nunc mattis vel. Maecenas varius felis sit amet magna vestibulum euismod malesuada cursus libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus lacinia non nisl id feugiat.
                                      <br>
                                      <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                                    </p>
                                  </div>
                                </div>
                              </article>
                            </div>
                          </article>
                          <article class="media">
                            <figure class="media-left">
                              <p class="image is-64x64">
                                <img src="https://bulma.io/images/placeholders/128x128.png">
                              </p>
                            </figure>
                            <div class="media-content">
                              <div class="field">
                                <p class="control">
                                  <textarea class="textarea" placeholder="Add a comment..."></textarea>
                                </p>
                              </div>
                              <div class="field">
                                <p class="control">
                                  <button class="button is-primary">Post comment</button>
                                </p>
                              </div>
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