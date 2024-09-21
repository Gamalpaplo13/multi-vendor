@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Cart
@endsection

@section('content')
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                                                                                                                                                                BREADCRUMB END
                                                                                                                                                                            ==============================-->


    <!--============================
                                                                                                                                                                                CART VIEW PAGE START
                                                                                                                                                                            ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr c lass="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Unit price
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Total
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>


                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>
                                    @foreach ($cartItems as $item)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img src="{{ asset($item->options->image) }}"
                                                    alt="product" class="img-fluid w-100">
                                            </td>
                                            <td class="wsus__pro_name">
                                                <p>{{ $item->name }}</p>
                                                @foreach ($item->options->variants as $key => $variantItem)
                                                    <span>{{ $key }}: {{ $variantItem['name'] }}
                                                        {{ $variantItem['price'] . $settings->currency_icon }}</span>
                                                @endforeach
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6>{{ $item->price . $settings->currency_icon }}</h6>
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6 id="{{ $item->rowId }}">
                                                    {{ ($item->price + $item->options->variants_total) * $item->qty . $settings->currency_icon }}
                                                </h6>
                                            </td>

                                            <td class="wsus__pro_select">
                                                <form class="">
                                                    <div class="product_qty_wrapper">
                                                        <button class="btn btn-danger product-decrement">-</button>
                                                        <input class="product-qty" data-rowid="{{ $item->rowId }}"
                                                            type="text" min="1" max="100"
                                                            value="{{ $item->qty }}" readonly />
                                                        <button class="btn btn-success product-increment">+</button>
                                                    </div>
                                                </form>
                                            </td>


                                            <td class="wsus__pro_icon">
                                                <a href="{{ route('cart.remove-product', $item->rowId) }}"><i
                                                        class="far fa-times"></i></a>
                                            </td>
                                    @endforeach
                                    @if (count($cartItems) == 0)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_icon" style="width: 100%">
                                                Cart is empty!
                                            </td>
                                        </tr>
                                    @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="sub_total">{{ getCartTotal() }}{{ $settings->currency_icon }}</span></p>
                        <p>discount: <span id="discount">{{ getMainCartTotal() }}{{ $settings->currency_icon }}</span>
                        </p>
                        <p class="total"><span>total:</span> <span
                                id="cart_total">{{getCartDiscount()}}{{ $settings->currency_icon }}</span></p>

                        <form id="coupon_form">
                            <input type="text" placeholder="Coupon Code" name="coupon_code"
                                value="{{ session()->has('coupon') ? session()->get('coupon')['coupon_code'] : '' }}">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="{{route('user.checkout')}}">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="{{ url('/') }}"><i
                                class="fab fa-shopify"></i>Keep Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // product quantity increment
            $('.product-increment').on('click', function() {
                event.preventDefault();
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) + 1;
                let rowId = input.data('rowid');
                input.val(quantity);

                $.ajax({
                    url: "{{ route('cart.update-quantity') }}",
                    method: 'POST',
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            let productId = '#' + rowId;
                            let totalAmount = data.product_total +
                                "{{ $settings->currency_icon }}";
                            $(productId).text(totalAmount);
                            renderCartSubTotal();
                            calculateCouponDiscount();
                        } else if (data.status == 'stock_out') {
                            toastr.error(data.message)
                        }
                    },
                    error: function(data) {

                    }
                })
            })

            // product quantity decrement
            $('.product-decrement').on('click', function() {
                event.preventDefault();
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;
                let rowId = input.data('rowid');

                if (quantity < 1) {
                    quantity = 1;
                }

                input.val(quantity);

                $.ajax({
                    url: "{{ route('cart.update-quantity') }}",
                    method: 'POST',
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            let productId = '#' + rowId;
                            let totalAmount = data.product_total +
                                "{{ $settings->currency_icon }}";
                            $(productId).text(totalAmount);
                            renderCartSubTotal();
                            calculateCouponDiscount();
                            // toastr.success(data.message);
                        } else if (data.status == 'stock_out') {
                            toastr.error(data.message)
                        }
                    },
                    error: function(data) {

                    }
                })
            })

            //clear cart
            $('.clear_cart').on('click', function(event) {
                event.preventDefault();

                $.ajax({
                    type: 'get',
                    url: "{{ route('cart.clear-cart') }}",
                    success: function(data) {
                        if (data.status == 'success') {
                            window.location.reload();
                        }
                    },
                    error: function(data) {

                    }
                })
            })

            // get total cart subtotal
            // this function will only return flat value
            function renderCartSubTotal() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.siderbar-product-total') }}",
                    success: function(data) {
                        $('#sub_total').text(data + "{{ $settings->currency_icon }}");
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }

            // apply coupon on cart
            $('#coupon_form').on('submit', function(event) {
                event.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('cart.apply-coupon') }}",
                    data: formData,
                    success: function(data) {
                        if (data.status == 'error') {
                            toastr.error(data.message);
                        } else if (data.status == 'success') {
                            calculateCouponDiscount();
                            toastr.success(data.message);
                        }
                    },
                    error: function(data) {

                    }
                })
            })

            function calculateCouponDiscount() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('cart.coupon-calculation') }}",
                    success: function(data) {
                        if (data.status == 'success') {
                            $('#discount').text(data.discount + "{{ $settings->currency_icon }}");
                            $('#cart_total').text(data.cart_total + "{{ $settings->currency_icon }}");
                        }
                    },
                    error: function(data) {

                    }
                })
            }
        })
    </script>
@endpush
