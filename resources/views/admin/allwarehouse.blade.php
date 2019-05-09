<div class="column displaybox">
    @include('admin.navprofile')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/admin">Admin</a></li>
            <li class="is-active"><a href="/profile">All Warehouses</a></li>
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
            <div class="subtitle has-text-black-bis containerx">All Warehouses</div>
            <div class="column tableshow containerx" style="overflow-x: auto">
                <p class="subtitle has-text-link is-7 is-pulled-right has-text-weight-bold is-uppercase">Count : {{$properties->count()}}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Amount</th>
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
                            <th>Type</th>
                            <th>Amount</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($properties->count() > 0) @foreach ($properties as $key=>$property)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$property->name}}</td>
                            <td>{{$property->city}}</td>
                            <td>{{$property->type}}</td>
                            <td>{{number_format($property->amount,2)}}</td>
                            <td><a href="/{{checkPropertyTypeById($property->id)}}/{{getPropertyTypeIdById($property->id)}}" class="button is-success nounnounderlinebtn" target="_blank"><i class="fas fa-external-link-square-alt"></i></a></td> 
                            <td><a href="/admin/{{checkPropertyTypeById($property->id)}}/{{getPropertyTypeIdById($property->id)}}/edit" class="button is-warning nounnounderlinebtn" target="_blank"><i class="fa fa-edit"></i></a></td>
                            <td>
                                <form action="/admin/{{checkPropertyTypeById($property->id)}}/{{getPropertyTypeIdById($property->id)}}/delete" method="post">
                                    @csrf
                                    <button class="button is-danger nounnounderlinebtn" type="submit" onclick="deleteMe();"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach @endif
                    </tbody>
                </table>
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</div>
<br>
<br>
</div>
<script>
    function deleteMe() {
    event.preventDefault();
    var form = event.target.form;
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "hsl(141, 71%, 48%)",
        cancelButtonColor: "hsl(348, 100%, 61%)",
        confirmButtonText: 'Yes, delete it!',
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
                'Property is safe :)',
                'info'
            )
        }
    });
}
</script>