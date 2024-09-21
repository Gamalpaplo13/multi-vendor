@extends('admin.layouts.master')

@section('content')

    <!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Manage User</h1>

      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Create User</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.manage-user.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" id=""value="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" id=""value="">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" id=""value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id=""value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Role</label>
                        <select id="inputState" class="form-control" name="role">
                            <option value="">Select</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
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
