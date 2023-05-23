<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.php">
            <div class="logo-img">
                <img src="img/white_logo.png" class="header-brand-img" alt="" style="width: 50px;"> 
            </div>
            <span class="text pl-3">Terra Sunny</span>
        </a>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Navigation</div>
                <div class="nav-item {{ ( request()  -> is('/') ) ? 'active': ''  }}">
                    <a href="{{ url('/') }}"><i class="ik ik-bar-chart"></i><span>Dashboard</span></a>
                </div>
                <div class="nav-item {{ ( request()  -> is('bookings*') ) ? 'active': ''  }}">
                    <a href="{{ url('/bookings') }}"><i class="ik ik-clock"></i><span>Bookings</span> </a>
                </div>
                <div class="nav-item {{ ( request()  -> is('customers*') ) ? 'active': ''  }}">
                    <a href="{{ url('/customers-menu') }}"><i class="ik ik-users"></i><span>Customers</span></a>
                </div>
                <div class="nav-item {{ ( request()  -> is('reviews*') ) ? 'active': ''  }}">
                    <a href="{{ url('/reviews-menu') }}"><i class="ik ik-star"></i><span>Reviews</span> </a>
                </div>
                <div class="nav-item {{ ( request()  -> is('business*') || request()  -> is('services*') ) ? 'active': ''  }}">
                    <a href="{{ url('/business-menu') }}"><i class="ik ik-settings"></i><span>Business</span> </a>
                </div>

                <div class="nav-lavel">Support</div>
                <div class="nav-item">
                    <a href="help"><i class="ik ik-monitor"></i><span>Contact Support</span></a>
                </div>
                <div class="nav-item">
                    <a href="bugs"><i class="ik ik-help-circle"></i><span>Report Issue</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>