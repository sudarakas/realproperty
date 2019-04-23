@if(count($errors))

<div class="notification is-danger">
    <button class="delete"></button>
    <h1 class="is-size-4"><b>Please fix the following errors</b></h1>
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            <p>{{$error}}</p>
        </li>
        @endforeach
    </ul>
</div>

@endif