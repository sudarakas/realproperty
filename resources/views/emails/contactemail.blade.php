@component('mail::message')
<h1>{{$message->subject}}</h1>

<hr>
<p>Sender Name: {{$message->name}}</p>
<p>Sender Email: {{$message->email}}</p>
<p>Sender Phone No: {{$message->pno}}</p>
<p>View Property: {{$message->property_url}}</p>
<p>Message: {{$message->message}}</p>
<hr>



@component('mail::button', ['url' => 'mailto:{{$message->email}}'])
Reply Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
