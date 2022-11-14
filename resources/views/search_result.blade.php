@extends('layouts.app')

@section('title', 'Seardh Results')

@section('content')


<div class="container-fluid bg-light-green shadow" id="title_container">
    <div class="container">
        <div class="header py-3">
            <h2 class="text-white">Search Result of: <i class="text-white">{{ request()->input('search') }}</i></h2>
        </div>
   </div>
</div>

<div class="container mb-5 mt-3" >
    <div class="row new_content ">
        <div class="col-lg-10 col-md-12 col-12 order-1">
            @if($news->count())
                <div class="card mt-3 text-black">
                    <div class="card-body">
                        <h3 class="text-black">News</h3>
                        @foreach ($news as $newsItem)
                            <div class="card mb-3 news ">
                                <div class="row ">
                                    <div class="col-md-4 ">
                                        <div class="thumb m-auto" 
                                        @if($newsItem->coverimage) 
                                            style="background: url(upload/news/{{$newsItem->coverimage}});"
                                        @else
                                            style="background: url(assets/images/no-picture-available-icon-4.jpg);"
                                        @endif
                                        
                                        ></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-black">{{$newsItem->title}}</h5>
                                            <p class="card-text">
                                                {!! Str::limit($newsItem->description, 150, $end=" .....") !!}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="btn mt-2 bg-green text-white btn-sm" href="{{ url('university_news/'.$newsItem->slug) }}"> 
                                                    Continue Reading  
                                                </a>
                                                <p class="card-text"><small class="text-muted">Posted on {{$newsItem->created_at->format('M d, Y')}}</small></p>
                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $news->links() }}
                    </div>
                </div>
            @endif
            
            @if($announcement->count())
                <div class="card mt-3">
                    <div class="card-body">
                        <h3>Announcement </h3>
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
                        {{ $announcement->links() }}
                    </div>
                </div>
            @endif

            @if($events->count())
                <div class="card mt-3">
                    <div class="card-body">
                        <h3>Events </h3>
                        @foreach ($events as $eventsItems)
                            <div class="card mb-3 news">
                                <div class="row ">
                                    <div class="col-md-4 ">
                                        <div class="thumb m-auto" 
                                        @if($eventsItems->coverimage) 
                                            style="background: url(upload/announcement/{{$eventsItems->coverimage}});"
                                        @else
                                            style="background: url(assets/images/no-picture-available-icon-4.jpg);"
                                        @endif
                                        
                                        ></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$eventsItems->title}}</h5>
                                            <p class="card-text">
                                                {!! Str::limit($eventsItems->description, 150, $end=" .....") !!}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a class="btn mt-2 btn-outline-danger btn-sm" href="{{ url('university_events/'.$eventsItems->title) }}"> 
                                                    Continue Reading  
                                                </a>
                                                <p class="card-text"><small class="text-muted">Posted on {{$eventsItems->created_at->format('M d, Y')}}</small></p>
                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $announcement->links() }}
                    </div>
                </div>
            @endif
    
            @if (!$announcement->count() && ! $news->count())
                <div class="card">
                    <div class="card-body p-0">
                        <img src="{{ asset('images/others/no result.webp') }}" alt="" class="w-100">
                    </div>
                </div>
            @endif
    
       </div>
       
    </div>
</div>
@endsection
