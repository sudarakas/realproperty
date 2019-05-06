<link rel="stylesheet" href="/css/bootstrap.css">
<div class="column displaybox">
    @include('profile.navprofile')
    <nav class="breadcrumb has-arrow-separator has-background-white" aria-label="breadcrumbs">
        <ul>
            <li><a href="/profile">Profile</a></li>
            <li class="is-active"><a href="/profile">My Warehouse</a></li>
        </ul>
    </nav>
    <div class="containerx">
        <div class="grayme">
            <div class="row">
                    @if($warehouses->count() > 0) 
                    @foreach ($warehouses as $warehouse)
                        @include('profile.threadwarehouse') 
                    @endforeach 
                    @else
                        @include('profile.noresult')
                    @endif
                    
            </div>
            {{ $warehouses->links() }}
        </div>
    </div>
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
                    'Your property is safe :)',
                    'info'
                )
            }
        });
    }
    </script>