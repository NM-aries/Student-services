@extends('layouts.frontend')

@section('title', 'Seardh Results')

@section('content')

<div class="container-fluid bg-light shadow" id="title_container">
    <div class="container">
        <div class="header py-4">
            <h2 class="text-danger">Search Results: <i class="text-info">{{ request()->input('search') }}</i></h2>
        </div>
   </div>
</div>

<div class="container mb-5 mt-3" >
    <div class="row new_content ">
        <div class="col-lg-8 col-md-12 col-12 order-1 text-danger">
            @if($news->count())
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>News Search Result</h4>
                        @foreach ($news as $newsItem)
                            <div class="card mb-3 news">
                                <div class="row ">
                                    <div class="col-md-4 ">
                                        <div class="thumb m-auto" 
                                        @if($newsItem->coverimage) 
                                            style="background: url(upload/announcement/{{$newsItem->coverimage}});"
                                        @else
                                            style="background: url(assets/images/no-picture-available-icon-4.jpg);"
                                        @endif
                                        
                                        ></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$newsItem->title}}</h5>
                                            <p class="card-text">
                                                {!! Str::limit($newsItem->description, 150, $end=" .....") !!}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="btn mt-2 btn-outline-danger btn-sm" href="{{ url('university_news/'.$newsItem->slug) }}"> 
                                                    Continue Reading  
                                                </a>
                                                <p class="card-text"><small class="text-muted">Posted on {{$newsItem->created_at->format('M d, Y')}}</small></p>
                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            
            @if($announcement->count())
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>Announcement Search Result</h4>
                        @foreach ($announcement as $announcementItems)
                            <div class="card mb-3 news">
                                <div class="row ">
                                    <div class="col-md-4 ">
                                        <div class="thumb m-auto" 
                                        @if($announcementItems->coverimage) 
                                            style="background: url(upload/announcement/{{$announcementItems->coverimage}});"
                                        @else
                                            style="background: url(assets/images/no-picture-available-icon-4.jpg);"
                                        @endif
                                        
                                        ></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$announcementItems->title}}</h5>
                                            <p class="card-text">
                                                {!! Str::limit($announcementItems->description, 150, $end=" .....") !!}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="btn mt-2 btn-outline-danger btn-sm" href="{{ url('university_announcements/'.$announcementItems->slug) }}"> 
                                                    Continue Reading  
                                                </a>
                                                <p class="card-text"><small class="text-muted">Posted on {{$announcementItems->created_at->format('M d, Y')}}</small></p>
                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
    
            @if (!$announcement->count() && ! $news->count())
                <div class="card">
                    <div class="card-body p-5">
                        <img src="{{ asset('assets/images/icon/search_no_result.webp') }}" alt="" class="w-100">
                    </div>
                </div>
            @endif
    
       </div>
       <div class="col-lg-4 col-md-12 col-12 order-md-first order-lg-last " >
            @include('include/adds_on/side-row')
        </div>
    </div>
</div>
@endsection
