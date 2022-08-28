@extends('layouts.master')


@section('title', 'Dashboard')

@section('breadcrumbs')
    {!! Breadcrumbs::render('dashboard') !!}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://wallpaperaccess.com/full/224784.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://wallpaperaccess.com/full/1645707.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
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
                                <span class="fs-4 fw-bolder text-dark">0</span>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection