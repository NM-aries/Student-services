@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- hero carousel --}}
<div class="_hero bg-gray-300 shadow-sm " >
    <div class="container pt-3 py-2"> 
        @include('include/_banner')
    </div>
</div>

<div class="container mb-3">
    <div class="row pt-3">
        <div class="col-12 col-md-8 col-lg-8 container mb-3">
            <div class="bg-white pb-5 mt-4 ">
                <section class="container _section1 p-0 ">
                    <div class="_header text-start mb-3 bg-green px-4">
                        <h3 class="text-white fw-bolder">Latest Announcements</h3>
                    </div>
                    <div class="row justify-content-center px-4">
                        @if ($other_announcements->count())
                                <div class="col-md-12 mb-4">
                                    <div class="owl-carousel owl-theme row">
                                        @foreach ($other_announcements as $announcemenetItems)
                                            <div class="item "  style="width:100%">
                                                <div class="card shadow-md p-0 border-0 bg-gray-100" id="news">
                                                    <div class="card-header p-0 _thumbnail">
                                                        <div class="_thumb_home" style="background:url(upload/announcement/{{ $announcemenetItems->coverimage }})">
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="title bg-green p-3 text-white">
                                                            <h2 class="fs-6 _news-title" >
                                                                {!! Str::limit($announcemenetItems->title, 70) !!}
                                                            </h2>
                                                        </div>
                                                        <div class="px-3 py-2">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="text-left">
                                                                    <svg class="icon icon-xs text-gray-400 me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>
                                                                    <span class="small ">{{$announcemenetItems->visit_count}}</span>
                                                                </div>
                                                                <div class="text-right">
                                                                    <svg class="icon icon-xs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                                                    <span class="small ">{{$announcemenetItems->created_at->diffForHumans()}}</span>        
                                                                </div>
                                                            </div>
                                                            
                                                            <p class="lead fs-6 ">
                                                                <div class="_news-description text-primary">{!! $announcemenetItems->description !!}
                                                                </div>
                                                            </p>
                                                            <a href="{{ url('university_announcements/'.$announcemenetItems->slug) }}"class="mb-3 btn btn-green">
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
                    <div class="button_readmore text-end px-4">
                        <a href="{{ url('university_announcements') }}" class="fs-6 btn btn-green">View Announcement Archive</a>
                    </div>
                </section>
            </div>
            <div class="bg-white  pb-5">
                <section class="container _section1 p-0 ">
                    <div class="_header text-start mb-3 bg-green px-4">
                        <h3 class="news_header fw-bolder text-white">Latest News</h3>
                    </div>
                    <div class="row justify-content-start px-4">
                        @if ($other_news->count())
                                <div class="col-md-12 mb-4">
                                    <div class="owl-carousel owl-theme row">
                                        @foreach ($other_news as $newsItems)
                                            <div class="item bg-white shadow"  style="width:100%;">
                                                <div class="card shadow-md p-0 border-0 bg-gray-100" id="news">
                                                    <div class="card-header p-0 _thumbnail">
                                                        <div class="_thumb_home" style="background:url(upload/news/{{ $newsItems->coverimage }})">
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="title bg-green p-3 text-white">
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
                                                            <a href="{{ url('university_news/'.$newsItems->slug) }}"class="mb-3 btn btn-green">
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
            
                    <div class="button_readmore text-end px-4">
                        <a href="{{ url('university_news') }}" class="fs-6 btn btn-green">View News Archives</a>
                    </div>
                </section>
            
            </div>
            
            {{-- Announcements --}}
            
        </div>

        <div class="col-lg-4 col-md-4 col-12 ">
            <div class=" h-auto">                
                <div class="col-12 bg-white p-0 pb-5">
                    <section class="container _section1 p-0 ">
                        <div class="_header text-start mb-3 bg-green px-4">
                            <h3 class="news_header fw-bolder text-white">Quick Links</h3>
                        </div>
                        <div class="row px-4">
                            <a href="https://apps.evsu.edu.ph/" class="col-12 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2019/06/apps-image-v2.jpg" class="shadow w-100">
                            </a>
                            
                            <a href="https://apps.evsu.edu.ph/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2019/06/uc-optimized.jpg" class="shadow w-100">
                            </a>
                            
                            <a href="http://emap.evsu.edu.ph/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2019/07/emap-icon-2.jpg" class="shadow w-100">
                            </a>
    
                            <a href="https://lms.evsu.edu.ph/login/index.php" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2019/06/moodle-optimized.jpg" class="shadow w-100">
                            </a>
    
                            <a href="http://opac.evsu.edu.ph/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2019/06/opac-optimized.jpg" class="shadow w-100">
                            </a>
    
                            <a href="https://www.evsu.edu.ph/calendar/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2019/07/school-calendar-icon.jpg" class="shadow w-100">
                            </a>
    
                            <a href="https://www.foi.gov.ph/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2019/06/freedom-of-information.jpg" class="shadow w-100">
                            </a>
    
                            <a href="https://www.evsu.edu.ph/internationalization/go-negosyo-center/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2021/11/Go-Negosyo-Center-Logo.png" class="shadow w-100">
                            </a>
                            <a href="https://www.evsu.edu.ph/enhancing-response-to-current-and-future-pandemics-through-science-technology-and-innovation/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2021/09/70th-SouvProg-V7-icon-1.png" class="shadow w-100">
                            </a>
                            {{-- / --}}
                            <a href="https://www.evsu.edu.ph/guidelines-in-the-conduct-of-synchronized-special-election-of-campus-alumni-association-and-federation-of-alumni-association/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2021/09/Guidelines-in-the-conduct-of-synchronized-special-election.png" class="shadow w-100">
                            </a>
    
                            <a href="https://www.evsu.edu.ph/dict-digital-signature-application/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2021/10/Digital-Signature-Application-Icon.png" class="shadow w-100">
                            </a>
    
                            <a href="https://www.evsu.edu.ph/university-faculty-opportunities/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2022/04/Opportunities-for-faculty-icon.png" class="shadow w-100">
                            </a>
    
                            <a href="https://www.evsu.edu.ph/university-students-opportunities/" class="col-6 p-2">
                                <img src="https://www.evsu.edu.ph/wp-content/uploads/2022/04/Opportunities-for-student-icon.png" class="shadow w-100">
                            </a>
                        </div>
                    </section>
                </div>
            </div>
            
        </div>
    </div>
</div>


            {{-- //About --}}
<div class="bg-white shadow">
    <section class="container _section1 ">
        <div class="row">
            <div class="col-md-4">
                <div class="align-middle py-5">
                    <img src="{{ asset('images/logo/logo.png') }}" class="img-fluid">
                </div>
            </div>
            <div class="col-md-8">
                <div class="bg-white py-5">
                    <section class="container _section1 ">
                        <div class="text-black text-start">
                            <h3 class="fs-4 fw-bolder c-text-green">VISION</h3>
                            <p class="fs-6 fw-normal lead">A Leading State University in Technological and Professional Education.</p> 
                        </div>
                        <div class="text-black text-start py-3">
                            <h3 class="fs-4 fw-bolder c-text-green">MISSION</h3>
                            <p class="fs-6 fw-normal lead">Develop a Strong Technologically and Professionally Competent Productive Human Resource Imbued with Positive Values Needed to Propel Sustainable Development.</p> 
                        </div>
                        <div class="text-black text-start ">
                            <h3 class="fs-4 fw-bolder c-text-green">CORE VALUES</h3>
                            <p class="fs-6 lead">
                                <b class="fs-5  c-text-green">E</b>-<span class="fw-normal">XCELLENCE </span><br>
                                <b class="fs-5  c-text-green">V</b>-<span class="fw-normal">ALUE-LADEN </span><br>
                                <b class="fs-5  c-text-green">S</b>-<span class="fw-normal">ERVICE-DRIVEN </span><br>
                                <b class="fs-5  c-text-green">U</b>-<span class="fw-normal">NITY IN DIVERSITY </span><br>
                            </p> 
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- SUBSCRIBE --}}
<div class="bg-gray py-5" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
    <section class="container _section1 " id="subscribe1">
        <div class="row justify-content-center">
        
            <div class="col-12 col-md-8 m-auto align-middle ">
                <div class="card-body ">
                    <div class="_header text-start  ">
                        <h3 class="c-text-green fw-bolder">Subscribe </h3>
                    </div>
                    <p class="lead text-black">
                    Want us to email you occasionally with EVSU news?
                    <br>Subscribe our newsletter to recieve the latest News and Announcements. </p>
                    <form action="{{ url('subscribe') }}" method="post">
                        @csrf
                        <div class="row ">
                        
                            <div class="col-5">
                                <input name="email" type="email" class=" form-control mb-3" placeholder="Email Address" autocomplete="off" required>
                            </div>  
                            <div class="col-5">
                                <input name="name" type="text" class=" form-control mb-3"  autocomplete="off"  placeholder="Name" required>
                            </div>
                            <div class="col-auto right-0">
                                <button class=" btn btn-green">Subscribe</button>    
                            </div>                        
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-5 col-md-4 mt-5">
                <img src="{{ asset('images/icons/mail.png') }}" alt="">
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
                    items:1.5,
                },
                600:{
                    items:1.5,
                },
                768:{
                items:2,
                },
                1000:{
                    items:2.8,
                }
            }
        })
    </script>

    <script>
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        var radius = canvas.height / 2;
        ctx.translate(radius, radius);
        radius = radius * 0.90
        setInterval(drawClock, 1000);
        
        function drawClock() {
          drawFace(ctx, radius);
          drawNumbers(ctx, radius);
          drawTime(ctx, radius);
        }
        
        function drawFace(ctx, radius) {
          var grad;
          ctx.beginPath();
          ctx.arc(0, 0, radius, 0, 2*Math.PI);
          ctx.fillStyle = 'white';
          ctx.fill();
          grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
          grad.addColorStop(0, '#333');
          grad.addColorStop(0.5, 'white');
          grad.addColorStop(1, '#333');
          ctx.strokeStyle = grad;
          ctx.lineWidth = radius*0.1;
          ctx.stroke();
          ctx.beginPath();
          ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
          ctx.fillStyle = '#333';
          ctx.fill();
        }
        
        function drawNumbers(ctx, radius) {
          var ang;
          var num;
          ctx.font = radius*0.15 + "px arial";
          ctx.textBaseline="middle";
          ctx.textAlign="center";
          for(num = 1; num < 13; num++){
            ang = num * Math.PI / 6;
            ctx.rotate(ang);
            ctx.translate(0, -radius*0.85);
            ctx.rotate(-ang);
            ctx.fillText(num.toString(), 0, 0);
            ctx.rotate(ang);
            ctx.translate(0, radius*0.85);
            ctx.rotate(-ang);
          }
        }
        
        function drawTime(ctx, radius){
            var now = new Date();
            var hour = now.getHours();
            var minute = now.getMinutes();
            var second = now.getSeconds();
            //hour
            hour=hour%12;
            hour=(hour*Math.PI/6)+
            (minute*Math.PI/(6*60))+
            (second*Math.PI/(360*60));
            drawHand(ctx, hour, radius*0.5, radius*0.07);
            //minute
            minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
            drawHand(ctx, minute, radius*0.8, radius*0.07);
            // second
            second=(second*Math.PI/30);
            drawHand(ctx, second, radius*0.9, radius*0.02);
        }
        
        function drawHand(ctx, pos, length, width) {
            ctx.beginPath();
            ctx.lineWidth = width;
            ctx.lineCap = "round";
            ctx.moveTo(0,0);
            ctx.rotate(pos);
            ctx.lineTo(0, -length);
            ctx.stroke();
            ctx.rotate(-pos);
        }
        </script>
@endsection
