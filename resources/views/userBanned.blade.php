@extends('base')
@section('main')
<div class="row">

<div class="col-sm-12">
    <h1 class="display-3">users</h1>
    
  <table id="myTable1" class="display"> 
    <thead>
        <tr>
          <th>ID</th>
          <th>CIN</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>ADRESS</th>
          <th>CITY</th>
          <th>PHONE</th>
          <th>EDIT</th>
          <th >DELETE</th>
          <th>Show bookings</th>
          <th>Block</th>
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
            <td>
                <a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td><form method="POST" action="{{ route('user.destroy', $user->id) }}">
            {{ csrf_field() }}
  {{ method_field('DELETE') }}
           <button type="submit" class="btn btn-danger">Delete</button>
       </form>
              </td>
<td><a href="{{ route('search', $user->id)}}" class="btn btn-info">Show</a></td>
<td><form method="POST" action="{{ route('disblock',$user->id)}}">
            {{ csrf_field() }}
           <button type="submit" class="btn btn-primary">unblock</button>
       </form></td>
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