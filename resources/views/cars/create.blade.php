
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
              <label for="category">Category:</label>
              <select name="category" for="category">
              @foreach( $categorys as $category)
              <option value='{{ $category->name }}'  > category : {{ $category->name }} : {{ $category->description }}</option>
@endforeach
</select>
<div class="form-group">    
              <label for="carNumber">Car number:</label>
              <input type="text" class="form-control" name="carNumber"/>
          </div>
          </div>

          <div class="form-group">
              <label for="brand">Brand:</label>
              <input type="text" class="form-control" name="brand"/>
          </div>

          <div class="form-group">
              <label for="model">Model:</label>
              <input type="text" class="form-control" name="model"/>
          </div>
          <div class="form-group">
              <label for="color">Color:</label>
              <input type="text" class="form-control" name="color"/>
          </div>

          <div class="form-group">
                <label for="insurance">Insurance:</label>
                <input type="date" class="form-control" name="insurance"  />
          </div>

            <div class="form-group">
                <label for="technicalVisit">TechnicalVisit:</label>
                <input type="date" class="form-control" name="technicalVisit"  />
            </div>

            <div class="form-group">
                <label for="oilChange">Oil change:</label>
                <input type="date" class="form-control" name="oilChange" />
            </div>

          <div class="form-group">
              <label for="fuel">Fuel:</label>
              <input type="text" class="form-control" name="fuel"/>
          </div> 
        

          <div class="form-group">
              <label for="year">Year:</label>
              <input type="number" class="form-control" name="year"/>
          </div> 
          <div class="form-group">
              <label for="capacity">Capacity:</label>
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