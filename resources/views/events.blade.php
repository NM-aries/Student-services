@extends('layouts.app')

@section('title', 'Events Archive')

@section('content')


<div class="container-fluid bg-gray-600 shadow" id="title_container">
    <div class="container">
        <div class="header py-3">
            <h2 class="text-white">EVENTS </h2>
        </div>
   </div>
</div>

<div class="container mb-5 mt-4" >
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-body">
                <!-- Event 1 -->
                <div class="row align-items-center d-block d-sm-flex ">
                    <div class="col-auto mb-3 mb-sm-0">
                        <div class="calendar d-flex">
                            <span class="calendar-month  bg-primary ">Aug</span>
                            <span class="calendar-day py-2">10</span>
                        </div>
                    </div>
                    <div class="col">
                        <style>
                            
                             ._w-icon:hover {
                                transition: 0.3s all;
                                color:red;
                                text-decoration-line:underline;
                            }

                        </style>
                        <a href="#">
                            <h3 class="h4 mb-1 _w-icon">Engineering Days 
                        </h3>
                            
                        </a>
                        <span>
                            Organized by 
                            <a href="#">Engineering Department</a>
                        </span>
                        
                        <div class="small fw-bold">
                            <span class="text-danger">Date</span>:
                            Thu, 12 Sep - Sat, 18 Sep 2020
                        </div>
                        <span class="small fw-bold">
                            <span class="text-danger">Place</span>: Evsu - Tanauan Campus
                        </span>
                        <p class="lead fs-6 mt-1">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quaerat cumque quam optio fugiat. Odit laudantium nostrum vero amet assumenda voluptates blanditiis inventore consequatur laboriosam accusantium neque, quis sapiente voluptas.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top bg-gray-50">
                <a class="fw-bold d-flex align-items-center justify-content-center" href="../calendar.html">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                    See all
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
