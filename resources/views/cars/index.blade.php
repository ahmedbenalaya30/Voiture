@extends('base')
@extends('layouts.admin')
@section('content')
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
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
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
            <td>
                <a href="{{ route('car.edit',$car->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <form method="POST" action="{{ route('car.destroy', $car->id) }}">
            {{ csrf_field() }}
  {{ method_field('DELETE') }}
           <button type="submit" class="btn btn-danger ">Delete
           </button>
       </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection