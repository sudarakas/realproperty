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
                    </div>
                    <div class="media-content">
                        <p class="is-6">
                            <span class="has-text-dark">Name :</span> {{$apartment->property->name}} <br>
                            <span class="has-text-dark">Location :</span> {{$apartment->property->city}} <br>
                            <span class="has-text-dark">Est :</span> Rs. {{number_format($apartment->property->amount,2)}}</p>
                    </div>
                </div>

                <div class="content">
                    <div class="buttons is-pulled-right">
                            <button class="button is-success is-pulled-right" onclick="window.open('/apartment/{{$apartment->id}}','_blank');">See More</button>
                            <button class="button is-warning is-pulled-right" onclick="window.open('/profile/apartment/{{$apartment->id}}/edit','_blank');">Edit</button>
                            <form action="/profile/apartment/{{$apartment->id}}/delete" method="post">
                                @csrf
                                <button class="button is-danger is-pulled-right" type="submit" onclick="deleteMe();">Delete</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>