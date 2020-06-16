@component('mail::message')
#Reset your Password
#Sender Name :
{{ $data['name'] }}<br>
#Sender mail:
{{ $data['email'] }}<br>
#Subject of Message :
<h3>Your code is :  {{ $data['code'] }}</h3>

@endcomponent
