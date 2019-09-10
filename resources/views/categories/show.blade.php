<!DOCTYPE html>
<html>
<head>
  <title>Show Category</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('categories') }}">Categories Alert</a>
      </div>
      <ul class="nav navbar-nav">

        <li><a href="{{ URL::to('categories') }}">View All Categories</a></li>
        <li><a href="{{ URL::to('categories/create') }}">Add a Category</a>
        </ul>
      </nav>
      <h1>Showing {{ $category->name }} (ID: {{ $category->id }})</h1>
      <div class="jumbotron text-center">
        <p>Category Name: {{ $category->name }}</p>
        <p>Date Added: {{ $category->created_at }}</p>
        <p>Date Last Modified: {{ $category->updated_at }}</p>
      </div>
    </div>
  </body>
  </html>
