@extends('layouts.master')

@section('title' , 'View Announcement')

@section('breadcrumbs')
    {{ Breadcrumbs::render('announcement_show', $announcement) }}
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="card-header p-0 pb-3">
            <h2>{{ ucfirst(trans( $announcement->title)) }}</h2>
            <div class="d-flex align-items-center mb-1" title="19 Jul 22 16:00 UTC">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 16 16" role="img" fill="currentColor">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                </svg>
                <small class="pt-1">Posted on: {{ $announcement->created_at->format('M d, Y') }}</small>
            </div>
        </div>

        <div class="card-body px-0 pb-4">
            @if (!$announcement->coverimage)
                
            @else
                <div class="col-12 col-md-12 mb-4">
                    <img src="{{asset('upload/announcement/'.$announcement->coverimage)}}">
                </div>
            @endif
            <div class="">
                {!! $announcement->description !!}
            </div>
        </div>
          
    </div>
</div>

@endsection
