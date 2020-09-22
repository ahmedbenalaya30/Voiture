@extends('base')
@extends('layouts.admin')
@section('content')

<div class="row">
<div>
<a href="{{ url('/register') }}">Register</a>
    </div>  
<div class="col-sm-12">
    <h1 class="display-3">Employee</h1>
    
  <table id="myTable" class="display"> 
    <thead>
        <tr>
          <th>ID</th>
          <th>CIN</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>ADRESS</th>
          <th>CITY</th>
          <th>PHONE</th>
          <th>Role</th>
          <th>EDIT</th>
          <th >DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
        <td>{{$user->id}}</td>
            <td>{{$user->cin}}</td>
            <td>{{$user->name}} </td>
            <td>{{$user->email}}</td>
            <td>{{$user->adress}}</td>
            <td>{{$user->city}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->role}}</td>
            <td>
                <a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td><form method="POST" action="{{ route('user.destroy', $user->id) }}">
            {{ csrf_field() }}
  {{ method_field('DELETE') }}
           <button type="submit" class="btn btn-danger">Delete</button>
       </form>
              
          <!--<td>
                <form action="{{ route('user.destroy', $user->id)}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete" />
                   delete aamélha kima el edit moch form w hotou maa el edit 
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td> -->
          </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection