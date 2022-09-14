@extends('layouts.master')

@section('title' , 'Update Banner')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('banner_edit', $banner) }}
@endsection



@section('content')

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <form action="{{ url('admin/banner/update/'.$banner->id) }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                    <div class="col-12 mb-2">
                        <label for="formFile" class="form-label">
                            Banner Image 
                            {{-- <small class="text-warning"></small>   --}}
                        </label>
                        <div class="img_holder mb-2"></div>
                        <input class="form-control" type="file" id="formFile" name="bannerimage" value="{{$banner->image}}">
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control" name="title" value="{{ $banner->title }}">
                            <input type="hidden" name="created_by" value="{{ $banner->created_by }}">
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label for="link">
                                Link 
                                <small>(Optional)</small>
                            </label>
                            <input type="text" id="link" class="form-control" name="link" value="{{ $banner->link }}">
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="form-group" id="banner">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" name="description" >
                                {!! $banner->description !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-block btn-success me-1 mb-1" id="submitBtn" >
                            <span class="loading-icon spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <span class="btn-txt">Update</span>
                        </button>
                    </div>
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

    $('input[type="file"][name="bannerimage"]').val('');
    $('input[type="file"][name="bannerimage"]').on('change', function(){
        var img_path = $(this)[0].value;
        var img_holder = $('.img_holder');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
        if(extension == 'jpeg' || extension == 'jpg' || extension == 'png' || extension == 'webp' || extension == 'gif' ){
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
<script>
    $('#title').change(function(e) {
       $.get('{{ url('admin/announcement/checkslug') }}', 
       { 'title': $(this).val() }, 
       function( data ) {
           $('#slug').val(data.slug);
       }
       );
    });
</script>
@endsection
