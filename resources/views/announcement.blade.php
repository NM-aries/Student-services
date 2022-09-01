@extends('layouts.frontend')

@section('title', 'Announcements')

@section('content')

<div class="container-fluid bg-light shadow" id="title_container">
    <div class="container">
        <div class="header py-4">
            <h2 class="text-danger">Announcements </h2>
        </div>
   </div>
</div>

<div class="container mb-5 mt-3" >
    <div class="row new_content ">
        <div class="col-lg-8 col-md-12 col-12 order-1 ">
            @if ($allAnnouncement->count())
                @foreach ($allAnnouncement as $lisAnnouncement )
                    <div class="card mb-3 news">
                        <div class="row ">
                            <div class="col-md-4 ">
                                <div class="thumb m-auto" 
                                @if($lisAnnouncement->coverimage) 
                                    style="background: url(upload/announcement/{{$lisAnnouncement->coverimage}});"
                                @else
                                    style="background: url(assets/images/no-picture-available-icon-4.jpg);"
                                @endif
                                
                                ></div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$lisAnnouncement->title}}</h5>
                                    <p class="card-text">
                                        {!! Str::limit($lisAnnouncement->description, 150, $end=" .....") !!}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="btn mt-2 btn-outline-danger btn-sm" href="{{ url('university_announcement/'.$lisAnnouncement->slug) }}"> 
                                            Continue Reading  
                                        </a>
                                        <p class="card-text"><small class="text-muted">Posted on {{$lisAnnouncement->created_at->format('M d, Y')}}</small></p>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
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
       <div class="col-lg-4 col-md-12 col-12 order-md-first order-lg-last " >
            @include('include/_search')
        </div>
    </div>
</div>
@endsection
