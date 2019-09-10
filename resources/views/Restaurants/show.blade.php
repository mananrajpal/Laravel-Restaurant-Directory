<!DOCTYPE html>
<html>
<head>
  <title>Show Restaurant</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurants Alert</a>
      </div>
      <ul class="nav navbar-nav">

        <li><a href="{{ URL::to('restaurants') }}">View All Restaurants</a></li>
        <li><a href="{{ URL::to('restaurants/create') }}">Add a Restaurant</a>
        </ul>
      </nav>
      <h1>Showing {{ $restaurant->name }} (ID: {{ $restaurant->id }})</h1>
      <div class="jumbotron text-center">
        <p>Restaurant Name: {{ $restaurant->name }}</p>
        <p>Phone: {{ $restaurant->phone }}</p>
        <p>Address line 1: {{ $restaurant->address1 }}</p>
        <p>Address line 1: {{ $restaurant->address2 }}</p>
        <p>Suburb: {{ $restaurant->suburb }}</p>
        <p>State: {{ $restaurant->state }}</p>
        <p>Number of Seats: {{ $restaurant->numberofseats }}</p>
        <p>Country ID: {{ $restaurant->country_id }}</p>
        <p>Catagory ID: {{ $restaurant->category_id }}</p>
      </div>

      <!--Posts-->
      @foreach($restaurant->posts as $p)
        <div style='background-color: lightgrey;'>
          <p>"{{ $p->content }}"</p>
          <p>-{{ $p->user->name }} from {{ $p->user->country->name }}</p>
          <p>Posted: {{ $p->created_at }}</p>
          <!--User Name-->
          <!--Country Name-->
        </div>

        <!--Comments-->
        @foreach($p->comments as $c)
          <div style='background-color: grey;'>
            <p>"{{ $c->content }}"</p>
            <p>-{{ $c->user->name }} from {{ $c->user->country->name }}</p>
            <p>Posted: {{ $c->created_at }}</p>
            <!--User Name-->
            <!--Country Name-->
          </div>
          <br/>
        @endforeach
      @endforeach

    </div>
  </body>
  </html>
