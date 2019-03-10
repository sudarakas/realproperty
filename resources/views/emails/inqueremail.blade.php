@component('mail::message')
# Introduction

<h1>here: {{$message->name}}</h1>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
