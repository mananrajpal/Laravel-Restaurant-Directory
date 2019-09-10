<!DOCTYPE html>
<html>
<head>
  <title>Show User</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
      <h1>Showing {{ $user->id }}</h1>
      <div class="jumbotron text-center">
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Password: {{ $user->password }}</p>
        <p>Date created: {{ $user->created_at }}</p>
        <p>Date last modified: {{ $user->updated_at }}</p>
        <p>Country: {{ $user->country_id }}</p>
      </div>
    </div>
  </body>
  </html>
