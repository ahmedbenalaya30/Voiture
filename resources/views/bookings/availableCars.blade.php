@extends('base')

@section('main')
<div class="row">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Book</button>
</button>
<div class="col-sm-12">
    <h1 class="display-3">Cars</h1>
  <table id="carsTable" class="table table-striped">
    <thead>
        <tr>
        <th>CAR NUMBER</th>
          <th>CATEGORY</th>
          <th>BRAND</th>
          <th>MODEL</th>
          <th>COLOR</th>
          <th>INSURANCE</th>
          <th>TECHNICAL VISIT</th>
          <th>OIL CHANGE</th>
          <th>FUEl</th>
          <th>YEAR</th>
          <th>CAPACITY</th>
          <th>PricePerDay</th>
          <th>IMAGE</th>
         
        </tr>
    </thead>
    <tbody>
        @foreach( $availables as $car)
        <tr>
            
            <td>{{$car->carNumber}}</td>
            <td>{{$car->category}} </td>
            <td>{{$car->brand}}</td>
            <td>{{$car->model}}</td>
            <td>{{$car->color}}</td>
            <td>{{$car->insurance}}</td>
            <td>{{$car->technicalVisit}}</td>
            <td>{{$car->oilChange}}</td>
            <td>{{$car->fuel}}</td>
            <td>{{$car->year}}</td>
            <td>{{$car->capacity}}</td>
            <td>{{$car->pricePerDay}}</td>
            <td><img src="{{ URL::to('/') }}/images/{{ $car->img }}" class="img-thumbnail" width="75"  /></td>
            
           
           
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Booking</h4>
        </div>
        <form method="POST" action="{{ route('booking.store') }}" enctype="multipart/form-data" >
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
              <label for="user_id">User:</label>    
              <select name="user_id" for="user_id">
              @foreach(App\User::get() as $user)
<option value='{{ $user->id }}'  > name : {{ $user->name }} | cin : {{ $user->cin }}</option>
@endforeach
              </select>   
            
          </div>
          <div class="form-group">
              <label for="car_id">Car:</label>
              <select name="car_id" for="car_id">
              @foreach( $availables as $car)
              <option value='{{ $car->id }}'  > carNumber : {{ $car->carNumber }} | brand : {{ $car->brand }} | model : {{$car->model}}</option>
@endforeach
</select>
          </div>
          <div class="form-group">    
              <label for="pick_up_date">pick_up_date:</label>
              <input type="text" class="form-control" name="pick_up_date"  value={{ $pick_up_date }} readonly	/>
          </div>

          <div class="form-group">
              <label for="drop_off_date">drop_off_date:</label>
              <input type="text" class="form-control" name="drop_off_date" value={{ $drop_off_date }} readonly	/>
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
      </form>        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

@endsection