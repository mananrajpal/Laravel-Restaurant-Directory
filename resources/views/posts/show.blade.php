<!DOCTYPE html>
<html>
<head>
  <title>Show Post</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('posts') }}">Posts Alert</a>
      </div>
      <ul class="nav navbar-nav">

        <li><a href="{{ URL::to('posts') }}">View All Posts</a></li>
        <li><a href="{{ URL::to('posts/create') }}">Add a Post</a>
        </ul>
      </nav>
      <h1>Showing {{ $post->id }} </h1>
      <div class="jumbotron text-center">
        <p>Post Content: {{ $post->content }}</p>
        <p>Date Added: {{ $post->created_at }}</p>
        <p>Date Last Modified: {{ $post->updated_at }}</p>
        <p>Restaurant ID: {{ $post->restaurant_id }}</p>
        <p>User ID: {{ $post->user_id }}</p>
      </div>
    </div>
  </body>
  </html>
