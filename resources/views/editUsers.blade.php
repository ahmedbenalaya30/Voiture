@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a user</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('user.update', $user->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="patch" />
            <div class="form-group">

                <label for="name">NAME:</label>
                <input type="text" class="form-control" name="name" value={{ $user->name }} />
            </div>

            <div class="form-group">
                <label for="email">EMAIL:</label>
                <input type="text" class="form-control" name="email" value={{ $user->email }} />
            </div>

            <div class="form-group">
                <label for="adress">ADRESS:</label>
                <input type="text" class="form-control" name="adress" value={{ $user->adress }} />
            </div>
            <div class="form-group">
                <label for="city">CITY:</label>
                <input type="text" class="form-control" name="city" value={{ $user->city }} />
            </div>
            <div class="form-group">
                <label for="phone">PHONE:</label>
                <input type="number" class="form-control" name="phone" value={{ $user->phone }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection