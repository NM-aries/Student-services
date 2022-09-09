
@extends('layouts.app')

@section('title')
    {{$event->title}}
@endsection


@section('content')

<div class="container-fluid text-center bg-gray-600 shadow-lg" id="title_container">
    <div class="container" >
        <div class="header py-3">
            <h3 class="text-white text-uppercase">{{$event->title}}</h3>
        </div>
   </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 ">
                @if (!$event->coverimage)
                    <img class="w-100" src="https://www.evsu.edu.ph/wp-content/uploads/2022/08/2022_18th-charter-anniversary_480x1600.webp" alt="">
                @endif
            <div class="card-body bg-white">
                
                <div class="">
                    <div class="organizer">
                        <h6 class="fs-6">
                            <label class="text-secondary">Organizer</label> : {{ $event->organizer }}
                        </h6>
                        <h6 class="fs-6">
                            <label class="text-secondary">Date</label> : {{ date('D, M d Y', strtotime($event->start)) }} - {{ date('D, M d Y', strtotime($event->end)) }}
                        </h6>
                        <h6 class="fs-6">
                            <label class="text-secondary">Location</label> : {{ $event->location }}
                        </h6>
                    </div>
                </div>
                <hr>
                <p class="card-text lead">{!! $event->description !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection