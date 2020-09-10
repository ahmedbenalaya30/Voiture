@extends('base') 
@section('main')

<form method="post" action="{{ route('searchCar') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="form-group">    
              <label for="pick_up_date">pick_up_date:</label>
              <input  type="date" class="form-control" name="pick_up_date"/>
          </div>
          <div class="form-group">
              <label for="drop_off_date">drop_off_date:</label>
              <input o type="date" class="form-control" name="drop_off_date"/>
          </div>
          </div>
            <button type="submit" class="btn btn-primary">search</button>
  </form>
  @endsection