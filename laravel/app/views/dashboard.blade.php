@extends('template')

@section('content')

  <h2>Welcome, {{ $user }}</h2>
  <p>
    Below are collections in which you have access to.
  </p>

  <ul class="list-group">
    <li class="list-group-item"><a href="api/tpd_incidents">{{ studly_case('tpd_incidents') }}</a></li>
    <li class="list-group-item"><a href="api/geolocation_test">{{ studly_case('geolocation_test') }}</a></li>
  </ul>
  <p>
    Your API Key is <code>{{ md5('bryon') }}</code>
  </p>
@stop