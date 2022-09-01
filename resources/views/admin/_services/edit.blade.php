@extends('layouts.master')

@section('title' , 'Update Service')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('services_edit') }}
@endsection


@section('content')

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <form action="{{url('admin/services/update/'.$services->id)}}" method="POST" role="form" enctype="multipart/form-data" id="frm">
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

                <div class="col-12 col-md-6 mb-2">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $services->title }}" required >
                        <input type="hidden" name="created_by" value="{{ $services->created_by }}">
                    
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" class="form-control" name="slug"  value="{{ $services->slug }}" required autocomplete="off">
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <div class="form-group">
                        <label for="description"></label>
                        <textarea name="description" id="description" class="form-control">
                            {{ $services->description }}
                        </textarea>
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <label for="formFile" class="form-label">File <small class="text-danger text-xs">(Compressed file Example: Zip, Rar)</small></label>
                    <div class="img_holder"></div>
                    <input class="form-control" type="file" id="formFile" name="coverimage">
                </div>

                <div class="col-12 mb-2">
                    <div class="form-group">
                        <label for="meta-keyword">Status</label>
                        <select name="status" class="select2 form-control">
                            <option value="1" {{ old('status') == $services->status ? 'selected' : ''}}>Publish</option>
                            <option value="0" {{ old('status') == $services->status ? 'selected' : ''}}>Draft</option>
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
       $.get('{{ url('admin/announcement/checkslug') }}', 
       { 'title': $(this).val() }, 
       function( data ) {
           $('#slug').val(data.slug);
       }
       );
    });
</script>
@endsection