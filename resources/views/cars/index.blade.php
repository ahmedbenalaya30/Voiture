@extends('base')

@section('main')
<div>
    <a style="margin: 19px;" href="{{ route('car.create')}}" class="btn btn-primary">New car</a>
    </div>  
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Cars</h1>
  <table id="carsTable" class="table table-striped">
    <thead>
        <tr>
          <th>ID</th>
          <th>TYPE</th>
          <th>BRAND</th>
          <th>MODEL</th>
          <th>COLOR</th>
          <th>FUEl</th>
          <th>YEAR</th>
          <th>CAPACITY</th>
          <th>PricePerDay</th>
          <th>IMAGE</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->type}} </td>
            <td>{{$car->brand}}</td>
            <td>{{$car->model}}</td>
            <td>{{$car->color}}</td>
            <td>{{$car->fuel}}</td>
            <td>{{$car->year}}</td>
            <td>{{$car->capacity}}</td>
            <td>{{$car->pricePerDay}}</td>
            <td><img src="{{ URL::to('/') }}/images/{{ $car->img }}" class="img-thumbnail" width="75"  /></td>
            <td>
                <a href="{{ route('car.edit',$car->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <a href="{{ route('car.destroy', $car->id)}}" class="btn btn-primary">DELETE</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection