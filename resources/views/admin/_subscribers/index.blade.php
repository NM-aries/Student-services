@extends('layouts.master')

@section('title' , 'Subscribers')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/choices.min.css') }}">
    
    <style>
        #subscribers_info,#subscribers_length{
            display:none
        }
        div.dataTables_wrapper div.dataTables_filter{
            text-align: left !important;
        }
        #table_subs #subscribers_wrapper .col-sm-12.col-md-6{
            width: 100%;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-7 mb-4 ">
        <div class="card ">
            <div class="card-body">
                <div>
                    From: <a class="text-danger"> {{ Auth::user()->email }}</a>
                </div>
                <div>
                    To: <a class="text-info">All Subscribers</a>
                </div>
                <form action="{{ url('admin/subscribers/send-email') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Subject</label>
                        <input name="subject" type="text" class="form-control">
                    </div>
    
                    <div class="form-group my-3">
                        <label for="">Title</label>
                        <input name="title" type="text" class="form-control">
                    </div>
    
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="email_body" cols="30" rows="10">
    
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
    <div class="d-none d-md-block col-md-5">
        <div class="card">
            <div class="card-body px-2 table-responsive" id="table_subs">
                <table class="table table-centered table-hover mb-0 rounded" id="subscribers">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Name</th>
                            <th class="border-0 rounded-end">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subs as $sub )
                        <tr>
                            <td>{{ $sub->name }}</td>
                            <td>{{ $sub->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>

@endsection


@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}" defer ></script>
    <script src="{{asset('js/dataTables.bootstrap5.min.js')}}" defer></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script src="{{ asset('js/choices.min.js') }}"></script>


    
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#email_body' ) );

        // $(document).ready(function() {
        //     $('.select2').select2();
        // });

        $(document).ready(function () {
            $('#subscribers').DataTable({
                destroy: true,
            });
        });

        $(document).ready(function() {
    $("#checkbox").click(function(){
      if($("#checkbox").is(':checked') ){ //select all
        $("#e1").find('option').prop("selected",true);
        $("#e1").trigger('change');
      } else { //deselect all
        $("#e1").find('option').prop("selected",false);
        $("#e1").trigger('change');
      }
  });
});

        
    </script>
@endsection