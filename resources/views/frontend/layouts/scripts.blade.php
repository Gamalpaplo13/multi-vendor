<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // add product into cart
        $('.shopping-cart-form').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    if (data.status == 'success') {
                        getCartCount();
                        fetchSidebarCartProducts();
                        $('.mini_cart_actions').removeClass('d-none');
                        toastr.success(data.message);
                    } else if (data.status == 'stock_out') {
                        toastr.error(data.message);
                    }
                },
                error: function(data) {

                }
            })
        })

        function getCartCount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.cart-count') }}",
                success: function(data) {
                    $('#cart-count').text(data);
                },
                error: function(data) {

                }
            })
        }

        function fetchSidebarCartProducts() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.cart-prosucts') }}",
                success: function(data) {
                    $('.mini_cart_wrapper').html("");
                    var html = '';
                    for (let item in data) {
                        let product = data[item];
                        html += `
                            <li id="mini_cart_${product.rowId}">
                                <div class="wsus__cart_img">
                                    <a href="{{ url('product-detail') }}/${product.options.slug}"><img src="{{ asset('/') }}${product.options.image}" alt="product" class="img-fluid w-100"></a>
                                    <a class="wsis__del_icon remove_sidebar_item" data-id="${product.rowId}" href=""><i
                                        class="fas fa-minus-circle"></i></a>
                                <div class="wsus__cart_text">
                                    <a class="wsus__cart_title" href="#">${product.name}</a>
                                    <p>${product.price}{{ $settings->currency_icon }} </p>
                                    <small>Variants Total:${product.options.variants_total}{{ $settings->currency_icon }}</small>
                                    <br>
                                    <small>Quantity: ${product.qty}</small>
                                </div>
                            </li>`;
                    }
                    $('.mini_cart_wrapper').html(html);

                    getSidebarCartSubTotal();
                },
                error: function(data) {

                }
            })
        }

        //remove product from sidebar
        $('body').on('click', '.remove_sidebar_item', function(event) {
            event.preventDefault();
            let rowId = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: "{{ route('cart.remove-siderbar-product') }}",
                data: {
                    rowId: rowId
                },
                success: function(data) {
                    let productId = '#mini_cart_' + rowId;
                    $(productId).remove();
                    getSidebarCartSubTotal();
                    if ($('.mini_cart_wrapper').find('li').length == 0) {
                        $('.mini_cart_actions').addClass('d-none');
                        $('.mini_cart_wrapper').html(
                            '<li class="text-center">Cart Is Empty</li>');
                        getCartCount();
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        // get sidebar cart subtotal
        function getSidebarCartSubTotal() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.siderbar-product-total') }}",
                success: function(data) {
                    $('#mini_cart_subtotal').text(data +
                        "{{ $settings->currency_icon }}");
                },
                error: function(data) {

                }
            })
        }

        // add product to wishlist

        $('.add_to_wishlist').on('click', function(event){
            event.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: "{{route('user.wishlist.store')}}",
                data:{
                    id: id
                },
                success: function(data){
                    if(data.status == 'success'){
                        $('#wishlist_count').text(data.count);
                        toastr.success(data.message);
                    }else if(data.status == 'error'){
                        toastr.error(data.message);
                    }
                },
                error: function(data){
                    console.log(data);
                }
            })
        })
    })
</script>
