@extends('layouts.master')

@section('title', 'Services')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('services') }}
@endsection

@section('create_button')
    <a href="{{ url('admin/services/create') }}" class="btn btn-primary d-inline-flex align-items-center">
        Create Service
    </a>
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body p-3">
        <div class="table-responsive pt-1">
            <table class="table table-centered table-hover mb-0 rounded" id="data">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">Title</th>
                        <th class="border-0">Created By</th>
                        <th class="border-0">Created At</th>
                        <th class="border-0">Updated by</th>
                        <th class="border-0">Status</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach($services as $items )
                        <tr class="align-middle">
                            <td>{{ Str::limit($items->title, 40) }}</td>
                            <td>{{ $items->user->name ?? 'None'}}</td>
                            <td>{{ $items->created_at->format('M d, Y') }}</td>
                            <td>
                                @if (!$items->updated_by)
                                    <span class="text-gray"> -- </span>
                                @else
                                    {{ $items->user->name }}
                                @endif
                                
                            </td>
                            <td style="width: 80px">
                                @if($items->status == 1)
                                    <span class="badge bg-success p-2">Published</span>
                                @else
                                    <span class="badge bg-danger p-2">Draft</span>
                                @endif
                            </td>

                            <td>
                                <button class="btn btn-link dropdown-toggle m-0 p-0" data-bs-toggle="dropdown"  aria-expanded="false">
                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                        </path>
                                    </svg>
                                </button>
                    
                                <div class="dropdown-menu bg-primary text-white dashboard-dropdown px-2">
                                    <a  class="dropdown-item align-items-center" 
                                        href="{{ url('admin/services/view/'.$items->id) }}">
                                        <img src="{{ asset('images/icons/view.webp') }}" alt="" class="action_icon"> 
                                        View Post
                                    </a>
                                    <a  class="dropdown-item align-items-center" 
                                        href="{{ url('admin/services/edit/'.$items->id) }}">
                                        <img src="{{ asset('images/icons/edit.webp') }}" alt="" class="action_icon"> 
                                        Edit Post
                                    </a>
                                    <a  class="dropdown-item align-items-center" 
                                        href="{{ url('admin/services/remove/'.$items->id) }}">
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

