@extends('layouts.master')

@section('title', 'Users')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@endsection

@section('create_button')
    <a href="{{ url('admin/users/add') }}" class="btn btn-primary d-inline-flex align-items-center">
        Register User
    </a>
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body p-3">
        <div class="table-responsive pt-1">
            <table class="table table-centered table-hover mb-0 rounded" id="data">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">Profile Pic</th>
                        <th class="border-0">Fullname</th>
                        <th class="border-0">Username</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Role</th>
                        <th class="border-0">Status</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach ($users as $items)
                    <tr class="align-middle">
                        
                        <td clas="" style="width: 80px">
                            <img class="avatar avatar-md rounded" src="{{ asset('images/user/'.$items->profile_img) }}" style="height: 40px; width:40px;">
                        </td>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->username }}</td>
                        <td>{{ $items->email }}</td>
                        <td style="width: 100px">
                            @if ($items->is_admin == 1)
                                <span class="badge p-2 bg-primary"> Administrator</span>    
                            @else
                                <span class="badge p-2 bg-secondary"> Staff</span> 
                            @endif

                        </td>

                        <td style="width: 100px">
                            @if($items->status == 1)
                            <span class="badge bg-success p-2"> Active </span>
                            @else
                            <span class="badge bg-danger p-2">Inactive</span>
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
                                    href="{{ url('admin/users/view/'.$items->id) }}">
                                    <img src="{{ asset('images/icons/view.webp') }}" alt="" class="action_icon"> 
                                    View Profile
                                </a>
                                @if (Auth::user()->is_admin == '1')
                                    <a  class="dropdown-item align-items-center" 
                                        href="{{ url('admin/users/edit/'.$items->id) }}">
                                        <img src="{{ asset('images/icons/edit.webp') }}" alt="" class="action_icon"> 
                                        Edit User
                                    </a>
                                    @if (Auth::user()->id != $items->id)
                                        <a  class="dropdown-item align-items-center" 
                                            href="{{ url('admin/users/remove/'.$items->id) }}">
                                            <img src="{{ asset('images/icons/trash.webp') }}" alt="" class="action_icon"> 
                                            Remove
                                        </a>
                                    @endif
                                @endif
                            </div>
                            
                        </td>
                    </tr>
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

