@extends('base')
@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">users</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>NAME</td>
          <td>EMAIL</td>
          <td>ADRESS</td>
          <td>CITY</td>
          <td>PHONE</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}} </td>
            <td>{{$user->email}}</td>
            <td>{{$user->adress}}</td>
            <td>{{$user->city}}</td>
            <td>{{$user->phone}}</td>
            <td>
                <a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('user.destroy', $user->id)}}" method="post">
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