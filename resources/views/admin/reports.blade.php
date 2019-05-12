<div class="column displaybox">
    @include('admin.navprofile')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/admin">Admin</a></li>
            <li class="is-active"><a href="/profile">All Reports</a></li>
        </ul>
    </nav>
    <div class="columns is-mobile is-centered">
        <div class="column is-half">
    @include('layouts.errors') @if(session()->has('message'))
            <div class="notification is-success">
                <button class="delete"></button>
                <h1 class="is-size-7"><b> {{ session()->get('message') }}</b></h1>
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
            <div class="subtitle has-text-black-bis containerx">All Reports</div>
            <div class="column tableshow containerx" style="overflow-x: auto">
                <p class="subtitle has-text-link is-7 is-pulled-right has-text-weight-bold is-uppercase">Count : {{$reports->count()}}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Reporter</th>
                            <th>Message</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Reporter</th>
                            <th>Message</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($reports->count() > 0) @foreach ($reports as $key=>$report)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$report->property->name}}</td>
                            <td>{{$report->property->type}}</td>
                            <td>{{$report->reporterEmail}}</td>
                            <td>{{$report->Reason}}</td>
                            <td><a href="/{{checkPropertyTypeById($report->property->id)}}/{{getPropertyTypeIdById($report->property->id)}}" class="button is-success nounnounderlinebtn" target="_blank"><i class="fas fa-external-link-square-alt"></i></a></td> 
                            <td><a href="/admin/{{checkPropertyTypeById($report->property->id)}}/{{getPropertyTypeIdById($report->property->id)}}/edit" class="button is-warning nounnounderlinebtn" target="_blank"><i class="fa fa-edit"></i></a></td>
                            
                            <td>
                                <form 
                                    @if(strcmp($report->property->availability,"LOCKED") == 0)
                                        action="/admin/report/{{$report->property->id}}/unlock
                                    @else
                                        action="/admin/report/{{$report->property->id}}/lock
                                    @endif
                                    " method="post">
                                        @csrf
                                        <button class="button 
                                    @if(strcmp($report->property->availability,"LOCKED") == 0)    
                                        is-dark
                                    @else
                                        is-danger
                                    @endif
                                        nounnounderlinebtn" type="submit" 
                                    @if(strcmp($report->property->availability,"LOCKED") == 0)
                                        onclick="unlock();"><i class="fas fa-unlock"></i></button>
                                    @else
                                        onclick="lock();"><i class="fas fa-lock"></i></button>
                                    @endif
                                    </form>
                                </td>
                            {{-- @else
                            <td>
                                <form action="/admin/report/{{$report->property->id}}/lock" method="post">
                                        @csrf
                                        <button class="button is-danger nounnounderlinebtn" type="submit" onclick="lock();"><i class="fas fa-lock"></i></button>
                                    </form>
                                </td>
                            @endif --}}
                        </tr>
                        @endforeach @endif
                    </tbody>
                </table>
                {{ $reports->links() }}
            </div>
        </div>
    </div>
</div>
<br>
<br>
</div>
<script>
    function unlock() {
    event.preventDefault();
    var form = event.target.form;
    Swal.fire({
        title: 'Are you sure?',
        text: "Property will be unlocked!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "hsl(141, 71%, 48%)",
        cancelButtonColor: "hsl(348, 100%, 61%)",
        confirmButtonText: 'Yes, unlock it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            
            form.submit();

        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire(
                'Cancelled',
                'Property not unlocked :)',
                'info'
            )
        }
    });
}
</script>
<script>
    function lock() {
    event.preventDefault();
    var form = event.target.form;
    Swal.fire({
        title: 'Are you sure?',
        text: "Property will not be locked!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "hsl(141, 71%, 48%)",
        cancelButtonColor: "hsl(348, 100%, 61%)",
        confirmButtonText: 'Yes, lock it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            
            form.submit();

        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire(
                'Cancelled',
                'Property not locked :)',
                'info'
            )
        }
    });
}
</script>