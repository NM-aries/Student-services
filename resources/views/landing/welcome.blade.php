@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
@include('include/adds_on/banner')
<div class="container mt-4">
    <div class="row sec-01">
        <div class="col-lg-8 col-md-12 col-12 order-1 ">
            <div>
                <div class="card-body px-0">
                    <h2 class=" text-warning bg-danger px-2 py-3 rounded">Latest News </h2>
                    @if ($other_news->count())
                        <div class="card">
                            <div class="card-body shadow-sm px-5">
                                <div class="row">
                                    @foreach ($other_news as $newsItems)
                                        <div @if($loop->first) class="col-md-12" @endif class="col-12 col-md-12 col-lg-6 news">
                                            <div  class="card shadow-sm"  >
                                                <div @if($loop->first) class="card-header p-0" @endif class="card-header p-0 card_header_img" >
                                                    <div  @if($loop->first) class="img-hover latest" @endif class="img-hover" 

                                                        @if($newsItems->coverimage) 
                                                            style="background: url(upload/news/{{$newsItems->coverimage}});"
                                                        @else
                                                            style="background: url(assets/images/no-picture-available-icon-4.jpg);"
                                                        @endif
                                                    ></div>         
                                                    <p class="card_title">
                                                    
                                                        @if($loop->first)
                                                            {!! Str::limit($newsItems->title, 100) !!}
                                                        @else
                                                            {!! Str::limit($newsItems->title, 50) !!}
                                                        @endif  
                                                        
                                                    </p>   
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text" >
                                                        @if($loop->first)
                                                            {!! Str::limit($newsItems->description, 300) !!}
                                                        @else
                                                            {!! Str::limit($newsItems->description, 150) !!}
                                                        @endif  
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        @if (strlen(strip_tags($newsItems->description)) > 50)
                                                            <a class="btn mt-2 btn-outline-danger btn-sm" href="{{ url('university_news/'.$newsItems->slug) }}"> 
                                                                Read More 
                                                            </a>
                                                        @endif
                                                        <small class="text-muted">{{$newsItems->created_at->diffForHumans()}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a class="btn btn-danger" href="{{ url('university_news/') }}"> 
                                                Load More News.. <i class=" bi bi-arrow-right-short h5 text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @else
                        <div class="bg-danger card-body shadow text-white mb-5 rounded-md">
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
        <div class="col-lg-4 col-md-12 col-12 order-md-first order-lg-last " >
            @include('include/adds_on/side-row')
        </div>
    </div>
</div>
@endsection
