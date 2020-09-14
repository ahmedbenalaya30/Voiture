@extends('base')
@section('main')
<div>
    <a style="margin: 19px;" href="{{ route('part.create')}}" class="btn btn-primary">New part</a>
    </div>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">parts</h1>
    
  <table id="partsTable" class="display"> 
    <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>DESCRIPTION</th>
         <th>NUMBER</th>
         <th>ADD</th>
         <th>Substract<th>
         <th>Edit<th>
        </tr>
    </thead>
    <tbody>
        @foreach($parts as $part)
        <tr>
        <td>{{$part->id}}</td>
            <td>{{$part->name}} </td>
            <td>{{$part->description}}</td>
            <td>{{$part->number}}</td>
            <td><form method="POST" action="{{ route('plus',$part->id)}}">
            {{ csrf_field() }}
           <button type="submit" class="btn btn-primary">+</button>
       </form></td>
       <td><form method="POST" action="{{ route('moins',$part->id)}}">
            {{ csrf_field() }}
           <button type="submit" class="btn btn-danger">-</button>
       </form></td>
       <td>
                <a href="{{ route('part.edit',$part->id)}}" class="btn btn-primary">Edit</a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection