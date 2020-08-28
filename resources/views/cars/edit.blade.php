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
        <form method="post" action="{{ route('car.update', $car->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="patch" />
            <div class="form-group">

                <label for="first_name">TYPE:</label>
                <input type="text" class="form-control" name="type" value={{ $car->type }} />
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
                <label for="available_at">AVAILABLE_AT:</label>
                <input type="text" class="form-control" name="available_at" value={{ $car->available_at }} />
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
                <input type="text" class="form-control" name="img" value={{ $car->img }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection