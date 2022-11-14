@extends('layouts.master')

@section('title', 'Feedback')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('feedback') }}
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body p-3">
        
        @include('include/_alert')
        
        <div class="table-responsive pt-1">
            <table class="table table-centered table-hover mb-0 rounded" id="data">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">Name</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Contact</th>
                        <th class="border-0">Description</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach($feedback as $items )
                        <tr class="align-middle">
                            <td>{{ $items->name, 40 }}</td>
                            <td>{{ $items->email ?? 'None'}}</td>
                            <td>{{ $items->contact }}</td>
                            <td>
                                {{ Str::limit($items->description, 80) }}
                            </td>
                        
                            <td>
                                <button type="button" class="btn btn-primary"
                                 data-bs-target="#feedback{{ $items->id }}" 
                                 data-bs-toggle="modal" aria-pressed="false" 
                                autocomplete="off">View</button>
                                
                            </td>
                        </tr>
                        @include('admin/_include/_feedback')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}" defer ></script>
    <script src="{{asset('js/dataTables.bootstrap5.min.js')}}" defer></script>
    
    <script>
        $(document).ready(function () {
            $('#data').DataTable({
                destroy: true,
                "order": [[ 2, "desc" ]]
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);
    </script>
@endsection

