@extends('template')

@section('content')
  <h2>About</h2>
  <p>
    Dramatically transition magnetic outsourcing for 2.0 products. Globally deliver unique potentialities with mission-critical materials. Rapidiously e-enable low-risk high-yield data for error-free leadership. Collaboratively build best-of-breed web services via just in time deliverables.
  </p>
  {{ Form::open(array('url' => 'login')) }}
    <div class="form-group">
      {{ Form::label('email', 'E-Mail Address', array('class' => 's')) }}
      {{ Form::text('email', null, array('class' => 'form-control', 'placeholder'=>'E-mail')) }}
    </div>
    <div class="form-group">
      {{ Form::label('password', 'Password', array('class' => 's')) }}
      {{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'Password')) }}
    </div>
    <div class="form-group">
      {{ Form::submit('Login', array('class' => 'btn btn-default')) }}
      {{ Form::token() }}
    </div>
  {{ Form::close() }}
@stop