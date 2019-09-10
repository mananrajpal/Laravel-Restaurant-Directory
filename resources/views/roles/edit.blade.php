<!DOCTYPE html>
<html>
<head>
  <title>Edit Role</title>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('create') }}">Roles Alert</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('roles') }}">View All Roles</a></li>
        <li><a href="{{ URL::to('roles/create') }}">Add a Role</a></li>
        </ul>
      </nav>
      <h1>Edit {{ $role->name }} (ID: {{ $role->id }})</h1>
      <!-- if there are creation errors, they will show here -->
      {{ HTML::ul($errors->all()) }}
      {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}
      <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
      </div>
      {{ Form::submit('Edit the Role!', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div>
  </body>
  </html>
