@extends('base')

@section('main')
<div>
    <a style="margin: 19px;" href="{{ route('booking.create')}}" class="btn btn-primary">New Booking</a>
    </div>  
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Cars</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>USER Name</td>
          <td>CAR</td>
          <td>PICK_UP_DATE</td>
          <td>DROP_OFF_DATE</td>
          <td>STATUS</td>
          <td>IS PAID</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{$booking->id}}</td>
            <td>{{$booking->user['name']}} </td>
            <td>{{$booking->car['type']}} | {{$booking->car['brand']}} | {{$booking->car['model']}}</td>
            <td>{{$booking->pick_up_date}}</td>
            <td>{{$booking->drop_off_date}}</td>
            <td>{{$booking->status}}</td>
            @if ($booking->is_paid)
            <td>Yes</td>
            @else
            <td>No</td>
            @endif
            <td>
                <a href="{{ route('booking.edit',$booking->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('booking.destroy', $booking->id)}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete" />
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection