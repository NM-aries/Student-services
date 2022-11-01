<header class="sticky-top shadow-sm bg-white shadow">
    <div class="navbar navbar-expand-lg">
        <div class="container">
            <div class="logo mt-1 ">
                <a href="/">
                    <img src="{{ asset('images/logo/tan.png') }}" class=" d-none d-md-block" height="50">
                    <img src="{{ asset('images/logo/logo.png') }}" class="d-block d-md-none" height="50">
                </a>
            </div>
            <div class="d-flex navbar-dark mt-1 border-0">
                <form action="{{ url('search') }}" action="GET">
                    <div class="input-group me-2   ">
                        <input  type="text" name="search" class="bg-gray-200 form-control border-0 form-control-sm " placeholder="Search Here.." required autocomplete="off">
                        <button type="submit" class=" input-group-text border-0 btn-green" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                        
                    </div>
                </form>
                <button class="d-block mx-2 d-lg-none navbar-toggler text-danger" type="button" 
                    data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-text-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
                <div class="d-flex  navbar-dark text-right nav_clock d-md-block">
                    <a href="{{ url('login') }}"class=" btn btn-sm mx-2 btn-green">Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse d-lg-block" id="menu">
        <nav class="navbar navbar-expand-sm bg-green" >
            <div class="container">
                <ul class="navbar-nav _landing-nav text-white col-12 col-lg-6">
                    <li class="nav-item  me-1 {{ (request()->is('/')) ? 'is_active' : '' }}">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item me-1 {{ (request()->is('university_news*')) ? 'is_active' : '' }}">
                        <a href="{{ url('university_news') }}" class="nav-link ">News</a>
                    </li>
                    <li class="nav-item me-1 {{ (request()->is('university_announcements*')) ? 'is_active' : '' }}">
                        <a href="{{ url('university_announcements') }}" class="nav-link">Annoucements</a>
                    </li>
                    <li class="nav-item me-1 {{ (request()->is('university_services*')) ? 'is_active' : '' }}">
                        <a href="{{ url('university_services') }}" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item me-1 {{ (request()->is('university_events*')) ? 'is_active' : '' }}">
                        <a href="{{ url('university_events') }}" class="nav-link">Events</a>
                    </li>
                    
                    @if (request()->is('/'))
                        <li class="nav-item me-1">
                            <a href="#subscribe1" class="nav-link">Subscribe</a>
                        </li>
                    @else
                        <li class="nav-item me-1">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link">Subscribe</a>
                        </li>
                    @endif
                    
                </ul>
                <div class="d-flex text-white navbar-dark text-right nav_clock d-none d-md-block">
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-body bg-light-green">
                <section class="container _section1 ">
                    <div class="_header text-center">
                        <h2 class="text-white fw-bolder">Subscribe </h2>
                    </div>
                    <div class="row justify-content-center">
                       <div class="col-4 col-md-3 py-0">
                            <img src="{{ asset('images/icons/mail.png') }}" alt="">
                       </div>
                        <div class="col-12 col-md-12 m-auto align-middle ">
                            <div class="card-body text-center">
                                <p class="lead text-white">
                                 Want us to email you occasionally with EVSU news?
                                <br>Subscribe our newsletter to recieve the latest News and Announcements. </p>
                                <form action="{{ url('subscribe') }}" method="post">
                                    @csrf
                                    <div class="row ">
                                    
                                        <div class="col-6">
                                            <input name="email" type="email" class="rounded-0 form-control mb-3" placeholder="Email Address" autocomplete="off" required>
                                        </div>  
                                        <div class="col-6">
                                            <input name="name" type="text" class="rounded-0 form-control mb-3"  autocomplete="off"  placeholder="Name" required>
                                        </div>
                                        <div class="col-12">
                                            <button class="w-100 rounded-0 btn btn-green">Subscribe</button>    
                                        </div>                        
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </section>
            </div>
        </div>
    </div>
  </div>
