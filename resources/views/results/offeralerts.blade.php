<div class="columns is-mobile is-centered">
    <div class="column">
        {{-- @include('layouts.errors') --}}
        @if(session()->has('success'))
        <div class="notification is-success">
            <button class="deletex delete"></button>
            <h1 class="is-size-7"><b> {{ session()->get('success') }}</b></h1>
        </div>
        @endif
        @if(session()->has('warning'))
        <div class="notification is-warning">
            <button class="deletex delete"></button>
            <h1 class="is-size-7"><b> {{ session()->get('warning') }}</b></h1>
        </div>
        @endif
    </div>
</div>