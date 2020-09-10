@extends('base')

@section('main')
<div class="row">
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
          <th>EDIT</th>
         
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
            <td>
               
            </td>
           
           
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection