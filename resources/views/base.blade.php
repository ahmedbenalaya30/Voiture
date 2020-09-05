<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Base</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{URL::asset('assets/css/dataTables.min.css')}}">
</head>

<body>
  <div class="container">
    @yield('main')
  </div>
  <script
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
  crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script src="{!! asset('assets/js/dataTables.min.js') !!}"></script></body>
</html>

<script> $(document).ready( function () {
    $('#myTable').DataTable();
} ); </script>
<script> $(document).ready( function () {
    $('#carsTable').DataTable();
} ); </script>
<script> $(document).ready( function () {
    $('#bookingsTable').DataTable();
} ); </script>