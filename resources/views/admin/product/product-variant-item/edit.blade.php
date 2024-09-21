@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Variant Item</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Variant-Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant-item.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Variant Name</label>
                                    <input type="text" name="variant_name" class="form-control"
                                        id=""value="{{ $variantItem->productVariant->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" name="name" class="form-control"
                                        id=""value="{{ $variantItem->name }}">
                                </div>

                                <div class="form-group">
                                    <label>Price<code>(Set 0 for make it free)</code></label>
                                    <input type="text" name="price" class="form-control"
                                        id=""value="{{ $variantItem->price }}">
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Is Default</label>
                                    <select id="inputState" class="form-control" name="is_default">
                                        <option value="1">Select</option>
                                        <option {{ $variantItem->is_default == 1 ? 'selected' : '' }} value="1">Yes
                                        </option>
                                        <option {{ $variantItem->is_default == 0 ? 'selected' : '' }}value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{ $variantItem->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $variantItem->status == 0 ? 'selected' : '' }} value="0">Inactive
                                        </option>
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
