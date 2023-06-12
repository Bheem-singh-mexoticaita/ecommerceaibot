<header class="header_wrap">
      <div class="top_bar">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="top_bar_inner">
                <li>
                  <a href="tel:61481991111" class="">
                    <div class="icon_img">
                      <img alt="img" src="{{ asset('frontend/assets/img/phone.png') }}" />
                    </div>
                    <span>+61 481 991 111</span>
                  </a>
                </li>
                <li>
                  <a href="mailto:bluelotustats@gmail.com">
                    <div class="icon_img">
                      <img alt="img" src="{{ asset('frontend/assets/img/mail.png') }}" />
                    </div>
                    <span>bluelotustats@gmail.com</span>
                  </a>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>
      <div class="bottom_header">
        <div class="container">
          <div class="main_header_flex">
            <div class="site_logo">
              <a href="" class="header-logo"
                ><img src="{{ asset('frontend/assets/img/logo.png') }}"
              /></a>
            </div>
            <div class="main_navbar_menu">
              <ul class="menu">
                <li>
                  <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                  <a href="{{ route('aboutus') }}">About</a>
                </li>
                <li>
                  <a href="#">Product</a>
                </li>
                <li>
                  <a href="{{ route('shop') }}">Shop</a>
                </li>
                <li>
                  <a href="#">Accessories</a>
                </li>
                <li>
                  <a href="{{ route('contactusform') }}">Contact Us</a>
                </li>
              </ul>
              <ul class="shop_details">
                <li>
                  <a href="#"><img src="{{ asset('frontend/assets/img/search.png') }}" /></a>
                </li>
                <li>
                  <a href="{{route('cart.index')}}"><img src="{{ asset('frontend/assets/img/bag.png') }}" />

                    <span class='badge badge-warning' id='lblCartCount'> {{ count((array) session('cart')) }} </span>
                  </a>
                </li>
                <li>
                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item dropdown">

                    <a href="#"  class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="{{ asset('frontend/assets/img/profile.png') }}" />  @auth  {{ Auth::user()->name }}  @endauth   </a>
                        <div class="dropdown-menu dropdown-menu-end">
                        @if (Route::has('user.login'))
                    @auth
                    <a href="{{route('user.dashboard')}}" class="dropdown-item">Dashboard</a>
                    <a href="javascript:void(0)" id="logout_functionbalty" class="dropdown-item">Logout </a>
              <input type="hidden" name="logout_action_url" id="logout_action_url" value="{{ route('user.logout') }}">
              <input type="hidden" name="logout_user_id" id="logout_user_id" value="{{ Auth::user()->id }}">
                    @else
                    <a href="{{route('user.login')}}" class="dropdown-item">Login</a>
                        <input type="hidden" name="user_id" id="user_id" value=""/>
                        @if (Route::has('user.register'))
                        <a href="{{route('user.register')}}" class="dropdown-item">Register</a>
                        @endif
                    @endauth

            @endif
                        </div>
                    </li>
                </ul>
                </li>

              </ul>

            </div>
          </div>
        </div>
      </div>
    </header>
