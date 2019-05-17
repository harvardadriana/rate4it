<h1>Confirmation</h1>

<p>Your email has been sent</p>

@if(session('alert'))

    @include('modules.alert-messages', ['message' => session('alert')])

@endif

<div>Subject: {{ $subject }}</div>
<div>Message: {{ $bodyMessage }}</div>
<div>From: {{ $email }} </div>