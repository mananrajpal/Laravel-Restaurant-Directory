<!DOCTYPE html>
<html>
<head>
  <title>Add Country</title> <!--TODO: Change this to match (and delete this comment)-->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('countries') }}">Countries Alert</a> <!--TODO: Change this to match (and delete this comment)-->
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('countries') }}">View All Countries</a></li> <!--TODO: Change this to match (and delete this comment)-->
        <li><a href="{{ URL::to('countries/create') }}">Add a Country</a></li> <!--TODO: Change this to match (and delete this comment)-->
        </ul>
      </nav>
      <h1>Add a Country</h1> <!--TODO: Change this to match (and delete this comment)-->
      <!-- if there are creation errors, they will show here -->
      {{ HTML::ul($errors->all()) }}
      <!--TODO: Change this to match (and delete this comment)-->
      {{ Form::open(array('url' => 'countries')) }}
      <div class="form-group">
        <!--TODO: Change this to match (and delete this comment)-->
        {{ Form::label('name', 'Name') }}
         <!--TODO: Change this to match (and delete this comment)-->
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
      </div>
       <!--TODO: Change this to match (and delete this comment)-->
      {{ Form::submit('Add the Country!', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div>
</body>
</html>
