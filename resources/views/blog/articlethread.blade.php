<div class="card article">
        <div class="card-content">
            <div class="media">
                    <div class="media-center">
                    <img src="/uploads/avatars/{{$article->admin->avatar}}" class="author-image" alt="Placeholder image">
                        </div>
                <div class="media-content has-text-centered">
                    <p class="title article-title">{{$article->title}}</p>
                    <div class="tags has-addons level-item">
                        <span class="tag is-rounded is-info">@<span>{{$article->admin->name}}</span></span>
                        <span class="tag is-rounded">{{$article->created_at->isoFormat('LLL')}}</span>
                    </div>
                </div>
            </div>
            <div class="content article-body">
                {{str_limit(str_replace("&nbsp;",'',strip_tags($article->content)),1000)}}
            </div>
            <a href="/blog/{{$article->id}}/view" class="button is-primary is-pulled-right">Read More</a>
        </div>
    </div>