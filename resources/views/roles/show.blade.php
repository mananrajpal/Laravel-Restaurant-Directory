<!DOCTYPE html>
<html>
<head>
  <title>Show Role</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('roles') }}">Roles Alert</a>
      </div>
      <ul class="nav navbar-nav">

        <li><a href="{{ URL::to('roles') }}">View All Roles</a></li>
        <li><a href="{{ URL::to('roles/create') }}">Add a Role</a>
        </ul>
      </nav>
      <h1>Showing {{ $role->name }} (ID: {{ $role->id }})</h1>
      <div class="jumbotron text-center">
        <p>Role Name: {{ $role->name }}</p>
        <p>Date Added: {{ $role->created_at }}</p>
        <p>Date Last Modified: {{ $role->updated_at }}</p>
      </div>
    </div>
  </body>
  </html>
