<!DOCTYPE html>
<!--
TASK 3.1
-->
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('css/app.css')}}"/>
  <title>Show Restaurant</title>
  <style>
  table, th, td {
    border: 1px solid black;
  }
  </style>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address 1</th>
        <th>Address 2</th>
        <th>Suburb</th>
        <th>State</th>
        <th>No of Seats</th>
      </tr>
    @foreach ($restaurants as $restaurant)
    <tr>
      <td>{{ $restaurant -> restid  }}</td>
      <td>{{ $restaurant -> restname  }}</td>
      <td>{{ $restaurant -> restphone  }}</td>
      <td>{{ $restaurant -> restaddress1  }}</td>
      <td>{{ $restaurant -> restaddress2  }}</td>
      <td>{{ $restaurant -> suburb  }}</td>
      <td>{{ $restaurant -> state  }}</td>
      <td>{{ $restaurant -> numberofseats  }}</td>
    </tr>
    @endforeach
 </table>
{{ $restaurants->links('vendor.pagination.bootstrap-4') }}
</body>
</html>
