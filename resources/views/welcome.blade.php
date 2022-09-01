@extends('layouts.app')

@section('title', 'Home')

@section('content')
@include('include/_banner')

<div class="news_section"></div>
<div class="colour-block py-4">
    <section class="container _section1 ">
        <div class="_header text-center mb-3 ">
            <h2 class="news_header">Latest News</h2>
        </div>
        <div class="row justify-content-center">
            @if ($other_news->count())
                    <div class="col-md-12 mb-4">
                        <div class="owl-carousel owl-theme row">
                            @foreach ($other_news as $newsItems)
                                <div class="item"  style="width:100%">
                                    <a class="card p-0" id="news">
                                        <div class="card-header p-0 _thumbnail">
                                            <div class="_thumb" style="background:url(upload/news/{{ $newsItems->coverimage }})">
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="title bg-primary p-3 text-white">
                                                <h2 class="fs-6">
                                                    {!! Str::limit($newsItems->title, 70) !!}
                                                </h2>
                                            </div>
                                            <div class="px-3 py-2">
                                                <div class="d-flex align-items-center mb-2">
                                                    <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                                    <span class="small ">{{$newsItems->created_at->diffForHumans()}}</span>
                                                </div>
                                                <p class="lead fs-6">
                                                    {!! Str::limit($newsItems->description, 120) !!}
                                                </p>
                                                <button class="btn btn-primary mb-2"> Read More</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                
            @endif
        </div>

        <div class="button_readmore text-center">
            <a href="{{ url('news') }}" class="fs-6 btn btn-secondary">Read More News</a>
        </div>
    </section>

</div>

<div class="announcements_section "></div>
<div class="white-block pb-5">
    <section class="container _section1 ">
        <div class="_header text-center mb-3 ">
            <h2 class="text-primary">Announcements</h2>
        </div>
        <div class="row justify-content-center">
            @if ($other_announcements->count())
                    <div class="col-md-12 mb-4">
                        <div class="owl-carousel owl-theme row">
                            @foreach ($other_announcements as $announcementItems)
                                <div class="item"  style="width:100%">
                                    <a class="card p-0" id="news">
                                        <div class="card-header p-0 _thumbnail">
                                            <div class="_thumb" style="background:url(upload/news/{{ $announcementItems->coverimage }})">
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="title bg-primary p-3 text-white">
                                                <h2 class="fs-6">
                                                    {!! Str::limit($announcementItems->title, 70) !!}
                                                </h2>
                                            </div>
                                            <div class="px-3 py-2">
                                                <div class="d-flex align-items-center mb-2">
                                                    <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                                    <span class="small ">{{$announcementItems->created_at->diffForHumans()}}</span>
                                                </div>
                                                <p class="lead fs-6">
                                                    {!! Str::limit($announcementItems->description, 150) !!}
                                                </p>
                                                <button class="btn btn-primary mb-2"> Read More</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                
            @endif
        </div>
        <div class="button_readmore text-center">
            <a href="{{ url('announcements') }}" class="fs-6 btn btn-secondary">Read More Announcements</a>
        </div>
    </section>
</div>

<div class="skew-c"></div>
<div class="colour-block py-4">
    <section class="container _section1 ">
        <div class="_header text-center mb-3 ">
            <h2 class="news_header">Services</h2>
        </div>
        <div class="row justify-content-center">
            @if ($other_services->count())
                    <div class="col-md-12 mb-4">
                        <div class="owl-carousel owl-theme row">
                            @foreach ($other_services as $servicesItems)
                                <div class="item"  style="width:100%">
                                    <a class="card p-0" id="news">
                                        <div class="card-header p-0 _thumbnail">
                                            <div class="_thumb" style="background:url(upload/news/evsunista-awards-grand-fellowship-ascend-evsu-to-greater-heights-evsunistas-welcome-newly-designated-key-officials-gatsby-night-brings-out-glitz-and-glamour.1661923179.jpg)">
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="title bg-primary p-3 text-white">
                                                <h2 class="fs-6">
                                                    {!! Str::limit($servicesItems->title, 70) !!}
                                                </h2>
                                            </div>
                                            <div class="px-3 py-2">
                                                <div class="d-flex align-items-center mb-2">
                                                    <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                                    <span class="small ">{{$servicesItems->created_at->diffForHumans()}}</span>
                                                </div>
                                                <p class="lead fs-6">
                                                    {!! Str::limit($servicesItems->description, 150) !!}
                                                </p>
                                                <button class="btn btn-primary mb-2"> Read More</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                
            @endif
        </div>

        <div class="button_readmore text-center">
            <a href="{{ url('news') }}" class="fs-6 btn btn-secondary">Read More Services</a>
        </div>
    </section>
</div>

@endsection
