@extends('base')

@section('main')
<div>
    <a style="margin: 19px;" href="{{ route('car.create')}}" class="btn btn-primary">New contact</a>
    </div>  
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Cars</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>TYPE</td>
          <td>BRAND</td>
          <td>MODEL</td>
          <td>COLOR</td>
          <td>FUEl</td>
          <td>YEAR</td>
          <td>CAPACITY</td>
          <td>PricePerDay</td>
          <td>IMAGE</td>
          <td colspan = 2>Actions</td>
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
            <td>{{$car->img}}</td>
            <td>
                <a href="{{ route('car.edit',$car->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('car.destroy', $car->id)}}" method="post">
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