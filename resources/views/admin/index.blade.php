@extends('layouts.master')


@section('title', 'Dashboard')

@section('breadcrumbs')
    {!! Breadcrumbs::render('dashboard') !!}
@endsection

@section('content')
<div class="row">
    @if (session('denied'))
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                </svg>
                <strong>
                    Error ! &nbsp;
                </strong> 
                {!! session('denied') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body p-3">
                        <div class="d-block">
                            <div class="d-flex align-items-center me-5">
                                <div class="icon-shape icon-md bg-primary p-2 rounded me-3">
                                    <img class="rounded" alt="Image placeholder" src="{{ asset('images/icons/users.webp') }}">
                                </div>
                                <div class="d-block">
                                    <label class="mb-0">Users</label>
                                    <h4 class="mb-0">{{ $users }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body p-3">
                        <div class="d-block">
                            <div class="d-flex align-items-center me-5">
                                <div class="icon-shape icon-md bg-primary p-2 rounded me-3">
                                    <img class="rounded" alt="Image placeholder" src="{{ asset('images/icons/announcement.webp') }}">
                                </div>
                                <div class="d-block">
                                    <label class="mb-0">Announcements</label>
                                    <h4 class="mb-0">{{ $announcement }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body p-3">
                        <div class="d-block">
                            <div class="d-flex align-items-center me-5">
                                <div class="icon-shape icon-md bg-primary p-2 rounded me-3">
                                    <img class="rounded" alt="Image placeholder" src="{{ asset('images/icons/news.webp') }}">
                                </div>
                                <div class="d-block">
                                    <label class="mb-0">News</label>
                                    <h4 class="mb-0">{{ $news }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body p-3">
                        <div class="d-block">
                            <div class="d-flex align-items-center me-5">
                                <div class="icon-shape icon-md bg-primary p-2 rounded me-3">
                                    <img class="rounded" alt="Image placeholder" src="{{ asset('images/icons/services.webp') }}">
                                </div>
                                <div class="d-block">
                                    <label class="mb-0">Services</label>
                                    <h4 class="mb-0">{{ $services }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-5">
        <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between p-3">
                <h2 class="fs-5 fw-bold mb-0">Popular Post</h2>
             </div>
            <div class="card-body">
                <div class="row">
                    <h5>News </h5>
                </div>
                <!-- Project 1 -->
                @foreach ($pop_news as $popular)
                    <div class="row mb-4 px-2">
                        <div class="col-auto">
                            <a href="#" class="image image-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ asset('images/icons/news.webp') }}">
                            </a>
                        </div>
                        <div class="col">
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="h6 mb-0"> {!! Str::limit($popular->title, 30) !!}</div>
                                    <div class="small fw-bold text-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                        <span>{{ $popular->visit_count }} </span>
                                    </div>
                                </div>
                                <div class="progress mb-0">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $popular->visit_count }}" aria-valuemin="0" style="width: {{ $popular->visit_count }}px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="row">
                    <h5 class="mb-2">Announcement </h5>
                </div>
                <!-- Project 2 -->
                @foreach ($pop_announcement as $popular)
                    <div class="row mb-4">
                        <div class="col-auto">
                            <a href="#" class="image image-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ asset('images/icons/announcement.webp') }}">
                            </a>
                        </div>
                        <div class="col">
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="h6 mb-0">{!! Str::limit($popular->title, 30) !!}</div>
                                    <div class="small fw-bold text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                        <span>{{ $popular->visit_count }} </span>
                                    </div>
                                </div>
                                <div class="progress mb-0">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $popular->visit_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $popular->visit_count }}px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Project 3 -->
                
            </div>
        </div>
    </div>
    
    <div class="col-12 col-md-7 mb-4"> 
        
        <div id="carouselExampleIndicators" class="carousel slide mb-3" data-bs-ride="true">
            <div class="carousel-indicators">
                @foreach ($banner as $indicator )
                    <button type="button" data-bs-target="#carouselExampleIndicators" aria-current="true" aria-label="Slide 1"
                        data-bs-slide-to="{{ $loop->index }}" 
                        @if($loop->first) class=" bg-primary active" @endif>
                    </button>
                @endforeach
            </div>
            <div class="carousel-inner bg-primary">
                @foreach ( $banner as $banners )
                    <div @if($loop->first) class="carousel-item active" @endif class="carousel-item" >
                        <a @if($banners->link)
                                href="{{ $banners->link }}" target="_blank" 
                            @else 
                                href="#" 
                            @endif>
                            <div class="img">
                                <img class="d-block img-fluid" width="100%" src="{{ asset('upload/banner/'. $banners->image) }}" alt="{{ $banners->description }}">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="30" height="30" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                </svg>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="30" height="30" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg>
            </button>
        </div>
    </div>


    
</div>

@endsection