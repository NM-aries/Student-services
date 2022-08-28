@extends('layouts.master')

@section('title' , 'Create Announcement')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('banner_create') }}
@endsection


@section('content')

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <form action="{{url('admin/banner/store')}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-12 mb-2">
                        <label for="formFile" class="form-label">
                            Banner Image <br>
                            <small class="text-warning">* Upload only (1536x461 pixel) Resolution..</small>  
                        </label>
                        <div class="img_holder mb-2"></div>
                        <input class="form-control" type="file" id="formFile" name="bannerimage">
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label for="link">
                                Link 
                                <small>(Optional)</small>
                            </label>
                            <input type="text" id="link" class="form-control" name="link">
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="form-group" id="banner">
                            <label for="description">Description</label>
                            <textarea id="editor" class="form-control" name="description" ></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-block btn-success me-1 mb-1" id="submitBtn" >
                            <span class="loading-icon spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <span class="btn-txt">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection





@section('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
</script>

<script>
    $('input[type="file"][name="bannerimage"]').val('');

    $('input[type="file"][name="bannerimage"]').on('change', function(){
        var img_path = $(this)[0].value;
        var img_holder = $('.img_holder');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

        if(extension == 'jpeg' || extension == 'jpg' || extension == 'png' || extension == 'webp'){
            if(typeof(FileReader) != 'undefined'){
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e){
                    $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100%;margin-bottom:10px'}).
                    appendTo(img_holder);
                }
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0])
            }else{
                $(img_holder).html('This Browser does not support FileReader');
            }
        }else{
            $(img_holder).empty();
        }
    });
</script>
@endsection
