@extends('frontend.layouts.master')


@section('content')
     <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>products</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
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
        PRODUCT PAGE START
    ==============================-->
    <section id="wsus__product_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pro_page_bammer">
                        <img src="{{asset('frontend/images/pro_banner_1.jpg')}}" alt="banner" class="img-fluid w-100">
                        <div class="wsus__pro_page_bammer_text">
                            <div class="wsus__pro_page_bammer_text_center">
                                <p>up to <span>70% off</span></p>
                                <h5>wemen's jeans Collection</h5>
                                <h3>fashion for wemen's</h3>
                                <a href="#" class="add_cart">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="wsus__sidebar_filter ">
                        <p>filter</p>
                        <span class="wsus__filter_icon">
                            <i class="far fa-minus" id="minus"></i>
                            <i class="far fa-plus" id="plus"></i>
                        </span>
                    </div>
                    <div class="wsus__product_sidebar" id="sticky_sidebar">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        All Categories
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($categories as $category)
                                            <li><a href="{{route('products.index',['category'=>$category->slug])}}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Price
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="price_ranger">
                                            <form action="{{url()->current()}}">
                                                @foreach (request()->query() as $key => $value)
                                                    @if($key !== 'range')
                                                        <input type="hidden"  name="{{$key}}" value="{{$value}}"/>
                                                    @endif
                                                @endforeach
                                                <input type="hidden" id="slider_range" name="range"  class="flat-slider" />
                                                <button type="submit" class="common_btn">filter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree2" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        size
                                    </button>
                                </h2>
                                <div id="collapseThree2" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                small
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                medium
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked2">
                                            <label class="form-check-label" for="flexCheckChecked2">
                                                large
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree3">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree3" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        brand
                                    </button>
                                </h2>
                                <div id="collapseThree3" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault11">
                                            <label class="form-check-label" for="flexCheckDefault11">
                                                gentle park
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked22">
                                            <label class="form-check-label" for="flexCheckChecked22">
                                                colors
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked222">
                                            <label class="form-check-label" for="flexCheckChecked222">
                                                yellow
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked33">
                                            <label class="form-check-label" for="flexCheckChecked33">
                                                enice man
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked333">
                                            <label class="form-check-label" for="flexCheckChecked333">
                                                plus point
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree">
                                        color
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefaultc1">
                                            <label class="form-check-label" for="flexCheckDefaultc1">
                                                black
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckCheckedc2">
                                            <label class="form-check-label" for="flexCheckCheckedc2">
                                                white
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckCheckedc3">
                                            <label class="form-check-label" for="flexCheckCheckedc3">
                                                green
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckCheckedc4">
                                            <label class="form-check-label" for="flexCheckCheckedc4">
                                                pink
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckCheckedc5">
                                            <label class="form-check-label" for="flexCheckCheckedc5">
                                                red
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-xl-12 d-none d-md-block mt-md-4 mt-lg-0">
                            <div class="wsus__product_topbar">
                                <div class="wsus__product_topbar_left">
                                    <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link {{session()->has('product_list_style') && session()->get('product_list_style') == 'grid' ? 'active' : ''}}  {{!session()->has('product_list_style') ? 'active' : ''}}  list-view" data-id="grid" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="true">
                                            <i class="fas fa-th"></i>
                                        </button>
                                        <button class="nav-link list-view  {{session()->has('product_list_style') && session()->get('product_list_style') == 'list' ? 'active' : ''}}" data-id="list" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="false">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                    </div>
                                    <div class="wsus__topbar_select">
                                        <select class="select_2" name="state">
                                            <option>default shorting</option>
                                            <option>short by rating</option>
                                            <option>short by latest</option>
                                            <option>low to high </option>
                                            <option>high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="wsus__topbar_select">
                                    <select class="select_2" name="state">
                                        <option>show 12</option>
                                        <option>show 15</option>
                                        <option>show 18</option>
                                        <option>show 21</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade {{session()->has('product_list_style') && session()->get('product_list_style') === 'grid' ? 'show active' : ''}} {{!session()->has('product_list_style') ? 'show active' : ''}}" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-xl-4  col-sm-6">
                                        <div class="wsus__product_item">
                                            <span class="wsus__new">{{ checkProductType($product->product_type) }}</span>
                                            @if (checkDiscount($product))
                                            <span class="wsus__minus">-{{ discountPercent($product->price, $product->offer_price) }}%</span>
                                            @endif
                                            <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
                                                <img src="{{ asset($product->thumb_image) }}" alt="product" class="img-fluid w-100 img_1" />
                                                <img src="
                                                        @if (isset($product->productImageGalleries[0]->image)) {{ asset($product->productImageGalleries[0]->image) }}
                                                        @else
                                                        {{ asset($product->thumb_image) }} @endif
                                                    " alt="product" class="img-fluid w-100 img_2" />
                                            </a>
                                            <ul class="wsus__single_pro_icon">
                                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#product-{{ $product->id }}"><i
                                                            class="far fa-eye"></i></a></li>
                                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#"><i class="far fa-random"></i></a>
                                            </ul>
                                            <div class="wsus__product_details">
                                                <a class="wsus__category" href="#">{{ $product->category->name }}</a>
                                                <p class="wsus__pro_rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <span>(133 review)</span>
                                                </p>
                                                <a class="wsus__pro_name" href="{{ route('product-detail', $product->slug) }}">{{
                                                    $product->name }}</a>
                                                @if (checkDiscount($product))
                                                <p class="wsus__price">{{ $product->offer_price }}LE<del>{{ $product->price }}LE
                                                    </del>
                                                </p>
                                                @else
                                                <p class="wsus__price">{{ $product->price }}LE</p>
                                                @endif
                                                <form class="shopping-cart-form">
                                                    <div class="wsus__selectbox">
                                                        <div class="row">
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            @foreach ($product->variants as $variant)
                                                            @if ($variant->status !== 0)
                                                            <div class="col-xl-6 col-sm-6">
                                                                <h5 class="mb-2">{{ $variant->name }}</h5>
                                                                <select class="select_2" name="variants_items[]">
                                                                    @foreach ($variant->productVariantItem as $variantItem)
                                                                    @if ($variantItem->status !== 0)
                                                                    <option value="{{ $variantItem->id }}" {{ $variantItem->is_default == 1
                                                                        ? 'selected' : '' }}>
                                                                        @if ($variantItem->price > 0)
                                                                        {{ $variantItem->name }}
                                                                        ({{ $variantItem->price }}EGP)
                                                                    </option>
                                                                    @else
                                                                    {{ $variantItem->name }}</option>
                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="wsus__quentity">
                                                        <h5>quentity :</h5>
                                                        <div class="select_number">
                                                            <input class="number_area" type="text" min="1" max="100" value="1"
                                                                name="quantity" />
                                                        </div>
                                                    </div>
                                                    <ul class="wsus__button_area">
                                                        <li><button type="submit" class="add_cart" href="#">add to cart</button></li>
                                                        <li><a class="buy_now" href="#">buy now</a></li>
                                                        <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="far fa-random"></i></a></li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade {{session()->has('product_list_style') && session()->get('product_list_style') === 'list' ? 'show active' : ''}}" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-xl-12">
                                        <div class="wsus__product_item wsus__list_view">
                                            <span class="wsus__new">{{ checkProductType($product->product_type) }}</span>
                                            @if (checkDiscount($product))
                                            <span class="wsus__minus">-{{ discountPercent($product->price, $product->offer_price) }}%</span>
                                            @endif
                                            <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
                                                <img src="{{ asset($product->thumb_image) }}" alt="product"
                                                    class="img-fluid w-100 img_1" />
                                                <img src="@if (isset($product->productImageGalleries[0]->image)) {{ asset($product->productImageGalleries[0]->image) }}
                                                @else
                                                {{ asset($product->thumb_image) }} @endif" alt="product"
                                                    class="img-fluid w-100 img_2" />
                                            </a>
                                            <div class="wsus__product_details">
                                                <a class="wsus__category" href="#">{{ $product->category->name }} </a>
                                                <p class="wsus__pro_rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <span>(17 review)</span>
                                                </p>
                                                <a class="wsus__pro_name" href="{{ route('product-detail', $product->slug) }}">{{
                                                    $product->name }}</a>
                                                @if (checkDiscount($product))
                                                <p class="wsus__price">{{ $product->offer_price }}LE<del>{{ $product->price }}LE
                                                    </del>
                                                </p>
                                                @else
                                                <p class="wsus__price">{{ $product->price }}LE</p>
                                                @endif
                                                <p class="list_description">Ultrices eros in cursus turpis massa cursus
                                                    mattis. Volutpat ac tincidunt vitae semper quis lectus. Aliquam id
                                                    diam maecenas ultricies… </p>
                                                <ul class="wsus__single_pro_icon">
                                                    <form class="shopping-cart-form">
                                                        <div class="wsus__selectbox">
                                                            <div class="row">
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                @foreach ($product->variants as $variant)
                                                                @if ($variant->status !== 0)
                                                                <div class="col-xl-6 col-sm-6">
                                                                    <h5 class="mb-2">{{ $variant->name }}</h5>
                                                                    <select class="select_2" name="variants_items[]">
                                                                        @foreach ($variant->productVariantItem as $variantItem)
                                                                        @if ($variantItem->status !== 0)
                                                                        <option value="{{ $variantItem->id }}" {{ $variantItem->is_default == 1
                                                                            ? 'selected' : '' }}>
                                                                            @if ($variantItem->price > 0)
                                                                            {{ $variantItem->name }}
                                                                            ({{ $variantItem->price }}EGP)
                                                                        </option>
                                                                        @else
                                                                        {{ $variantItem->name }}</option>
                                                                        @endif
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="wsus__quentity">
                                                            <h5>quentity :</h5>
                                                            <div class="select_number">
                                                                <input class="number_area" type="text" min="1" max="100" value="1"
                                                                    name="quantity" />
                                                            </div>
                                                        </div>
                                                        <ul class="wsus__button_area">
                                                            <li><button type="submit" class="add_cart mr-2" href="#">add to cart</button></li>
                                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                                            <li><a href="#"><i class="far fa-random"></i></a></li>
                                                        </ul>
                                                    </form>
                                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="far fa-random"></i></a>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <section id="pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link page_active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        PRODUCT PAGE END
    ==============================-->

        @foreach ($products as $product)
        <section class="product_popup_modal">
            <div class="modal fade" id="product-{{ $product->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times"></i></button>
                            <div class="row">
                                <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                    <div class="wsus__quick_view_img">
                                        <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                            href="https://youtu.be/7m16dFI1AF8">
                                            <i class="fas fa-play"></i>
                                        </a>
                                        <div class="row modal_slider">
                                            <div class="col-xl-12">
                                                <div class="modal_slider_img">
                                                    <img src="images/zoom1.jpg" alt="product" class="img-fluid w-100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="wsus__pro_details_text">
                                        <a class="title" href="{{ route('product-detail', $product->slug) }}">{{ $product->name
                                            }}</a>
                                        <p class="wsus__stock_area"><span class="in_stock">in stock</span> (167 item)</p>
                                        <h4>$50.00 <del>$60.00</del></h4>
                                        <p class="review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>20 review</span>
                                        </p>
                                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                                        <div class="wsus_pro_hot_deals">
                                            <h5>offer ending time : </h5>
                                            <div class="simply-countdown simply-countdown-one"></div>
                                        </div>
                                        <div class="wsus_pro_det_color">
                                            <h5>color :</h5>
                                            <ul>
                                                <li><a class="blue" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                                <li><a class="orange" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                                <li><a class="yellow" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                                <li><a class="black" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                                <li><a class="red" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="wsus_pro__det_size">
                                            <h5>size :</h5>
                                            <ul>
                                                <li><a href="#">S</a></li>
                                                <li><a href="#">M</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">XL</a></li>
                                            </ul>
                                        </div>
                                        <form class="shopping-cart-form">
                                            <div class="wsus__selectbox">
                                                <div class="row">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    @foreach ($product->variants as $variant)
                                                    @if ($variant->status !== 0)
                                                    <div class="col-xl-6 col-sm-6">
                                                        <h5 class="mb-2">{{ $variant->name }}</h5>
                                                        <select class="select_2" name="variants_items[]">
                                                            @foreach ($variant->productVariantItem as $variantItem)
                                                            @if ($variantItem->status !== 0)
                                                            <option value="{{ $variantItem->id }}" {{ $variantItem->is_default
                                                                == 1 ? 'selected' : '' }}>
                                                                @if ($variantItem->price > 0)
                                                                {{ $variantItem->name }}
                                                                ({{ $variantItem->price }}EGP)
                                                            </option>
                                                            @else
                                                            {{ $variantItem->name }}</option>
                                                            @endif
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="wsus__quentity">
                                                <h5>quentity :</h5>
                                                <div class="select_number">
                                                    <input class="number_area" type="text" min="1" max="100" value="1"
                                                        name="quantity" />
                                                </div>
                                            </div>
                                            <ul class="wsus__button_area">
                                                <li><button type="submit" class="add_cart" href="#">add to cart</button></li>
                                                <li><a class="buy_now" href="#">buy now</a></li>
                                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                                <li><a href="#"><i class="far fa-random"></i></a></li>
                                            </ul>
                                        </form>
                                        <p class="brand_model"><span>model :</span> 12345670</p>
                                        <p class="brand_model"><span>brand :</span> The Northland</p>
                                        <div class="wsus__pro_det_share">
                                            <h5>share :</h5>
                                            <ul class="d-flex">
                                                <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a>
                                                </li>
                                                <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
@endsection

@push('scripts')

        <script>
            $(document).ready(function(){
                $('.list-view').on('click',function(){
                    let style = $(this).data('id');

                    $.ajax({
                        method: 'GET',
                        url: "{{route('change-product-list-view')}}",
                        data: {
                            style: style
                        },
                        success: function(data){
                            console.log(data);
                        },
                        error: function(){

                        },
                    })
                })
            })

            @php
            if(request()->has('range')){
                $price = explode(';', request()->range);
                $from = $price[0] ? $price[0] : 0;
                $to = $price[1] ? $price[1] : 2000;
            }else {
                $from = 0;
                $to = 2000;
            }
            @endphp

    jQuery(function () {
        jQuery("#slider_range").flatslider({
            min: 0, max: 10000,
            step: 100,
            values: [{{$from}}, {{$to}}],
            range: true,
            einheit: '{{$settings->currency_icon}}'
        });
    });
        </script>

@endpush


