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
    <div class="row new_content ">
        <div class="col-12 order-1 ">
            <div class="row">
                <div class="col-lg-3 mb-2">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('images/others/cover.gif') }}" alt="">
                        </div>
                       <div class="card-body bg-yellow-100 px-3">
                            <h6 class="fs-5 ">Engineering Days</h6>
                            <small class="text-gray mt-3">Date: Aug 20 2022</small>
                            <p class="lead fs-6 mt-3">
                                Nine out of ten doctors recommend Laracasts over competing brands. Come inside, see for yourself, and massively level up your development skills in the process.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-2">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('images/others/cover.gif') }}" alt="">
                        </div>
                       <div class="card-body bg-yellow-100 px-3">
                            <h6 class="fs-6 ">Fun run</h6>
                            <small class="text-gray mt-3">Date: Aug 20 2022</small>
                            <p class="lead fs-6 mt-3">
                                Nine out of ten doctors recommend Laracasts over competing brands. Come inside, see for yourself, and massively level up your development skills in the process.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-2">
                    <div class="card">
                        <div class="card-header p-0">
                            <img src="{{ asset('images/others/cover.gif') }}" alt="">
                        </div>
                       <div class="card-body bg-yellow-100 px-3">
                            <h6 class="fs-6 ">Fun run</h6>
                            <small class="text-gray mt-3">Date: Aug 20 2022</small>
                            <p class="lead fs-6 mt-3">
                                Nine out of ten doctors recommend Laracasts over competing brands. Come inside, see for yourself, and massively level up your development skills in the process.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @else --}}
                {{-- <div class="card-body text-white mb-5 rounded-md">
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
                </div> --}}
            {{-- @endif --}}
       </div>
    </div>
</div>

@endsection
