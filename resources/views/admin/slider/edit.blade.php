@extends('admin.layouts.master')

@section('content')

    <!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Slider</h1>

      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit slider</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Preview</label>
                        <br>
                        <img src="{{asset($slider->banner)}}" width="200px" alt="">
                    </div>
                    <div class="form-group">
                        <label>Banner</label>
                        <input type="file" name="banner" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="type" class="form-control" id="" value="{{$slider->type}}">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" id=""value="{{$slider->title}}">
                    </div>
                    <div class="form-group">
                        <label>Starting Price</label>
                        <input type="text" name="starting_price" class="form-control" id=""value="{{$slider->starting_price}}">
                    </div>
                    <div class="form-group">
                        <label>Button URL</label>
                        <input type="text" name="button_url" class="form-control" id=""value="{{$slider->button_url}}">
                    </div>
                    <div class="form-group">
                        <label>Serial</label>
                        <input type="text" name="serial" class="form-control" id=""value="{{$slider->serial}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                            <option {{$slider->status == 1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$slider->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
