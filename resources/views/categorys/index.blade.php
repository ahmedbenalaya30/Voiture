@extends('base')
@extends('layouts.admin')
@section('content')
<div>
    <a style="margin: 19px;" href="{{ route('category.create')}}" class="btn btn-primary">New category</a>
    </div>  
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Category</h1>

  <table id="categorysTable" class="table table-striped">
    <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>DESCRIPTION</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorys as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
                <a href="{{ route('category.edit',$category->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <form method="POST" action="{{ route('category.destroy', $category->id) }}">
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