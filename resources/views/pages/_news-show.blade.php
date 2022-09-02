
@extends('layouts.app')

@section('title', 'News| {{ $news_details->title }}')

@section('content')

<div class="container-fluid bg-light shadow" id="title_container">
    <div class="container">
        <div class="header py-4 ">
            <h3>{{$news_details->title}}</h3>
        </div>
   </div>

<div class="container mb-5 mt-5">
    <div class="row new_content ">
        <form action="{{ url('news_ViewCount/'.$news_details->id) }}" method="POST" id="form">
            @csrf 
            @method('PUT')
            <input type="hidden" value="{{ $news_details->visit_count }}" name="visit_count" id="postVisitCount">
        </form>
        <div class="col-12 col-lg-10">
            <div class="card">
                <div class="card-header">
                    @if ($news_details->coverimage)
                        <img class="img-fluid" src="{{asset('upload/news/'.$news_details->coverimage)}}" alt="">
                    @endif
                </div>
                <div class="card-body">
                    <p>Posted on <span class="text-danger">{{$news_details->created_at->format('M d, Y')}}</span> </p>
                    <p class="card-text lead">{!! $news_details->description !!}</p>
                    <hr class="mt-3 text-danger">
                    <div class="mt-3">
                       
                        <div class="row justify-content-center">
                            @if ($prev)
                                <div class="col-3">
                                    <a href="{{url('university_news/'.$prev->slug)}}" class=" btn btn-outline-danger icon icon-left ">
                                        <i class="bi bi-chevron-double-left"></i>
                                        Previous Page
                                    </a>
                                </div>
                            @endif
    
                            @if ($next)
                                <div class="col-3">
                                    <a href="{{url('university_news/'.$next->slug)}}" class=" btn btn-outline-danger icon icon-right ">
                                        Next Page
                                        <i class="bi bi-chevron-double-right"></i>
                                    </a>  
                                </div>
                            @endif
                            
                        </div>
                       
                       
                    </div>
                </div>

               
            </div>
       </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    setTimeout(function(){
        let visitCount = document.getElementById('postVisitCount').value;
        let visiCountPlusOne = parseInt(visitCount) + 1;
        document.getElementById('postVisitCount').value = visiCountPlusOne;
        
        let $formData = $('#form');

        $.ajax({
            url:"{{ url('news_ViewCount/'.$news_details->id) }}",
            type: 'PUT',
            data: $formData.serialize(),
        });
       
    }, 1000);
</script>

@endsection