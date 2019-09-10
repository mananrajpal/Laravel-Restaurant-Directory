<!DOCTYPE html>
<html>
<head>
  <title>Countries (Index)</title> <!--TODO: Change this to match (and delete this comment)-->
  <link rel="stylesheet"
  href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('countries') }}">Countries Alert</a> <!--TODO: Change this to match (and delete this comment)-->

    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ URL::to('countries') }}">View All Countries</a></li> <!--TODO: Change this to match (and delete this comment)-->
      <li><a href="{{ URL::to('countries/create') }}">Add a Country</a> <!--TODO: Change this to match (and delete this comment)-->
    </ul>
    </nav>
    <h1>All the Countries</h1> <!--TODO: Change this to match (and delete this comment)-->
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
        @foreach($countries as $value)
        <tr>
          <td>{{ $value->name }}</td> <!--TODO: Change this to match (and delete this comment)-->
          <td>{{ $value->created_at }}</td> <!--TODO: Change this to match (and delete this comment)-->
          <td>{{ $value->updated_at }}</td> <!--TODO: Change this to match (and delete this comment)-->
          <!-- we will also add show, edit, and delete buttons -->
          <td>
            <!-- delete the order (uses the destroy method DESTROY /orders/{id} -->
            <!-- TODO: we will add this later since its a little more complicated than the other two buttons -->
            <!--TODO: Finish this-->
            {{ Form::open(array('url' => 'countries/' . $value->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('Delete this Country', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}

            <!-- Show the order (uses the show method found at GET /orders/{id} -->
            <a class="btn btn-small btn-success" href="{{ URL::to('countries/' . $value->id) }}">Show this Country</a> <!--TODO: Change this to match (and delete this comment)-->
            <!-- Edit this order (uses the edit method found at GET /orders/{id}/edit -->
            <a class="btn btn-small btn-info" href="{{ URL::to('countries/' . $value->id . '/edit') }}">Edit this Country</a> <!--TODO: Change this to match (and delete this comment)-->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
