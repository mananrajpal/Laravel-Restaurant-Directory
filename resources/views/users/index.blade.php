<!DOCTYPE html>
<html>
<head>
  <title>Users (Index)</title>
  <link rel="stylesheet"
  href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('users') }}">Users Alert</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ URL::to('users') }}">View All Users</a></li>
      <li><a href="{{ URL::to('users/create') }}">Add a User</a>
    </ul>
    </nav>
    <h1>All the Users</h1>
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>created_at</th>
          <th>updated_at</th>
          <th>country_id</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $value)
        <tr>
          <td>{{ $value->name }}</td>
          <td>{{ $value->email }}</td>
          <td>{{ $value->password }}</td>
          <td>{{ $value->created_at }}</td>
          <td>{{ $value->updated_at }}</td>
          <td>{{ $value->country_id }}</td>
          <!-- we will also add show, edit, and delete buttons -->
          <td>
            <!-- delete the order (uses the destroy method DESTROY /orders/{id} -->
            {{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('Delete this User', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}

            <!-- Show the order (uses the show method found at GET /orders/{id} -->
            <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this User</a> <!--TODO: Change this to match (and delete this comment)-->
            <!-- Edit this order (uses the edit method found at GET /orders/{id}/edit -->
            <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this User</a> <!--TODO: Change this to match (and delete this comment)-->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
