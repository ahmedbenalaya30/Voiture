@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a car</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('car.update', $car->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="patch" />
                <div class="form-group">    
              <label for="carNumber">Car number:</label>
              <input type="text" class="form-control" name="carNumber" value={{ $car->carNumber }}/>
          </div>
            <div class="form-group">

                <label for="category">Category:</label>
                <input type="text" class="form-control" name="category" value={{ $car->category }} />
            </div>

            <div class="form-group">
                <label for="brand">BRAND:</label>
                <input type="text" class="form-control" name="brand" value={{ $car->brand }} />
            </div>

            <div class="form-group">
                <label for="model">MODEL:</label>
                <input type="text" class="form-control" name="model" value={{ $car->model }} />
            </div>
            <div class="form-group">
                <label for="color">COLOR:</label>
                <input type="text" class="form-control" name="color" value={{ $car->color }} />
            </div>
           
            <div class="form-group">
                <label for="insurance">INSURANCE:</label>
                <input type="date" class="form-control" name="insurance" value={{ $car->insurance }} />
            </div>
            <div class="form-group">
                <label for="technicalVisit">TECHNICALVISIT:</label>
                <input type="date" class="form-control" name="technicalVisit" value={{ $car->technicalVisit }} />
            </div>
            <div class="form-group">
                <label for="oilChange">OIL CHANGE:</label>
                <input type="date" class="form-control" name="oilChange" value={{ $car->oilChange }} />
            </div>

            <div class="form-group">
                <label for="fuel">FUEL:</label>
                <input type="text" class="form-control" name="fuel" value={{ $car->fuel }} />
            </div>
            <div class="form-group">
                <label for="year">YEAR:</label>
                <input type="text" class="form-control" name="year" value={{ $car->year }} />
            </div>
            <div class="form-group">
                <label for="capacity">CAPACITY:</label>
                <input type="text" class="form-control" name="capacity" value={{ $car->capacity }} />
            </div>
            <div class="form-group">
                <label for="pricePerDay">PRICE_PER_DAY:</label>
                <input type="text" class="form-control" name="pricePerDay" value={{ $car->pricePerDay }} />
            </div>
            <div class="form-group">
                <label for="img">IMAGE:</label>
                <div class="col-md-8">
                <input type="file" id="img" name='img' class="promo-img-path" accept="image/*" />
              <img src="{{ URL::to('/') }}/images/{{ $car->img }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $car->img }}" />
       </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection