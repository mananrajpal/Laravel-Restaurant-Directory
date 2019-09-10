<!DOCTYPE html>

<!--
TASK 2.1
-->

<html lang="en">
<head>
<meta charset="UTF-8">
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
        <th>Restaurant</th>
        <th>Location</th>
        <th>Cuisine Type</th>
      </tr>
    @foreach ($restaurants as $restaurant)
    <tr>
      <td>{{ $restaurant[0] }}</td>
      <td>{{ $restaurant[1] }}</td>
      <td>{{ $restaurant[2] }}</td>
    </tr>
    @endforeach
 </table>
</body>
</html>
