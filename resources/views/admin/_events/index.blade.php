@extends('layouts.master')

@section('title', 'Events Calendar ')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('events') }}
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card border-0 shadow mb-4">
            <div class="card-body p-1">
                <table class="table table-centered table-hover mb-0 rounded" id="data">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Title</th>
                            <th class="border-0 ">Location</th>
                            <th class="border-0">Start</th>
                            <th class="border-0">End</th>
                            <th class="border-0 rounded-end">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        @foreach($events as $items )
                            <tr class="align-middle">
                                <td>{{ Str::limit($items->title, 40) }}</td>
                                <td>{{ $items->location ?? 'None'}}</td>
                                <td>{{ date('M d,Y', strtotime($items->start)) }}</td>
                                <td>{{ date('M d,Y', strtotime($items->end)) }}</td>
    
                                <td>
                                    <button class="btn btn-link dropdown-toggle m-0 p-0" data-bs-toggle="dropdown"  aria-expanded="false">
                                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                            </path>
                                        </svg>
                                    </button>
                        
                                    <div class="dropdown-menu bg-primary text-white dashboard-dropdown px-2">
                                        <a class="dropdown-item align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#editModal{{ $items->id }}" role="button"
                                            >
                                            <img src="{{ asset('images/icons/edit.webp') }}" alt="" class="action_icon"> 
                                            Edit Post
                                        </a>
                                        <a  class="dropdown-item align-items-center" 
                                            href="{{ url('admin/events/remove/'.$items->id) }}">
                                            <img src="{{ asset('images/icons/trash.webp') }}" alt="" class="action_icon"> 
                                            Remove
                                        </a>
                                    </div>
                                    
                                </td>
                            </tr>
                            @include('admin/_include/_editEvent_modal')
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin/_include/_event_modal')

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
    .create( document.querySelector('#description' ) )
</script>

    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                header: {
                    left: 'title',
                    center: '',
                    right: 'prev,next'
                },
                nextDayThreshold: '10:00:00',
                displayEventTime: false,
                selectable: true,
                selectHelper: true,

                events : [
                    @foreach($events as $event)
                    {
                        id : '{{ $event->id }}',
                        title : '{{ $event->title }}',
                        start : '{{ $event->start }} 00:00:00',
                        end : '{{ $event->end }} 11:00:00',
                        backgroundColor: '{{ $event->backgroundColor }}',
                        borderColor : 'rgba(50, 115, 220, 0.3)',
                        textColor: '{{ $event->textColor }}',
                        allDay: false,
                    },
                    @endforeach
                ],
                select: function(start, end, allDay) {
                    var start_date = moment(start).format('YYYY-MM-DD');
                    var end_date = moment(end).subtract(1,'days').format('YYYY-MM-DD');
                    allDay:false;
                    $('#start').val(start_date);
                    $('#end').val(end_date);
                    $('#addEvent').modal('show');
                },
            })
        });
    </script>


@endsection
