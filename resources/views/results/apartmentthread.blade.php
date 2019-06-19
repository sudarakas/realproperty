<div class="col-sm-4 col-sm-3 center-responsive">
    <div class="column is-gaps is-12">
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="/uploads/property/apartment/{{json_decode($apartment->property->images)[0]}}" alt="Placeholder image">
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                            <img src="/uploads/avatars/{{$apartment->property->user->avatar}}" class="is-rounded" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="subtitle is-5 has-text-dark has-text-weight-medium">{{$apartment->property->name}}</p>
                        <p class="title is-4 has-text-dark">Rs. {{number_format($apartment->property->amount,2)}}</p>
                        <p class="subtitle is-6 has-text-link"><span>@</span>{{$apartment->property->user->name}}</p>
                    </div>
                </div>

                <div class="content">
                    {{str_limit(str_replace("&nbsp;",'',strip_tags($apartment->property->description)),100)}}
                    <br>
                    <time datetime="2016-1-1">{{$apartment->created_at->isoFormat('LLLL')}}</time>
                    <a href="/apartment/{{$apartment->id}}"><button class="button is-link is-pulled-right">See More</button></a>
                </div>
            </div>
        </div>
    </div>
</div>