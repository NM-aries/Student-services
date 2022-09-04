<header class="sticky-top shadow-sm bg-primary">
    <div class="navbar navbar-expand-lg">
        <div class="container">
            <div class="logo mt-1 ">
                <a href="/">
                    <img src="{{ asset('images/logo/logowhite.png') }}" class=" d-none d-md-block" height="50">
                    <img src="{{ asset('images/logo/logo.png') }}" class="d-block d-md-none" height="50">
                </a>
            </div>
            <div class="d-flex navbar-dark mt-1">
                <form action="{{ url('search') }}" action="GET">
                    <div class="input-group me-2 ">
                            <input  type="text" name="search" class="form-control form-control-sm " placeholder="Search Here..">
                            <button type="submit" class="input-group-text btn-secondary" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        
                    </div>
                </form>
                <button class="d-block d-lg-none navbar-toggler text-white" type="button" 
                    data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-text-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="collapse d-lg-block" id="menu">
        <nav class="navbar  bg-secondary navbar-expand-sm  " >
            <div class="container">
                <ul class="navbar-nav _landing-nav ">
                    <li class="nav-item  me-1 {{ (request()->is('/')) ? 'active' : '' }}">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item me-1 {{ (request()->is('university_news*')) ? 'active' : '' }}">
                        <a href="{{ url('university_news') }}" class="nav-link ">News</a>
                    </li>
                    <li class="nav-item me-1 {{ (request()->is('university_announcements*')) ? 'active' : '' }}">
                        <a href="{{ url('university_announcements') }}" class="nav-link">Annoucements</a>
                    </li>
                    <li class="nav-item me-1 {{ (request()->is('university_services*')) ? 'active' : '' }}">
                        <a href="{{ url('university_services') }}" class="nav-link">Services</a>
                    </li>
                </ul>
                <div class="d-flex navbar-dark text-right nav_clock d-none d-md-block">
                    <span class="fs-6 fw-bolder">Philippines Standard Time:</h6>
                    <div class="fw-normal">
                        <span id="date"></span>,
                        <span id="time"></span>
                    </div>   
                </div>
            </div>
        </nav>
    </div>
    

</header>

