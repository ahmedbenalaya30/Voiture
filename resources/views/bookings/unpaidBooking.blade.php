@extends('base')
@extends('layouts.admin')
@section('content')
<div>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">unpaid reservation</h1>
  <table id="bookingsTable"class="table table-striped">
    <thead>
        <tr>
          <th>ID</th>
          <th>USER</th>
          <th>CAR</th>
          <th>PICK_UP_DATE</th>
          <th>DROP_OFF_DATE</th>
          <th>STATUS</th>
          <th>IS PAID</th>
          <th >EDIT</th>
          <th>DELETE</th>
          <th>Facture</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{$booking->id}}</td>
            <td>{{$booking->user['name']}} : {{$booking->user['cin']}}</td>
            <td>{{$booking->car['carNumber']}} | {{$booking->car['brand']}} | {{$booking->car['model']}}</td>
            <td>{{$booking->pick_up_date}}</td>
            <td>{{$booking->drop_off_date}}</td>
            <td>{{$booking->status}}</td>
            @if ($booking->is_paid)
            <td>Yes</td>
            @else
            <td><form method="POST" action="{{ route('paid',$booking->id)}}">
            {{ csrf_field() }}
           <button type="submit" class="btn .btn-warning">pay</button>
           </form></td>
            @endif
            <td>
                <a href="{{ route('booking.edit',$booking->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <form method="POST" action="{{ route('booking.destroy', $booking->id) }}">
            {{ csrf_field() }}
  {{ method_field('DELETE') }}
           <button type="submit" class="btn btn-danger">Delete</button>
       </form>            </td>
            <td>
            <a href="{{ route('facture', $booking->id)}}" class="btn btn-info">show Facture</a>
            
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection