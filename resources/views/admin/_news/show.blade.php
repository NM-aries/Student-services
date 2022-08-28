@extends('layouts.master')

@section('title' , 'View News')

@section('breadcrumbs')
    {{ Breadcrumbs::render('news_show', $news) }}
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="card-header p-0 pb-3">
            <h2>{{ ucfirst(trans( $news->title)) }}</h2>
            <div class="d-flex align-items-center mb-1" title="19 Jul 22 16:00 UTC">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 16 16" role="img" fill="currentColor">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                </svg>
                <small class="pt-1">Posted on: {{ $news->created_at->format('M d, Y') }}</small>
            </div>
        </div>

        <div class="card-body px-0 pb-4">
            @if (!$news->coverimage)
                
            @else
                <div class="col-12 col-md-12 mb-4">
                    <img src="{{asset('upload/news/'.$news->coverimage)}}">
                </div>
            @endif
            <div class="">
                {!! $news->description !!}
            </div>
        </div>
          
    </div>
</div>

{{-- 
    <section class="section">
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-10">
                    <div class="card px-3 pb-3 shadow-sm">
                        <div class="card-header">
                            <h2>{{ $news->title }}</h2>
                            <div class="d-flex align-items-center mb-1" title="19 Jul 22 16:00 UTC">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 16 16" role="img" fill="currentColor">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                </svg>
                                <small class="pt-1">Posted on: {{ $news->created_at->format('M d, Y') }}</small>
                            </div>
                            <hr>
                        </div>


                        <div class="card-body pb-4">
                            @if (!$news->coverimage)
                                
                            @else
                                <div class="col-12 col-md-5">
                                    <img src="{{asset('upload/news/'.$news->coverimage)}}" class="form-control">
                            
                                </div>
                            @endif
                            <div class=" mt-4">
                                <p>{!! $news->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div> --}}

@endsection
