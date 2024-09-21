@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Coupon</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Coupon</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.coupon.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" id=""value="">
                                </div>
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" name="code" class="form-control" id=""value="">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" class="form-control" id=""value="">
                                </div>
                                <div class="form-group">
                                    <label>Max Use For Person</label>
                                    <input type="text" name="max_use" class="form-control" id=""value="">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input type="date" name="start_date" class="form-control"
                                                id=""value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <input type="date" name="end_date" class="form-control"
                                                id=""value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Discount Type</label>
                                            <select id="inputState" class="form-control" name="discount_type">
                                                <option value="percent">Percentage (%)</option>
                                                <option value="amount">Amount ( {{ $settings->currency_icon }})</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Discount Value</label>
                                            <input type="text" name="discount" class="form-control"
                                                id=""value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
