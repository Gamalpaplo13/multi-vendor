@extends('admin.layouts.master')

@section('content')

    <!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Vendor Profile</h1>

      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Update vendor profile</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.vendor-profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Preview</label>
                        <img src="{{asset($profile->banner)}}" width="200px" alt="">
                    </div>
                    <div class="form-group">
                        <label>Banner</label>
                        <input type="file" name="banner" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" id="" value="{{$profile->phone}}">
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" class="form-control" id=""value="{{$profile->email}}">
                    </div>
                    <div class="form-group">
                        <label>address</label>
                        <input type="text" name="address" class="form-control" id=""value="{{$profile->address}}">
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <textarea class="summernote" name="description">{{$profile->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook_link" class="form-control" id=""value="{{$profile->facebook_link}}">
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram_link" class="form-control" id=""value="{{$profile->instagram_link}}">
                    </div>
                    <div class="form-group">
                        <label>Whatsapp</label>
                        <input type="text" name="whatsapp_link" class="form-control" id=""value="{{$profile->whatsapp_link}}">
                    </div>
                    <div class="form-group">
                        <label>X</label>
                        <input type="text" name="x_link" class="form-control" id=""value="{{$profile->x_link}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>

@endsection
