@extends('layouts.master')


@section('title', 'Dashboard')

@section('breadcrumbs')
    {!! Breadcrumbs::render('dashboard') !!}
@endsection

@section('content')
<div class="row">
    @if (session('denied'))
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
                <span class="fas fa-bullhorn me-1"></span>
                <strong>Sorry</strong> {!! session('denied') !!}
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
    @endif
    
    <div class="col-md-8 mb-4"> 
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                @foreach ($banner as $indicator )
                    <button type="button" data-bs-target="#carouselExampleIndicators" aria-current="true" aria-label="Slide 1"
                        data-bs-slide-to="{{ $loop->index }}" 
                        @if($loop->first) class="text-danger active" @endif >
                    </button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ( $banner as $banners )
                    <div @if($loop->first) class="carousel-item active" @endif class="carousel-item" >
                        <a @if($banners->link)
                                href="{{ $banners->link }}" target="_blank" 
                            @else 
                                href="#" 
                            @endif>
                            <div class="img">
                                <img class="d-block img-fluid" src="{{ asset('upload/banner/'. $banners->image) }}" alt="{{ $banners->description }}">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                </svg>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                  </svg>
            </button>
        </div>
    </div>


    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="{{ url('admin/users') }}" class="avatar-lg">
                                    <img class="rounded" alt="Image placeholder" src="{{ asset('images/icons/users.webp') }}">
                                </a>
                            </div>
                            <div class="col-auto px-0">
                                <h2 class="fs-5 text-dark mb-0">
                                    <span href="#">
                                        <small class="fs-6">Registered</small>
                                        <h6 class="">User</h6>
                                    </span>
                                </h2>
                            </div>
                            <div class="col text-end">
                                <span class="fs-4 fw-bolder text-dark">{{ $users }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Announcement --}}

            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="{{ url('admin/announcement') }}" class="avatar-lg">
                                    <img class="rounded" alt="Image placeholder" src="{{ asset('images/icons/announcement.webp') }}">
                                </a>
                            </div>
                            <div class="col-auto px-0">
                                <h2 class="fs-5 text-dark mb-0">
                                    <span href="#">
                                        <small class="fs-6">Total Posted</small>
                                        <h6 class="">Announcement</h6>
                                    </span>
                                </h2>
                            </div>
                            <div class="col text-end">
                                <span class="fs-4 fw-bolder text-dark">{{ $announcement }}</span>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>

            {{-- NEWS --}}
            
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="{{ url('admin/news') }}" class="avatar-lg">
                                    <img class="rounded" alt="Image placeholder" src="{{ asset('images/icons/news.webp') }}">
                                </a>
                            </div>
                            <div class="col-auto px-0">
                                <h2 class="fs-5 text-dark mb-0">
                                    <span href="#">
                                        <small class="fs-6">Total Posted</small>
                                        <h6 class="">News</h6>
                                    </span>
                                </h2>
                            </div>
                            <div class="col text-end">
                                <span class="fs-4 fw-bolder text-dark">{{ $news }}</span>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>

            {{-- Announcement --}}
            
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="{{ url('admin/services') }}" class="avatar-lg">
                                    <img class="rounded" alt="Image placeholder" src="{{ asset('images/icons/services.webp') }}">
                                </a>
                            </div>
                            <div class="col-auto px-0">
                                <h2 class="fs-5 text-dark mb-0">
                                    <span href="#">
                                        <small class="fs-6">Total Posted</small>
                                        <h6 class="">Services</h6>
                                    </span>
                                </h2>
                            </div>
                            <div class="col text-end">
                                <span class="fs-4 fw-bolder text-dark">{{ $services }}</span>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection