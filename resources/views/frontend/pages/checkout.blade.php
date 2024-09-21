@extends('frontend.layouts.master')


@section('content')
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li><a href="javascript:;">check out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="wsus__cart_view">
        <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            <h5>Shipping Details <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                                    new address</a></h5>
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-12">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Phone *">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="email" placeholder="Email *">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <select class="select_2" name="state">
                                            <option value="AL">Country / Region *</option>
                                            <option value="">dhaka</option>
                                            <option value="">barisal</option>
                                            <option value="">khulna</option>
                                            <option value="">rajshahi</option>
                                            <option value="">bogura</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Apartment, suite, unit, etc. (optional)">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="City *">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Goverment *">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Postal Code">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <div class="accordion checkout_accordian" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    <div class="wsus__check_single_form">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Same as shipping address
                                                            </label>
                                                        </div>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body p-0">
                                                    <div class="wsus__check_form p-0" style="box-shadow: none;">
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="First Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Last Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text"
                                                                        placeholder="Company Name (Optional)">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <select class="select_2" name="state">
                                                                        <option value="AL">Country / Region *</option>
                                                                        <option value="">dhaka</option>
                                                                        <option value="">barisal</option>
                                                                        <option value="">khulna</option>
                                                                        <option value="">rajshahi</option>
                                                                        <option value="">bogura</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="State *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Town / City *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Street Address *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Zip *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="text" placeholder="Phone *">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="wsus__check_single_form">
                                                                    <input type="email" placeholder="Email *">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                @foreach ($userAddress as $address)
                                    <div class="col-xl-6">
                                        <div class="wsus__checkout_single_address">
                                            <div class="form-check">
                                                <input class="form-check-input shipping_address" type="radio"
                                                    name="flexRadioDefault" id="flexRadioDefault1"
                                                    data-id="{{ $address->id }}">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Select Address
                                                </label>
                                            </div>
                                            <ul>
                                                <li><span>Name :</span>{{ $address->name }}</li>
                                                <li><span>Phone :</span>{{ $address->phone }}</li>
                                                <li><span>Email :</span>{{ $address->email }}</li>
                                                <li><span>Country :</span>{{ $address->countery }}</li>
                                                <li><span>City :</span>{{ $address->city }}</li>
                                                <li><span>Zip Code :</span>{{ $address->zip }}</li>
                                                <li><span>Address :</span>{{ $address->address }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">
                            <p class="wsus__product">shipping Methods</p>
                            @foreach ($shippingMethods as $method)
                                @if ($method->type == 'min_cost' && getCartTotal() >= $method->min_cost)
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" data-id="{{ $method->cost }}"
                                            type="radio" name="exampleRadios" id="exampleRadios1"
                                            value="{{ $method->id }}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{ $method->name }}
                                            <span>cost: {{ $method->cost }}{{ $settings->currency_icon }}</span>
                                        </label>
                                    </div>
                                @elseif ($method->type == 'flat_cost')
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" data-id="{{ $method->cost }}"
                                            type="radio" name="exampleRadios" id="exampleRadios1"
                                            value="{{ $method->id }}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{ $method->name }}
                                            <span>cost: {{ $method->cost }}{{ $settings->currency_icon }}</span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                            <div class="wsus__order_details_summery">
                                <p>subtotal: <span>{{ getCartTotal() }}{{ $settings->currency_icon }}</span></p>
                                <p>shipping fee: <span id="shipping_fee">+0{{ $settings->currency_icon }}</span></p>
                                <p>coupon: <span>-{{ getCartDiscount() }}{{ $settings->currency_icon }}</span></p>
                                <p><b>total:</b>
                                    <span><b id="total_amount"
                                            data-id="{{ getMainCartTotal() }}">{{ getMainCartTotal() }}{{ $settings->currency_icon }}</b></span>
                                </p>
                            </div>
                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        I have read and agree to the website <a href="#">terms and conditions *</a>
                                    </label>
                                </div>
                            </div>
                            <form action="" id="check_out_form">
                                <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                                <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">
                            </form>
                            <a href="" id="submit_checkout_form" class="common_btn">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <form action="{{ route('user.checkout.address.create') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Name *" name="name"
                                                value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Phone *" name="phone"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="email" placeholder="Email *" name="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <select class="select_2" name="countery"  value="">
                                                </option>
                                                @foreach (config('settings.country_list') as $key => $countery)
                                                    <option
                                                        value="{{ $key }}">{{ $countery }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Goverment *" name="goverment"
                                                value="{{ old('goverment') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="City *" name="city"
                                                value="{{ old('city') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Postal Code" name="zip"
                                                value="{{ old('zip') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Address *" name="address"
                                                value="{{ old('address') }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[type="radio"]').prop('checked', false)
            $('#shipping_method_id').val("");
            $('#shipping_address_id').val("");
            $('.shipping_method').on('click', function() {
                let shippingFee = $(this).data('id');
                let currentTotalAmount = $('#total_amount').data('id');
                let totalAmount = currentTotalAmount + shippingFee;

                $('#shipping_method_id').val($(this).val());
                $('#shipping_fee').text(shippingFee + "{{ $settings->currency_icon }}")
                $('#total_amount').text(totalAmount + "{{ $settings->currency_icon }}")
            })

            $('.shipping_address').on('click', function() {
                $('#shipping_address_id').val($(this).data('id'));
            })

            //submit checkout form

            $('#submit_checkout_form').on('click',function(event){
                event.preventDefault();
                if($('#shipping_method_id').val() == ""){
                    toastr.error('Shipping Method is required');
                }else if($('#shipping_address_id').val() == ""){
                    toastr.error('Shipping address is required');
                }else if(!$('.agree_term').prop('checked')){
                    toastr.error('You have to agree website terms and conditions');
                }else {
                    $.ajax({
                        url:"{{route('user.checkout.form-submit')}}",
                        method:'POST',
                        data: $('#check_out_form').serialize(),
                        beforeSend: function(){
                            $('#submit_checkout_form').html('<i class="fas fa-spinner fa-spin fa-1x"></i>');
                        },
                        success: function(data){
                            if(data.status == 'success'){
                                $('#submit_checkout_form').text('Place Order');
                                //redirect user to payment page
                                window.location.href = data.redirect_url;
                            }
                        },
                        error: function(data){

                        }
                    })
                }

            })
        })
    </script>
@endpush
