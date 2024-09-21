@php
    $popularCategories = json_decode($popularCategory->value, true);
@endphp

<section id="wsus__monthly_top" class="wsus__monthly_top_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="wsus__monthly_top_banner">
                    <div class="wsus__monthly_top_banner_img">
                        <img src="images/monthly_top_img3.jpg" alt="img" class="img-fluid w-100">
                        <span></span>
                    </div>
                    <div class="wsus__monthly_top_banner_text">
                        <h4>Black Friday Sale</h4>
                        <h3>Up To <span>70% Off</span></h3>
                        <H6>Everything</H6>
                        <a class="shop_btn" href="#">shop now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header for_md">
                    <h3>Top Categories</h3>
                    <div class="monthly_top_filter">
                        @php
                            $products = [];
                        @endphp
                        @foreach ($popularCategories as $key => $popularCategory)
                            @php
                                $subCategory = \App\Models\SubCategory::find($popularCategory['sub_category']);
                                $products[] = \App\Models\Product::where(
                                    'sub_category_id',
                                    $popularCategory['sub_category'],
                                )
                                    ->orderBy('id', 'desc')
                                    ->take(12)
                                    ->get();
                            @endphp
                            @if ($subCategory)
                                <button class="{{ $loop->index == 0 ? 'auto_click active' : ''}}" data-filter=".category-{{$key}}">{{ $subCategory->name }}</button>
                            @else
                                <!-- Handle case where subcategory is not found -->
                                {{-- <button data-filter=".cloth">Unknown Category</button> --}}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row grid">
                    @foreach ($products as $key => $product)
                        @foreach ($product as $item)
                            <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3  category-{{$key}}">
                                <a class="wsus__hot_deals__single" href="#">
                                    <div class="wsus__hot_deals__single_img">
                                        <img src="{{ asset($item->thumb_image) }}" alt="bag"
                                            class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__hot_deals__single_text">
                                        <h5>{!! limitText($item->name) !!}</h5>
                                        <p class="wsus__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </p>
                                        @if (checkDiscount($item))
                                            <p class="wsus__tk">
                                                {{ $item->offer_price }}{{ $settings->currency_icon }}<del>{{ $item->price }}{{ $settings->currency_icon }}</del>
                                            </p>
                                        @else
                                            <p class="wsus__tk">
                                                {{ $item->offer_price }}{{ $settings->currency_icon }}
                                            </p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
