@component('mail::message')
<h1>{{$message->type}}</h1>

<hr>
<h4>Sender Name: {{$message->name}}</h4>
<h4>Sender Email: {{$message->email}}</h4>
<h4>Message: {{$message->message}}</h4>
<hr>



@component('mail::button', ['url' => 'mailto:{{$message->email}}'])
Reply Inquery
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
