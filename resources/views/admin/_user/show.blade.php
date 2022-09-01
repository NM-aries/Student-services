@extends('layouts.master')

@section('title', 'Users Profile')

@section('breadcrumbs')
    {{ Breadcrumbs::render('user_show') }}
@endsection

@section('content')
<div class="row mb-5">
    <div class="col-12 col-lg-4">
        <div class="card mb-4 shadow">
            @include('admin._user._components._profile')
        </div>
        <div class="card mb-4 shadow">
            @include('admin._user._components._information')
        </div>

        <div class="card mb-4  shadow">
            @include('admin._user._components._number_post')
        </div>
    </div>
    <div class="col-12 col-lg-8">
        @include('admin._user._components._user_post')
    </div>
</div>
@endsection
