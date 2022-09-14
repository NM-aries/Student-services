@extends('layouts.master')

@section('title' , 'Create Service')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('services_create') }}
@endsection


@section('content')

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <form action="{{url('admin/services/store')}}" method="POST" role="form" enctype="multipart/form-data" id="frm">
            @csrf
            <div class="row">
               
                @if($errors->any())
                <div class="col-12">
                    <div class=" bg-danger px-3 pt-3 pb-2 mb-3 text-white status fade show">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                            
                        @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <div class="col-12 col-md-12 mb-2">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required >
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <div class="form-group">
                        <label for="description"></label>
                        <textarea name="description" id="description" class="form-control">
                            {{ old('description') }}
                        </textarea>
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <label for="formFile" class="form-label">File </label> <small class="text-danger text-xs">(Optional)</small>
                    <div class="img_holder"></div>
                    <input class="form-control" type="file" id="formFile" name="file" value="{{ old('file') }}">
                </div>

                <div class="col-12 mb-2">
                    <div class="form-group">
                        <label for="meta-keyword">Status</label>
                        <select name="status" class="select2 form-control">
                            <option value="1">Publish</option>
                            <option value="0">Draft</option>
                        </select>
                    </div>
                </div>
                

                <div class="col-12 mt-4">
                    <button type="submit" id="save_btn" class="save_btn btn btn-block btn-primary me-1 mb-1 " id="submitBtn" >
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection




@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/ckeditor.js') }}"></script>

<script>

    ClassicEditor
    .create( document.querySelector( '#description' ) )
    
    $(document).ready(function() {
        $('.select2').select2();
    });

</script>

@endsection
