@extends('admin.layouts.master')

@section('content')

    <!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Category</h1>

      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Category</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Preview</label>
                        <br>
                        <img src="{{asset($category->icon)}}" width="200px" alt="">
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="file" name="icon" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" id="" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                            <option {{$category->status == 1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$category->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>

@endsection
