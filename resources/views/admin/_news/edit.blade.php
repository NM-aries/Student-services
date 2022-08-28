@extends('layouts.master')

@section('title' , 'Update Announcement')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('news_edit', $news) }}
@endsection



@section('content')

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <form action="{{url('admin/news/update/'.$news->id)}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" name="created_by" value="{{$news->created_by}}">
                            <input type="hidden" name="updated_by" value="{{ Auth::user()->name}}">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{$news->title}}">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" id="slug" class="form-control" name="slug" value="{{$news->slug}}">
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" rows="8" name="description" >
                                        {{$news->description}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="formFile" class="form-label">Cover Image</label>
                                <div class="row mb-3">
                                    <div class="col-md-5 ">
                                        <label for="">
                                            <small class="fs-6 text-danger">Current Cover</small>
                                        </label>
                                        <div>
                                            @if (!$news->coverimage)
                                                <img class="cover_img" src="{{ asset('images/others/No_Cover.jpg') }}" alt="">
                                            @else
                                                <img class="cover_img" src="{{ asset('upload/news/'. $news->coverimage) }}" alt=""> 
                                            @endif   
                                        </div>    
                                    </div>
                                    <div class="col-md-1 d-md-flex align-items-center p-0 d-none d-md-block">
                                         <div class="fs-2 w-100 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                                                <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                                              </svg>
                                         </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">
                                            <small class="fs-6 text-danger">Replaced Cover</small>
                                        </label>
                                        <div class="">
                                            <div class="img_holder"></div>
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control" type="file" id="formFile" name="coverimage" value="{{$news->coverimage}}">
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="meta-keyword">Status</label>
                                    <select name="status" class="select2 form-control">
                                        <option value="1" {{ old('status') == $news->status ? 'selected' : ''}}>Publish</option>
                                        <option value="0" {{ old('status') == $news->status ? 'selected' : ''}}>Draft</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-block btn-success me-1 mb-1" id="submitBtn" >
                                    <span class="loading-icon spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    <span class="visually-hidden">Loading...</span>
                                    <span class="btn-txt">Update</span>
                                </button>
                                
                            </div>
                        </div>
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

    $('input[type="file"][name="coverimage"]').val('');
    $('input[type="file"][name="coverimage"]').on('change', function(){
        var img_path = $(this)[0].value;
        var img_holder = $('.img_holder');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
        if(extension == 'jpeg' || extension == 'jpg' || extension == 'png' || extension == 'webp' ){
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
       $.get('{{ url('admin/news/checkslug') }}', 
       { 'title': $(this).val() }, 
       function( data ) {
           $('#slug').val(data.slug);
       }
       );
    });
</script>
@endsection
