@extends('layouts.master')


@section('title' , 'Edit user')

@section('breadcrumbs')
    {{ Breadcrumbs::render('user_edit') }}
@endsection


@section('content')
<div class="col-10">
    <div class="card border-0 shadow mb-4">
        <div class="card-body p-3">
            <form action="{{url('admin/users/update/'. $user->id)}}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if($errors->any())
                    <div class="alert alert-danger fade show">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-3">
                        <div class="col-12 mb-4">
                            <label for="formFile" class="form-label">Profile Image</label>
                            <div class="imgholder"></div>
                            <input class="form-control" type="file" id="formFile" name="profilePic" value="{{$user->profile_img}}">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group has-icon-left">
                                    <label for="name">Name</label>
                                    <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}">
                                </div>
                            </div>
                            
                            <div class="col-12 mb-3 ">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
                                </div>
                            </div>
    
                            <div class="col-12 mb-3">
                                <div class="form-group has-icon-left">
                                    <label for="contact">Mobile</label>
                                    <input type="tel" name="contact" class="form-control" id="contact" value="{{$user->contact}}">   
                                </div>
                            </div>
    
                            <div class="col-12 mb-3">
                                <div class="form-group has-icon-left">
                                    <label for="username">Email</label>
                                    <div class="position-relative">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required placeholder="Email Address">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group has-icon-left">
                                    <label for="username">Status</label>
                                    <div class="position-relative">
                                        <select name="status" id="" class="form-control">
                                            <option value="1" {{ old('status') == $user->status ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ old('status') == $user->status ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-patch-question-fill"></i>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @if (Auth::user()->is_admin == 1)
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="username">Role</label>
                                        <div class="position-relative">
                                            <select name="is_admin" id="" class="form-control">
                                                <option value="1" {{ old('status') == $user->is_admin ? 'selected' : ''}}>Administrator</option>
                                                <option value="0" {{ old('status') == $user->is_admin ? 'selected' : ''}}>Staff</option>
                                            </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            @endif
    
                            <div class="col-12 d-flex mt-2">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Update
                                </button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                    Reset
                                </button>
                            </div>
    
                        </div> {{-- end row --}}
                    </div>       
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script>
        $('input[type="file"][name="profilePic"]').val('');

        $('input[type="file"][name="profilePic"]').on('change', function(){
            var img_path = $(this)[0].value;
            var imgholder = $('.imgholder');
            var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

            if(extension == 'jpeg' || extension == 'jpg' || extension == 'png' || extension == 'gif'){
                if(typeof(FileReader) != 'undefined'){
                    imgholder.empty();
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100%;margin-bottom:10px'}).
                        appendTo(imgholder);
                    }
                    imgholder.show();
                    reader.readAsDataURL($(this)[0].files[0])
                }else{
                    $(imgholder).html('This Browser does not support FileReader');
                }
            }else{
                $(imgholder).empty();
            }
        });
    </script>
@endsection
