
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
      <form method="post" action="{{ route('category.update',$category->id) }}"  >
      <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
      <input type="hidden" name="_method" value="patch" />
      <div class="form-group">    
              <label for="name">name:</label>
              <input type="text" class="form-control" name="name" value="{{ $category->name }}" />
          </div>
          
          <div class="form-group">    
              <label for="description"> description: </label>
              <input type="text" class="form-control" name="description" value="{{ $category->description }}" />
          </div>
          <button type="submit" class="btn btn-primary-outline">update category</button>
      </form>
  </div>
</div>
</div>
@endsection