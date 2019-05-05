@if(count($errors))
<div class="columns is-mobile is-centered">
    <div class="column">
<div class="notification is-danger">
    <button class="delete"></button>
    <h1 class="is-size-7"><b>Please fix the following errors</b></h1>
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            <span class="is-size-7">{{$error}}</span>
        </li>
        @endforeach
    </ul>
</div>
</div>
</div>
@endif