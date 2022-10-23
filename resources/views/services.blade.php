@extends('layouts.app')

@section('title', 'Services')

@section('content')
<style>
    .accordion-button.active{
        background-color: red !important;
    }
</style>
<div class="container-fluid bg-gray shadow" id="title_container">
    <div class="container">
        <div class="header py-3">
            <h2 class="text-white">SERVICES</h2>
        </div>
   </div>
</div>
<div class="container mb-5 mt-3" >
    <div class="row new_content ">
        <div class="col-lg-12 col-md-12 col-12 order-1 ">
            <div class="accordion " id="accordionPricing">
            @if ($allServices->count())
                @foreach ($allServices->where('status', 1) as $listServices )
                    <div class="accordion-item">
                        <h2 class="accordion-header " id="headingOne">
                            <button class="accordion-button collapsed
                                @if(!$loop->first) collapsed @endif" 
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $listServices->id }}" aria-expanded="true" aria-controls="collapseOne">
                                {{ $listServices->title }}
                            </button>
                        </h2>
                        <div id="collapseOne-{{ $listServices->id }}" class="accordion-collapse show collapse collapsed  " aria-labelledby="headingOne" data-bs-parent="#accordionPricing">
                            <div class="accordion-body bg-white">
                                {!! $listServices->description !!}  

                                @if ($listServices->file)
                                    <div class="my-2">
                                         </a>
                                    </div> 
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a id="download_link" href="{{asset('upload/services/')}}/{{ $listServices->file }}" target="" class="btn btn-danger"> Dowload Now</a>
                                        <span class="badge bg-danger py-3  rounded-0 px-2">
                                            <span class="text-white mx-2">{{ $listServices->download_count }}</span> 
                                            Downloads
                                        </span>
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>

                    
                    <form class="hidden" action="{{ url('servicesDownload/'.$listServices->id) }}" method="POST" id="form">
                        @csrf 
                        @method('PUT')
                        <input type="hidden" value="{{ $listServices->download_count }}" name="download_count" id="DownloadCount">
                    </form>
                @endforeach
            </div>
                
            @else
                <div class="card-body bg-danger text-white mb-5 rounded-md">
                    <div class="row">
                        <div class="col-2">
                            <img class="w-100" src="https://cdn.shopify.com/s/files/1/1061/1924/products/Sad_Face_Emoji_large.png?v=1571606037" alt="">
                        </div>
                        <div class="col-10">
                            <h4 class="text-white">SORRY !</h4>
                            <p class="lead">
                                NO POST AVAILABLE RIGHT NOW 
                                <br>
                                PLEASE COMEBACK LATER THANK YOU..
                            </p>
                            
                        </div>
                    </div>
                </div>
            @endif
       </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        document.getElementById("download_link").onclick = function() {
            let downloadCount = document.getElementById('DownloadCount').value;
            let downloadCountPlusOne = parseInt(downloadCount) + 1;
            document.getElementById('DownloadCount').value = downloadCountPlusOne;
            
            let $formData = $('#form');
        
            $.ajax({
                url: $formData.attr('action'),
                type: 'PUT',
                data: $formData.serialize(),
            });
        };
    </script>
@endsection
