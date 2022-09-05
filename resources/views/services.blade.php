@extends('layouts.app')

@section('title', 'Services')

@section('content')
<style>
    .accordion-button.active{
        background-color: red !important;
    }
</style>
<div class="container-fluid bg-gray-600 shadow" id="title_container">
    <div class="container">
        <div class="header py-3">
            <h2 class="text-white">SERVICES</h2>
        </div>
   </div>
</div>
<div class="container mb-5 mt-3" >
    <div class="row new_content ">
        <div class="col-lg-8 col-md-12 col-12 order-1 ">
            <div class="accordion" id="accordionPricing">
            @if ($allServices->count())
                @foreach ($allServices as $listServices )
                    <div class="accordion-item">
                        <h2 class="accordion-header " id="headingOne">
                            <button class="accordion-button 
                                @if(!$loop->first) collapsed @endif" 
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $listServices->id }}" aria-expanded="true" aria-controls="collapseOne">
                                {{ $listServices->title }}
                            </button>
                        </h2>
                        <div id="collapseOne-{{ $listServices->id }}" class="accordion-collapse collapse collapsed @if($loop->first) show
                            @endif " aria-labelledby="headingOne" data-bs-parent="#accordionPricing">
                            <div class="accordion-body">
                                {!! $listServices->description !!}    
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                
            @else
                <div class="card-body text-white mb-5 rounded-md">
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
