@extends('layouts.master')

@section('title', 'Banner')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('banner') }}
@endsection

@section('create_button')
    <a href="{{ url('admin/banner/add') }}" class="btn btn-primary d-inline-flex align-items-center">
        Create Banner
    </a>
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body p-3">
        <div class="table-responsive pt-1">
            <table class="table table-centered table-hover mb-0 rounded" id="data">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">Image</th>
                        <th class="border-0 ">Title</th>
                        <th class="border-0">Created By</th>
                        <th class="border-0">Created At</th>
                        <th class="border-0">Updated by</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach($banner as $items )
                        <tr class="align-middle">
                            <td>
                                @if (!$items->image)
                                    <img class="thumbnail" src="{{ asset('images/others/No_Cover.jpg') }}" alt="">
                                @else
                                    <img class="thumbnail" src="{{ asset('upload/banner/'.$items->image) }}" alt="">
                                @endif
                            </td>
                            <td>{{ Str::limit($items->title, 40) }}</td>
                            <td>{{ $items->user->name ?? 'None'}}</td>
                            <td>{{ $items->created_at->format('M d, Y') }}</td>
                            <td>{{ $items->updated_by ?? '--'}}</td>

                            <td>
                                <button class="btn btn-link dropdown-toggle m-0 p-0" data-bs-toggle="dropdown"  aria-expanded="false">
                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                        </path>
                                    </svg>
                                </button>
                    
                                <div class="dropdown-menu bg-primary text-white dashboard-dropdown px-2">
                                    <a  class="dropdown-item align-items-center" 
                                        href="{{ url('admin/banner/view/'.$items->id) }}">
                                        <img src="{{ asset('images/icons/view.webp') }}" alt="" class="action_icon"> 
                                        View Post
                                    </a>
                                    <a  class="dropdown-item align-items-center" 
                                        href="{{ url('admin/banner/edit/'.$items->id) }}">
                                        <img src="{{ asset('images/icons/edit.webp') }}" alt="" class="action_icon"> 
                                        Edit Post
                                    </a>
                                    <a  class="dropdown-item align-items-center" 
                                        href="{{ url('admin/banner/remove/'.$items->id) }}">
                                        <img src="{{ asset('images/icons/trash.webp') }}" alt="" class="action_icon"> 
                                        Remove
                                    </a>
                                </div>
                                
                            </td>
                        </tr>
                        {{-- @include('include/adds_on/remove_modal') --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('include/_alert')
@endsection


@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}" defer ></script>
    <script src="{{asset('js/dataTables.bootstrap5.min.js')}}" defer></script>
    
    <script>
        $(document).ready(function () {
            $('#data').DataTable({
                destroy: true,
                "order": [[ 2, "asc" ]]
            });
        });
    </script>
@endsection

