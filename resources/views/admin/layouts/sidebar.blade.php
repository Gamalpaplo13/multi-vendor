<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">Take Over</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">||</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Starter</li>

            <li
                class="dropdown {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
                <a class="nav-link has-dropdown" href="#" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="{{ setActive(['admin.sub-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
                    <li class="{{ setActive(['admin.child-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.child-category.index') }}">Child Category</a></li>
                </ul>
            </li>
            <li class="dropdown {{ setActive(['admin.manage-user']) }}">
                <a class="nav-link has-dropdown" href="#" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.manage-user']) }}"><a class="nav-link"
                            href="{{ route('admin.manage-user') }}">Manage User</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ setActive([
                    'admin.order.*',
                    'admin.pending',
                    'admin.processed',
                    'admin.shipped',
                    'admin.deliverd',
                    'admin.canceld',
                ]) }}">
                <a class="nav-link has-dropdown" href="#" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.order.*']) }}"><a class="nav-link"
                            href="{{ route('admin.order.index') }}">All Orders</a></li>
                    <li class="{{ setActive(['admin.pending']) }}"><a class="nav-link"
                            href="{{ route('admin.pending-orders') }}">All Pending Orders</a></li>
                    <li class="{{ setActive(['admin.processed']) }}"><a class="nav-link"
                            href="{{ route('admin.processed-orders') }}">All Processed Orders</a></li>
                    <li class="{{ setActive(['admin.shipped']) }}"><a class="nav-link"
                            href="{{ route('admin.shipped-orders') }}">All Shipped Orders</a></li>
                    <li class="{{ setActive(['admin.deliverd']) }}"><a class="nav-link"
                            href="{{ route('admin.deliverd-orders') }}">All Deliverd Orders</a></li>
                    <li class="{{ setActive(['admin.canceld']) }}"><a class="nav-link"
                            href="{{ route('admin.canceld-orders') }}">All Canceld Orders</a></li>
                </ul>
            </li>

            <li><a class="nav-link {{ setActive(['admin.transaction']) }}" href="{{ route('admin.transaction') }}"><i
                        class="far fa-square"></i><span>Transactions</span></a></li>

            <li class="dropdown {{ setActive(['admin.vendor-profile.*', 'admin.shipping-rule.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-profile.index') }}">Vendor Profile</a></li>
                    <li class="{{ setActive(['admin.shipping-rule.*']) }}"><a class="nav-link"
                            href="{{ route('admin.shipping-rule.index') }}">Shipping Rule</a></li>
                </ul>
            </li>


            <li class="dropdown {{ setActive(['admin.slider.*', 'admin.about.index', 'admin.terms.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage website</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider.index') }}">Slider</a></li>
                    <li class="{{ setActive(['admin.home-page-setting.*']) }}"><a class="nav-link"
                            href="{{ route('admin.home-page-setting') }}">Home Page Setting</a></li>
                    <li class="{{ setActive(['admin.about.index']) }}"><a class="nav-link"
                            href="{{ route('admin.about.index') }}">About</a></li>
                    <li class="{{ setActive(['admin.terms.index']) }}"><a class="nav-link"
                            href="{{ route('admin.terms.index') }}">Terms and Conditions</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.flash-sale.*', 'admin.coupon.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Manage Sales</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.flash-sale.*']) }}"><a class="nav-link"
                            href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
                    <li class="{{ setActive(['admin.coupon.*']) }}"><a class="nav-link"
                            href="{{ route('admin.coupon.index') }}">Coupons </a></li>
                </ul>
            </li>


            <li class="dropdown {{ setActive(['admin.brand.*', 'admin.product.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Manage Products</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.brand.*']) }}"><a class="nav-link"
                            href="{{ route('admin.brand.index') }}">Brand</a></li>
                    <li class="{{ setActive(['admin.product.*']) }}"><a class="nav-link"
                            href="{{ route('admin.product.index') }}">Product</a></li>
                </ul>

            <li><a class="nav-link {{ setActive(['admin.setting.*']) }}"
                    href="{{ route('admin.setting.index') }}"><i class="far fa-square"></i><span>Settings</span></a>
            </li>
            </li>
        </ul>
    </aside>
</div>
