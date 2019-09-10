<!DOCTYPE html>
<html>
<head>
  <title>Roles (Index)</title>
  <link rel="stylesheet"
  href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('roles') }}">Roles Alert</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ URL::to('roles') }}">View All Roles</a></li>
      <li><a href="{{ URL::to('roles/create') }}">Add a Role</a></li>
    </ul>
    </nav>
    <h1>All the Roles</h1>
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Name</th> <!--TODO: Change this to match (and delete this comment)-->
          <th>Created At</th> <!--TODO: Change this to match (and delete this comment)-->
          <th>Updated At</th> <!--TODO: Change this to match (and delete this comment)-->
        </tr>
      </thead>
      <tbody>
        <!--TODO: Change this to match (and delete this comment)-->
        @foreach($roles as $value)
        <tr>
          <td>{{ $value->name }}</td> <!--TODO: Change this to match (and delete this comment)-->
          <td>{{ $value->created_at }}</td> <!--TODO: Change this to match (and delete this comment)-->
          <td>{{ $value->updated_at }}</td> <!--TODO: Change this to match (and delete this comment)-->
          <!-- we will also add show, edit, and delete buttons -->
          <td>
            <!-- delete the order (uses the destroy method DESTROY /orders/{id} -->
            <!-- TODO: we will add this later since its a little more complicated than the other two buttons -->
            <!--TODO: Finish this-->
            {{ Form::open(array('url' => 'roles/' . $value->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('Delete this Role', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}

            <!-- Show the order (uses the show method found at GET /orders/{id} -->
            <a class="btn btn-small btn-success" href="{{ URL::to('roles/' . $value->id) }}">Show this Role</a> <!--TODO: Change this to match (and delete this comment)-->
            <!-- Edit this order (uses the edit method found at GET /orders/{id}/edit -->
            <a class="btn btn-small btn-info" href="{{ URL::to('roles/' . $value->id . '/edit') }}">Edit this Role</a> <!--TODO: Change this to match (and delete this comment)-->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
