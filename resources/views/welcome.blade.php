@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- hero carousel --}}
<div class="_hero bg-gray-300 shadow-sm " >
    <div class="container pt-3 py-2"> 
        @include('include/_banner')
    </div>
</div>



{{-- NEws --}}
<div class="news_section"></div>
<div class="colour-block py-4">
    <section class="container _section1 ">
        <div class="_header text-center mb-3 ">
            <h2 class="news_header fw-bolder text-danger">Latest News</h2>
        </div>
        <div class="row justify-content-center">
            @if ($other_news->count())
                    <div class="col-md-12 mb-4">
                        <div class="owl-carousel owl-theme row">
                            @foreach ($other_news as $newsItems)
                                <div class="item"  style="width:100%">
                                    <div class="card p-0 border-0 bg-gray-100 " id="news">
                                        <div class="card-header p-0 _thumbnail">
                                            <div class="_thumb_home" style="background:url(upload/news/{{ $newsItems->coverimage }})">
                                            </div>
                                        </div>
                                        <div class="card-body p-0 shadow">
                                            <div class="title bg-danger p-3 text-white">
                                                <h2 class="fs-6 _news-title" >
                                                    {!! Str::limit($newsItems->title, 70) !!}
                                                </h2>
                                            </div>
                                            <div class="px-3 py-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <svg class="icon icon-xs text-gray-400 me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                          </svg>
                                                        <span class="small ">{{$newsItems->visit_count}}</span>
                                                    </div>
                                                    <div class="text-right">
                                                        <svg class="icon icon-xs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                                        <span class="small ">{{$newsItems->created_at->diffForHumans()}}</span>        
                                                    </div>
                                                </div>
                                                <p class="lead fs-6 ">
                                                    <div class="_news-description">{!! $newsItems->description !!}
                                                    </div>
                                                </p>
                                                <a href="{{ url('university_news/'.$newsItems->slug) }}"class="mb-3 btn btn-danger">
                                                    Continue Reading
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                
            @endif
        </div>

        <div class="button_readmore text-center">
            <a href="{{ url('university_news') }}" class="fs-6 btn btn-danger">Read More News</a>
        </div>
    </section>

</div>

{{-- Announcements --}}
<div class="announcements_section "></div>
<div class="white-block pb-5">
    <section class="container _section1 ">
        <div class="_header text-center mb-3 ">
            <h2 class="text-white fw-bolder">Announcements</h2>
        </div>
        <div class="row justify-content-center">
            @if ($other_announcements->count())
                    <div class="col-md-12 mb-4">
                        <div class="owl-carousel owl-theme row">
                            @foreach ($other_announcements as $announcemenetItems)
                                <div class="item"  style="width:100%">
                                    <div class="card p-0 border-0" id="news">
                                        <div class="card-header p-0 _thumbnail">
                                            <div class="_thumb_home" style="background:url(upload/announcement/{{ $announcemenetItems->coverimage }})">
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="title bg-gray p-3 text-white">
                                                <h2 class="fs-6 _news-title" >
                                                    {!! Str::limit($announcemenetItems->title, 70) !!}
                                                </h2>
                                            </div>
                                            <div class="px-3 py-2">
                                                <div class="row text-primary">
                                                    <div class="col-12 col-md-6 text-left">
                                                        <svg class="icon icon-xs text-gray-400 me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                          </svg>
                                                        <span class="small ">{{$announcemenetItems->visit_count}}</span>
                                                    </div>
                                                    <div class="col-12 col-md-6 text-right">
                                                        <svg class="icon icon-xs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                                        <span class="small ">{{$announcemenetItems->created_at->diffForHumans()}}</span>
                                                    </div>
                                                    
                                                </div>
                                
                                                
                                                <p class="lead fs-6 ">
                                                    <div class="_news-description text-primary">{!! $announcemenetItems->description !!}
                                                    </div>
                                                </p>
                                                <a href="{{ url('university_announcements/'.$announcemenetItems->slug) }}"class="mb-3 btn text-white bg-danger">
                                                    Continue Reading
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                
            @endif
        </div>
        <div class="button_readmore text-center">
            <a href="{{ url('university_announcements') }}" class="fs-6 btn btn-secondary">Read More Announcements</a>
        </div>
    </section>
</div>

{{-- //About --}}
<div class="skew-c"></div>
<div class="colour-block py-4">
    <section class="container _section1 ">
        <div class="_header text-center mb-3 ">
            <h2 class="news_header fw-bolder text-danger">About</h2>
        </div>
        <div class="text-danger text-center">
            <h2 class="fs-2">VISION</h6>
            <p class="fs-6 lead">A Leading State University in Technological and Professional Education.</p> 
        </div>
        <div class="text-danger text-center py-3">
            <h2 class="fs-2">MISSION</h6>
            <p class="fs-6 lead">Develop a Strong Technologically and Professionally Competent Productive Human Resource Imbued with Positive Values Needed to Propel Sustainable Development.</p> 
        </div>
        <div class="text-danger text-center ">
            <h2 class="fs-2">CORE VALUES</h6>
            <p class="fs-6  lead">
                <b class="fs-4 text-danger">E</b>XCELLENCE <br>
                <b class="fs-4 text-danger">V</b>ALUE-LADEN <br>
                <b class="fs-4 text-danger">S</b>ERVICE-DRIVEN <br>
                <b class="fs-4 text-danger">U</b>NITY IN DIVERSITY <br>
            </p> 
        </div>
    </section>
</div>

{{-- SUBSCRIBE --}}
<div class="announcements_section "></div>
<div class="white-block pb-5">
    <section class="container _section1 ">
        <div class="_header text-center mb-3 ">
            <h2 class="text-white fw-bolder">Subscribe </h2>
        </div>
        <div class="row justify-content-center">
           <div class="col-5 col-md-3 py-0">
                <img src="{{ asset('images/icons/mail.png') }}" alt="">
           </div>
           <div class="col-12 col-md-9 m-auto align-middle ">
            <div class="card-body ">
                <p class="lead text-white">
                    Want us to email you occasionally with EVSU news?
                    <br>Subscribe our newsletter to recieve the latest News and Announcements. </p>
                <form action="{{ url('subscribe') }}" method="post">
                    @csrf
                    <div class="row ">
                       
                        <div class="col-5">
                            <input name="email" type="email" class="rounded-0 form-control mb-3" placeholder="Email Address" autocomplete="off" required>
                        </div>  
                        <div class="col-5">
                            <input name="name" type="text" class="rounded-0 form-control mb-3"  autocomplete="off"  placeholder="Name" required>
                        </div>
                        <div class="col-auto right-0">
                            <button class="rounded-0 btn bg-gray text-white">Subscribe</button>    
                        </div>                        
                    </div>
                </form>
            </div>
       </div>
           
        </div>
    </section>
</div>

@endsection

@section('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            margin:30,
            nav:true,
            navText:['<button type="button" class="btn btn-secondary slider-left-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16"><path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/></svg></button>','<button type="button" class="btn btn-secondary slider-right-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16"><path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/></svg></button>'],
            dots:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:1,
                },
                768:{
                items:2.5,
                },
                1000:{
                    items:3,
                }
            }
        })
    </script>
@endsection
