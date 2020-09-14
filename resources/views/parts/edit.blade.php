
@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a part</h1>
  <div>
  

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('part.update',$part->id) }}"  >
      <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
      <input type="hidden" name="_method" value="patch" />
      <div class="form-group">    
              <label for="name">name:</label>
              <input type="text" class="form-control" name="name" value="{{ $part->name }}" />
          </div>
          
          <div class="form-group">    
              <label for="description"> description: </label>
              <input type="text" class="form-control" name="description" value="{{ $part->description }}" />
          </div>

          <div class="form-group">
              <label for="number">number:</label>
              <input type="text" class="form-control" name="number" value={{ $part->number }} />
          </div>
          <button type="submit" class="btn btn-primary-outline">update Part</button>
      </form>
  </div>
</div>
</div>
@endsection