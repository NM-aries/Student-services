@extends('layouts.app')

@section('title', 'Events Archive')

@section('content')

<style>
    ._w-icon:hover {
        transition: 0.3s all;
        color:red;
        text-decoration-line:underline;
    }
</style>


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
                    @foreach ($allEvents as $item)
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="calendar d-flex">
                                <span class="calendar-month  bg-primary ">{{ date('M ', strtotime($item->start)) }}</span>
                                <span class="calendar-day py-2">{{ date('d', strtotime($item->start)) }}</span>
                            </div>
                        </div>
                        <div class="col">
                            <a href="{{ url('university_events/'.$item->title ) }}">
                                <h3 class="h4 mb-1 _w-icon">{{ $item->title }} 
                            </h3>
                                
                            </a>
                            <span>
                                Organized by 
                                <a href="#">{{ $item->organizer }}</a>
                            </span>
                            
                            <div class="small fw-bold">
                                <span class="text-danger">Date</span>:
                                
                                {{ date('M d,Y', strtotime($item->start)) }} - {{ date('M d,Y', strtotime($item->end)) }}
                            </div>
                            <span class="small fw-bold">
                                <span class="text-danger">Place</span>: {{ $item->location }}
                            </span>
                            <p class="lead fs-6 mt-1">
                                {!! Str::limit($item->description, 200) !!}
                            </p>
                        </div>
                    @endforeach

                    {{ $allEvents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
