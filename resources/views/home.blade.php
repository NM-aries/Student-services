@extends('layouts.master')

@section('content')

@section('title', 'Dashboard')
<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-body">
                <h4 class="text-dark">Recent Announcement</h4>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et blanditiis inventore reiciendis ipsum ratione obcaecati veniam impedit incidunt ducimus totam, aliquid cumque accusantium provident rem vitae. Eos eum assumenda hic!
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
                                <a href="#" class="avatar-lg">
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
                                <span class="fs-4 fw-bolder text-dark">0</span>
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
                                <a href="#" class="avatar-lg">
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
                                <span class="fs-4 fw-bolder text-dark">0</span>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>

            {{-- Services --}}
            
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="#" class="avatar-lg">
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
                                <span class="fs-4 fw-bolder text-dark">0</span>
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
                                <a href="#" class="avatar-lg">
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