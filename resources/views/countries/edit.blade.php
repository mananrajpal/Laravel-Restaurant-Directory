<!DOCTYPE html>
<html>
<head>
  <title>Edit Country</title>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('create') }}">Countries Alert</a> 
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('countries') }}">View All Countries</a></li>
        <li><a href="{{ URL::to('countries/create') }}">Add a Country</a>
        </ul>
      </nav>
      <h1>Edit {{ $country->name }} (ID: {{ $country->id }})</h1>
      <!-- if there are creation errors, they will show here -->
      {{ HTML::ul($errors->all()) }}
      {{ Form::model($country, array('route' => array('countries.update', $country->id), 'method' => 'PUT')) }}
      <div class="form-group">

        {{ Form::label('name', 'Name') }}

        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Edit the Country!', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div>
  </body>
  </html>
