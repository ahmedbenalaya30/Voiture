
@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a category</h1>
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
      <form method="POST" action="{{ route('category.store') }}" enctype="multicategory/form-data" >
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
      <div class="form-group">    
              <label for="name">name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">    
              <label for="description">description:</label>
              <input type="text" class="form-control" name="description" value="//"/>
          </div>
          <button type="submit" class="btn btn-primary-outline">Add category</button>
      </form>
  </div>
</div>
</div>
@endsection