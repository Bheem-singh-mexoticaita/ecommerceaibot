<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">CATALOG</li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Product Management</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.all.category') }}">Category</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.all.subcategory') }}"> SubCategory</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.all.product') }}"> Product</a></li>

                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ServicesManagement" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Services  Management</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ServicesManagement">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.all.services') }}"> All Services</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.add.services') }}"> Add Services </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#shiipingFunctionalty" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Shipping Management</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="shiipingFunctionalty">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.shipping.index') }}">All Shipping</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.shipping.create') }}"> Add Shipping</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category">USERS</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#genral_setting" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Customer Management</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="genral_setting">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.view.customers') }}">Customer Index</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.coupon.create') }}">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Coupon Management</span>
              </a>
            </li>
            <li class="nav-item nav-category">GENERAL SETTING</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#genral_setting" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">General  Settings</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="genral_setting">
                <ul class="nav flex sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.view.contact') }}">Contact Messages</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.setting.create') }}">Site Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.paymentmethod') }}">Payment Methods</a></li>
                </ul>
              </div>
            </li>
           
         
          </ul>
        </nav>
