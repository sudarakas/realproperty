<div class="column displaybox profileback">
    @include('profile.navprofile')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/profile">Profile</a></li>
            <li class="is-active"><a href="/profile">Mark Sold</a></li>
        </ul>
    </nav>
    <div class="column profileback tableshow">
        <div class="title is-5 has-text-success">Mark Sold</div>
        <div style="overflow-x: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pro. ID</th>
                        <th>Pro. Name</th>
                        <th>Pro. Location</th>
                        <th>Pro. Type</th>
                        <th>Amount</th>
                        <th>Mark Sold</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Pro. ID</th>
                        <th>Pro. Name</th>
                        <th>Pro. Location</th>
                        <th>Pro. Type</th>
                        <th>Amount</th>
                        <th>Mark Sold</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(count($properties)) @foreach ($properties as $key=>$property)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$property->id}}</td>
                        <td>{{$property->name}}</td>
                        <td>{{$property->city}}</td>
                        <td>{{$property->type}}</td>
                        <td>{{number_format($property->amount,2)}}</td>
                        @if(strcmp($property->availability,"YES") == 0)
                            <td><a href="/profile/sold/{{$property->id}}/marksold" class="button is-danger nounnounderlinebtn">Mark Sold</a></td>
                        @else
                            <td><a href="/profile/sold/{{$property->id}}/markunsold" class="button is-success nounnounderlinebtn">Mark Unsold</a></td>
                        @endif
                    </tr>
                    @endforeach @else
                    <tr>
                        <td class="has-text-danger">No Result</td>
                        <td class="has-text-danger">No Result</td>
                        <td class="has-text-danger">No Result</td>
                        <td class="has-text-danger">No Result</td>
                        <td class="has-text-danger">No Result</td>
                        <td class="has-text-danger">No Result</td>
                        <td class="has-text-danger">No Result</td>
                        <td><a href="" class="button is-success disabled nounnounderlinebtn" disabled>Contact</a></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{ $properties->links() }}
    </div>
</div>