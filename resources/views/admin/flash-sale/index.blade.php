@extends('admin.layouts.master')


@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Flash Sale</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Flash-Sales Product</h4>
                        </div>
                        <div class="card-body">
                            <h5>Flash Sale End Date</h5>
                            <form action="{{ route('admin.flash-sale.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="">
                                    <div class="form-group">
                                        <label>Sale End Date</label>
                                        <input type="date" name="end_date" class="form-control" id=""
                                            value="{{ $flashSale->end_date }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Flash-Sales Product</h4>
                            <div class="card-header-action">

                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.flash-sale.add-product') }}" method="POST">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label>Add Product</label>
                                        <select name="product" id="" class="form-control select2">
                                            <option value="">Select</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Show At Home?</label>
                                                <select name="show_at_home" id="" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="" class="form-control select2">
                                                    <option value="">Select</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Flash-Sales Product</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.flash-sale.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
            /*Change show at home*/
            $('body').on('click', '.change-at-home', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.flash-sale.show-at-home') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
