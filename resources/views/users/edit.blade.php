<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('create') }}">Users Alert</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('users') }}">View All Users</a></li>\
        <li><a href="{{ URL::to('users/create') }}">Add a User</a>
      </ul>
      </nav>
      <h1>Edit {{ $user->name }} (ID: {{ $user->id }})</h1>
      <!-- if there are creation errors, they will show here -->
      {{ HTML::ul($errors->all()) }}
      {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}

      <!--Name Field-->
      <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
      </div>

      <!--Email Field-->
      <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
      </div>

      <!--Password Field-->
      <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}
      </div>

      <!--Country ID Field-->
      <div class="form-group">
        {{ Form::label('country_id', 'CountryId') }}
        {{ Form::text('country_id', Input::old('country_id'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Edit the User!', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div>
  </body>
  </html>
