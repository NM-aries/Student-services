
@extends('layouts.app')

@section('title')
    {{$announcement_details->title}}
@endsection


@section('content')

<div class="container-fluid text-center bg-gray shadow-lg" id="title_container">
    <div class="container" >
        <div class="header py-3">
            <h3 class="text-white text-uppercase">{{$announcement_details->title}}</h3>
        </div>
   </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 ">
            @if ($announcement_details->coverimage)
                <img class="w-100" src="{{asset('upload/announcement/'.$announcement_details->coverimage)}}" alt="">
            @endif
            <div class="card-body bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="bg-gray-10 badge py-2 px-3 btn-sm">
                        <svg class="icon icon-xs text-white me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                        <span> {{$announcement_details->visit_count}} Views</span>
                    </small>
                    <p class="card-text">
                        <small class="text-muted ">
                            <svg class="icon icon-xs text-gray-400 me-1 mt-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            <span>Posted on {{$announcement_details->created_at->format('M d, Y')}}</span>
                        </small>
                    </p>
                </div>
                <hr>
                <p class="card-text lead">{!! $announcement_details->description !!}</p>
                    <hr class="my-4 text-gray">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        @if ($prev)
                            <div class="_prev">
                                <a href="{{url('university_announcements/'.$prev->slug)}}" class=" btn bg-gray text-white icon-left ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                    </svg>
                                    Newer Post
                                </a>
                            </div>
                        @endif

                        @if ($next)
                            <div class="_next ">
                                <a href="{{url('university_announcements/'.$next->slug)}}" class=" btn bg-gray text-white  icon-right ">
                                    Older Post
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg>
                                </a>  
                            </div>
                        @endif
                        
                    </div>
                   
                   
                </div>
            </div>
        </div>
    </div>
</div>

<form class="hidden" action="{{ url('announcenment_ViewCount/'.$announcement_details->id) }}" method="POST" id="form">
    @csrf 
    @method('PUT')
    <input type="hidden" value="{{ $announcement_details->visit_count }}" name="visit_count" id="postVisitCount">
</form>
@endsection


@section('scripts')
<script>
    setTimeout(function(){
        let visitCount = document.getElementById('postVisitCount').value;
        let visiCountPlusOne = parseInt(visitCount) + 1;
        document.getElementById('postVisitCount').value = visiCountPlusOne;
        
        let $formData = $('#form');

        $.ajax({
            url:"{{ url('announcenment_ViewCount/'.$announcement_details->id) }}",
            type: 'PUT',
            data: $formData.serialize(),
        });
       
    }, 1000);
</script>
@endsection