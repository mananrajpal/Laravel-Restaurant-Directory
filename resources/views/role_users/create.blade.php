<!DOCTYPE html>
<html>
<head>
  <title>Add RoleUser</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('role_users') }}">RoleUsers Alert</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('role_users') }}">View All RoleUsers</a></li>
        <li><a href="{{ URL::to('role_users/create') }}">Create a RoleUser</a>
        </ul>
      </nav>
      <h1>Add a RoleUser</h1>
      <!-- if there are creation errors, they will show here -->
      {{ HTML::ul($errors->all()) }}
      {{ Form::open(array('url' => 'role_users')) }}
      <div class="form-group">
        {{ Form::label('user_id', 'User ID') }}
        {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('role_id', 'Role ID') }}
        {{ Form::text('role_id', Input::old('role_id'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Add the RoleUser!', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div>
</body>
</html>
