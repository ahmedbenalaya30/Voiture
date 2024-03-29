
       @extends('base')
       @extends('layouts.admin')
@section('content')
<div>
    <a style="margin: 19px;" href="{{ route('part.create')}}" class="btn btn-primary">New part</a>
    </div>  
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Category</h1>

  <table id="partsTable" class="table table-striped">
    <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>DESCRIPTION</th>
          <th>NUMBER</th>
          <th>USE</th>
          <th>ADD</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($parts as $part)
        <tr>
            <td>{{$part->id}}</td>
            <td>{{$part->name}}</td>
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
            <td>
            <form method="POST" action="{{ route('part.destroy', $part->id) }}">
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