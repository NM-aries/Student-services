@extends('layouts.app')

@section('title', 'Announcements Archive')

@section('content')


<div class="container-fluid bg-gray-600 shadow" id="title_container">
    <div class="container">
        <div class="header py-3">
            <h2 class="text-white">ANNOUNCEMENTS </h2>
        </div>
   </div>
</div>

<div class="container mb-5 mt-4" >
    <div class="row new_content ">
        <div class="col-12 order-1 ">
            @if ($allAnnouncement->count())
                @foreach ($allAnnouncement as $listAnnouncement )
                    <div class="card mb-3 news">
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="thumb m-auto" 
                                @if($listAnnouncement->coverimage) 
                                    style="background: url(upload/announcement/{{$listAnnouncement->coverimage}});"
                                @else
                                    style="background: url(assets/images/no-picture-available-icon-4.jpg);"
                                @endif
                                
                                ></div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$listAnnouncement->title}}</h5>
                                    <p class="card-text lead">
                                        {!! Str::limit($listAnnouncement->description, 150, $end=" .....") !!}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="btn mt-2 btn-outline-danger btn-sm" href="{{ url('university_announcements/'.$listAnnouncement->slug) }}"> 
                                            Continue Reading  
                                        </a>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                <svg class="icon icon-xs text-gray-400 me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                </svg>
                                                <span>Views {{$listAnnouncement->visit_count}}</span>
                                            </small><br>
                                            <small class="text-muted ">
                                                <svg class="icon icon-xs text-gray-400 me-1 mt-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                                </svg>
                                                <span>Posted on {{$listAnnouncement->created_at->format('M d, Y')}}</span>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $allAnnouncement->links() }}
            @else
                <div class="bg-danger card-body text-white mb-5 rounded-md">
                    <div class="row">
                        <div class="col-2">
                            <img class="w-100" src="https://cdn.shopify.com/s/files/1/1061/1924/products/Sad_Face_Emoji_large.png?v=1571606037" alt="">
                        </div>
                        <div class="col-10">
                            <h4 class="text-white">SORRY !</h4>
                            <p class="lead">
                                NO POST AVAILABLE RIGHT NOW 
                                <br>
                                PLEASE COMEBACK LATER THANK YOU..
                            </p>
                            
                        </div>
                    </div>
                </div>
            @endif
       </div>
    </div>
</div>

@endsection
