<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Base</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/dataTables.min.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    @yield('main')
  </div>
  <script
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
  crossorigin="anonymous"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script src="{!! asset('assets/js/dataTables.min.js') !!}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>

<script> $(document).ready( function () {
    $('#myTable').DataTable();
} ); </script>

<script> $(document).ready( function () {
    $('#myTable1').DataTable();
} ); </script>

<script> $(document).ready( function () {
    $('#carsTable').DataTable();
} ); </script>
<script> $(document).ready( function () {
    $('#carsTable1').DataTable();
} ); </script>

<script> $(document).ready( function () {
    $('#bookingsTable').DataTable();
} ); </script>

<script> $(document).ready( function () {
    $('#partsTable').DataTable();
} ); </script>
<script> $(document).ready( function () {
    $('#categorysTable').DataTable();
} ); </script>

<script> 
$('a.printPage').click(function(){
           window.print();
           return false;
});</script>
