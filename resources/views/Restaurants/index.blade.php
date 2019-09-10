<!DOCTYPE html>
<html>
<head>
  <title>Restaurants (Index)</title>
  <link rel="stylesheet"
  href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurants Alert</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ URL::to('restaurants') }}">View All Restaurants</a></li>
      <li><a href="{{ URL::to('restaurants/create') }}">Add a Restaurant</a></li>
    </ul>
    </nav>
    <h1>All the Restaurants</h1>
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <!--TODO: Add extra collumns for Country and Catagory Names-->
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>phone</th>
          <th>address1</th>
          <th>address2</th>
          <th>suburb</th>
          <th>state</th>
          <th>Number of Seats</th>
          <th>Country Name</th>
          <th>Catagory Name</th>
        </tr>
      </thead>
      <tbody>

        @foreach($restaurants as $value)
        <tr>
          <td>{{ $value->name }}</td>
          <td>{{ $value->phone }}</td>
          <td>{{ $value->address1 }}</td>
          <td>{{ $value->address2 }}</td>
          <td>{{ $value->suburb }}</td>
          <td>{{ $value->state }}</td>
          <td>{{ $value->numberofseats }}</td>
          <td>{{ $value->country->name }}</td>
          <td>{{ $value->category->name }}</td>
          <!-- we will also add show, edit, and delete buttons -->
          <td>
            <!-- delete the order (uses the destroy method DESTROY /orders/{id} -->
            <!-- TODO: we will add this later since its a little more complicated than the other two buttons -->
            <!--TODO: Finish this-->
            {{ Form::open(array('url' => 'restaurants/' . $value->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('Delete this Restaurant', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}

            <!-- Show the order (uses the show method found at GET /orders/{id} -->
            <a class="btn btn-small btn-success" href="{{ URL::to('restaurants/' . $value->id) }}">Show this Restaurant</a>
            <!-- Edit this order (uses the edit method found at GET /orders/{id}/edit -->
            <a class="btn btn-small btn-info" href="{{ URL::to('restaurants/' . $value->id . '/edit') }}">Edit this Restaurant</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
