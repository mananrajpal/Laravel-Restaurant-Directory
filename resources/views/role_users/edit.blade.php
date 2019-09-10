<!DOCTYPE html>
<html>
<head>
  <title>Edit RoleUser</title>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('create') }}">RoleUsers Alert</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('role_users') }}">View All RoleUsers</a></li>
        <li><a href="{{ URL::to('role_users/create') }}">Add a RoleUser</a></li>
        </ul>
      </nav>
      <h1>Edit {{ $role_users->name }} (ID: {{ $role_users->id }})</h1>
      <!-- if there are creation errors, they will show here -->
      {{ HTML::ul($errors->all()) }}
      {{ Form::model($role_users, array('route' => array('role_users.update', $role_users->id), 'method' => 'PUT')) }}
      <div class="form-group">
        {{ Form::label('user_id', 'User ID') }}
        {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('role_id', 'Role ID') }}
        {{ Form::text('role_id', Input::old('role_id'), array('class' => 'form-control')) }}
      </div>
      {{ Form::submit('Edit the RoleUser!', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div>
  </body>
  </html>
