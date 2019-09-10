<!DOCTYPE html>
<html>
<head>
  <title>Show RoleUser</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('role_users') }}">RoleUsers Alert</a>
      </div>
      <ul class="nav navbar-nav">

        <li><a href="{{ URL::to('role_users') }}">View All RoleUsers</a></li>
        <li><a href="{{ URL::to('role_users/create') }}">Add a RoleUser</a>
        </ul>
      </nav>
      <h1>Showing {{ $role_users->name }} (ID: {{ $role_users->id }})</h1>
      <div class="jumbotron text-center">
        <p>User ID: {{ $role_users->user_id }}</p>
        <p>Role ID: {{ $role_users->role_id }}</p>
        <p>Date Added: {{ $role_users->created_at }}</p>
        <p>Date Last Modified: {{ $role_users->updated_at }}</p>
      </div>
    </div>
  </body>
  </html>
