<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="/">
        <img class="navbar-brand-dark" src="{{ asset('images/logo/logo.png') }}" /> 
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div class="collapse-close d-md-none">
            <a href="#sidebarMenu" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                aria-label="Toggle navigation">
                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <div class="nav-link d-flex justify-content-center align-items-center mb-3 p-1">
                <span class="sidebar-icon">
                    <img src="{{ asset('images/logo/logo1.png') }}" alt="Volt Logo">
                </span>
                
            </div>
            <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}" class="nav-link">
                    <img src="{{ asset('images/icons/dashboard.webp') }}" alt="" class="sidebar_icon">
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/announcement*')) ? 'active' : '' }}">
                <a href="{{ url('admin/announcement') }}" class="nav-link">
                    <img src="{{ asset('images/icons/announcement.webp') }}" alt="" class="sidebar_icon">                    
                    <span class="sidebar-text">Announcement</span>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/news*')) ? 'active' : '' }}">
                <a href="{{ url('admin/news') }}" class="nav-link">
                    <img src="{{ asset('images/icons/news.webp') }}" alt="" class="sidebar_icon">
                    <span class="sidebar-text">News</span>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/services*')) ? 'active' : '' }}">
                <a href="{{ url('admin/services') }}"class="nav-link">
                    <img src="{{ asset('images/icons/services.webp') }}" alt="" class="sidebar_icon">
                    <span class="sidebar-text">Services</span>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/banner*')) ? 'active' : '' }}">
                <a href="{{ url('admin/banner') }}" class="nav-link">
                    <img src="{{ asset('images/icons/banner.webp') }}" alt="" class="sidebar_icon">
                    <span class="sidebar-text">Banner</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/events*')) ? 'active' : '' }}">
                <a href="{{ url('admin/events') }}" class="nav-link">
                    <img src="{{ asset('images/icons/events.png') }}" alt="" class="sidebar_icon">
                    <span class="sidebar-text">Events</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/feedback*')) ? 'active' : '' }}">
                <a href="{{ url('admin/feedback') }}" class="nav-link">
                    <img src="{{ asset('images/icons/Feedback-264x264.png') }}" alt="" class="sidebar_icon">
                    <span class="sidebar-text">Feedback</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/subscribers*')) ? 'active' : '' }}">
                <a href="{{ url('admin/subscribers') }}" class="nav-link">
                    <img src="{{ asset('images/icons/Mailbox-264x264.png') }}" alt="" class="sidebar_icon">
                    <span class="sidebar-text">Subscribers</span>
                </a>
            </li>
            
            
            
            @if (Auth::user()->is_admin == 1)
                <li class="nav-item {{ (request()->is('admin/user*')) ? 'active' : '' }}">
                    <a href="{{ url('admin/users') }}" class="nav-link">
                        <img src="{{ asset('images/icons/profile.png') }}" alt="" class="sidebar_icon"> 
                        <span class="sidebar-text">Users</span>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('admin/logs')) ? 'active' : '' }}">
                    <a href="{{ url('admin/logs') }}" class="nav-link">
                        <img src="{{ asset('images/icons/logs.webp') }}" alt="" class="sidebar_icon"> 
                        <span class="sidebar-text">Activity Logs</span>
                    </a>
                </li>

                
                
            @endif

            
        </ul>
    </div>
</nav>