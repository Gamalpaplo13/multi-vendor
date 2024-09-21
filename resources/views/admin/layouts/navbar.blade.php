<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{asset(auth()->user()->image)}}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Logged in 5 min ago</div>
          <a href="{{route('admin.profile')}}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Activities
          </a>
          <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a>
          <div class="dropdown-divider"></div>

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();"  class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </form>
        </div>
      </li>
    </ul>
  </nav>
