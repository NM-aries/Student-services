@extends('layouts.master')

@section('title', 'Activity Logs')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('logs') }}
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body p-3">
        <div class="table-responsive pt-1">
            <table class="table table-centered table-hover mb-0 rounded" id="data">
                <thead class="thead-light">
                    <tr>
                        <th class="d-none">id</th>
                        <th class="border-0 rounded-start">Activity</th>
                        <th class="border-0">Description</th>
                        <th class="border-0">User</th>
                        <th class="border-0 rounded-end">Date & Time</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach ($logs as $items)
                    <tr class="align-middle">
                        <td class="d-none">{{  $items->id  }}</td>
                        <td style="width: 100px">
                            {!! $items->status !!}
                        </td>
                        <td>{!! Str::limit($items->action , 120) !!}</td>
                        <td>{{ $items->user }}</td>
                        <td>{{ $items->created_at->format('M d, Y - h:i A')}}</td>
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
                'order': [0, 'desc']
            });
        });
    </script>
@endsection

