@component('mail::message')
<h1>{{$message->subject}}</h1>

<hr>
<p>Hello! {{$message->receiver_name}}</p>
<p>This is inform you that following property ad you posted on the site has been <b>{{$message->status}}</b> by the Administrator of Real Property</p>
<p>If you need further clarification, please contact us!</p>
<hr>


<p><b>Property Information</b></p>
<p>Name: {{$message->property_name}}</p>
<p>Location: {{$message->property_location}}</p>
<p>Added On: {{$message->property_createdOn}}</p>
<hr>

@component('mail::button', ['url' => 'mailto:realproperty@realesate.lk'])
Reply Message
@endcomponent

Thank You<br>
{{ config('app.name') }}
@endcomponent
