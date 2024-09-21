@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>About</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.about.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">

                                <label>Content</label>
                                <textarea name="content" class="summernote">{!!@$about->content!!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
