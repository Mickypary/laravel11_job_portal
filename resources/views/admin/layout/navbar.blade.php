<div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline me-auto">
                <ul class="navbar-nav me-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="nav-link">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-warning">Front End</a>
                </li>
                <li class="dropdown">

                    <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- Dropdown link --}}
                        <img alt="image" src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" class="rounded-circle-custom">
                        <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('admin')->user()->name }}</div>
                      </a>
                    
                      <ul class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('admin_profile') }}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Edit Profile
                        </a>
                        <a href="{{ route('admin_logout') }}" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                      </ul>
                </li>
            </ul>
        </nav>