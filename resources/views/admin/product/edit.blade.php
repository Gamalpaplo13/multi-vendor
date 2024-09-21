@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img src="{{ $product->thumb_image }}" alt="" style="width: 200px">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" id=""
                                        value="{{ $product->name }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Category</label>
                                            <select id="inputState" class="form-control main-category" name="category_id">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Sub Category</label>
                                            <select id="inputState" class="form-control sub-category"
                                                name="sub_category_id">
                                                <option value="">Select</option>
                                                @foreach ($subCategories as $subCategory)
                                                    <option
                                                        {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}
                                                        value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Child Category</label>
                                            <select id="inputState" class="form-control child-category"
                                                name="child_category_id">
                                                <option value="">Select</option>
                                                @foreach ($childCategories as $childCategory)
                                                    <option
                                                        {{ $childCategory->id == $product->child_category_id ? 'selected' : '' }}
                                                        value="{{ $childCategory->id }}">{{ $childCategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Brand</label>
                                    <select id="inputState" class="form-control" name="brand_id">
                                        <option value="">Select</option>
                                        @foreach ($brands as $brand)
                                            <option {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                                                value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sku</label>
                                    <input type="text" name="sku" class="form-control" id=""
                                        value="{{ $product->sku }}">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" id=""
                                        value="{{ $product->price }}">
                                </div>

                                <div class="form-group">
                                    <label>Offer Price</label>
                                    <input type="text" name="offer_price" class="form-control" id=""
                                        value="{{ $product->offer_price }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Offer Start Date</label>
                                            <input type="date" name="offer_start_date" class="form-control"
                                                id="" value="{{ $product->offer_start_date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Offer End Date</label>
                                            <input type="date" name="offer_end_date" class="form-control" id=""
                                                value="{{ $product->offer_end_date }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control" id=""
                                        value="{{ $product->quantity }}">
                                </div>

                                <div class="form-group">
                                    <label>Video link</label>
                                    <input type="url" name="video_link" class="form-control" id=""
                                        value="{{ $product->video_link }}">
                                </div>

                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="short_description" class="form-control" value="">{!! $product->short_description !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Long Description</label>
                                    <textarea name="long_description" class="form-control summernote" value="">{!! $product->long_description !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Product type</label>
                                    <select id="inputState" class="form-control" name="product_type">
                                        <option value="">Select</option>
                                        <option {{ $product->product_type == 'new_arrival' ? 'selected' : '' }} value="new_arrival">
                                            New Arrival</option>
                                        <option {{ $product->product_type == 'featured_product' ? 'selected' : '' }}
                                            value="featured_product">Featured</option>
                                        <option {{ $product->product_type == 'top_product' ? 'selected' : '' }} value="top_product">
                                            Top Product</option>
                                        <option {{ $product->product_type == 'best_product' ? 'selected' : '' }} value="best_product">
                                            Best Product</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Seo title</label>
                                    <input type="text" name="seo_title" class="form-control" id=""
                                        value="{{ $product->seo_title }}">
                                </div>
                                <div class="form-group">
                                    <label>Seo description</label>
                                    <textarea name="seo_description" class="form-control summernote" value="">{!! $product->seo_description !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{$product->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$product->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('body').on('change', '.main-category', function(e) {

                    //if i select category and change it sub and child categories will be reset
                    $('.child-category').html('<option value="">Select</option>')

                    let id = $(this).val();
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('admin.product.get-sub-categories') }}",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            $('.sub-category').html('<option value="">Select</option>')
                            $.each(data, function(i, item) {
                                $('.sub-category').append(
                                    `<option value="${item.id}">${item.name}</option>`)
                            })
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    })
                })
                // get child gategories
                $('body').on('change', '.sub-category', function(e) {
                    let id = $(this).val();
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('admin.product.get-child-categories') }}",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            $('.child-category').html('<option value="">Select</option>')
                            $.each(data, function(i, item) {
                                $('.child-category').append(
                                    `<option value="${item.id}">${item.name}</option>`)
                            })
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    })
                })
            })
        </script>
    @endpush
@endsection
