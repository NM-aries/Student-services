
@extends('layouts.app')

@section('title')
    {{$event->title}}
@endsection


@section('content')

<div class="container-fluid text-center bg-light-green shadow-lg" id="title_container">
    <div class="container" >
        <div class="header py-3">
            <h3 class="text-white text-uppercase">{{$event->title}}</h3>
        </div>
   </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 ">
            @if ($event->image)
                <img class="w-100" src="{{ asset('upload/events/'. $event->image)}}" alt="">
            @endif
            <div class="card-body bg-white">
                
                <div class="">
                    <div class="organizer">
                        <h6 class="fs-6">
                            <label class="text-danger">Organizer</label> : {{ $event->organizer }}
                        </h6>
                        <h6 class="fs-6">
                            <label class="text-danger">Date</label> : {{ date('D, M d Y', strtotime($event->start)) }} - {{ date('D, M d Y', strtotime($event->end)) }}
                        </h6>
                        <h6 class="fs-6">
                            <label class="text-danger">Location</label> : {{ $event->location }}
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