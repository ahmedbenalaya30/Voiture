
@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a booking</h1>
  <div>
  

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="POST" action="{{ route('booking.store') }}" enctype="multipart/form-data" >
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
              <label for="user_id">User:</label>
              <input type="number" class="form-control" name="user_id"/>
          </div>
          <div class="form-group">
              <label for="car_id">Car:</label>
              <input type="number" class="form-control" name="car_id"/>
          </div>
          <div class="form-group">    
              <label for="pick_up_date">pick_up_date:</label>
              <input type="date" class="form-control" name="pick_up_date"/>
          </div>

          <div class="form-group">
              <label for="drop_off_date">drop_off_date:</label>
              <input type="date" class="form-control" name="drop_off_date"/>
          </div>

          <div class="form-group">
              <label for="status">status:</label>
              <select name="status" id="status">
    <option value="Pending">Pending</option>
    <option value="Cancelled">Cancelled</option>
    <option value="Pending">Confirmed</option>
    </select>
          </div>
          <div class="form-group">
              <label for="status">IsPaid:</label>
              <input type="checkbox" id="isPaid" name="isPaid">
          </div>

          
                    
          <button type="submit" class="btn btn-primary-outline">Add booking</button>
      </form>
  </div>
</div>
</div>
@endsection