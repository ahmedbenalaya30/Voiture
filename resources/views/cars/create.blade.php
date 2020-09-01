
@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a car</h1>
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
      <form method="POST" action="{{ route('car.store') }}" enctype="multipart/form-data" >
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">    
              <label for="type">type:</label>
              <input type="text" class="form-control" name="type"/>
          </div>

          <div class="form-group">
              <label for="brand">brand:</label>
              <input type="text" class="form-control" name="brand"/>
          </div>

          <div class="form-group">
              <label for="model">model:</label>
              <input type="text" class="form-control" name="model"/>
          </div>
          <div class="form-group">
              <label for="color">color:</label>
              <input type="text" class="form-control" name="color"/>
          </div>
          <div class="form-group">
              <label for="available_at">available_at:</label>
              <input type="date" class="form-control" name="available_at"/>
          </div>
          <div class="form-group">
              <label for="fuel">fuel:</label>
              <input type="text" class="form-control" name="fuel"/>
          </div> 
        

          <div class="form-group">
              <label for="year">Year:</label>
              <input type="number" class="form-control" name="year"/>
          </div> 
          <div class="form-group">
              <label for="capacity">capacity:</label>
              <input type="text" class="form-control" name="capacity"/>
          </div> 

          <div class="form-group">
              <label for="pricePerDay">pricePerDay:</label>
              <input type="number" class="form-control" name="pricePerDay"/>
          </div>     
        
  <div class="form-group">
        <label for="img">Photo</label>
        <input type="file" id="img" name='img' class="promo-img-path" accept="image/*" />
        </div>                 
          <button type="submit" class="btn btn-primary-outline">Add Car</button>
      </form>
  </div>
</div>
</div>
@endsection