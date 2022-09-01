@extends('layouts.master')


@section('title' , 'Register New User ')

@section('breadcrumbs')
    {{ Breadcrumbs::render('user_create') }}
@endsection

@section('content')
<div class="col-10">
    <div class="card border-0 shadow mb-4">
        <div class="card-body p-3">
            <form action="{{url('admin/users/add')}}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
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
                            <label for="formFile" class="form-label">Profile Picture</label>
                            <div class="imgholder"></div>
                            <input class="form-control" type="file" id="formFile" name="profilePic">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Name</label>
                                    <div class="position-relative">
                                        <input type="text" name="name" class="form-control"  id="first-name-icon" autocomplete="off">
                                        <div class="form-control-icon">
                                            <i class="bi bi-card-text"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <div class="form-group has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" name="username" class="form-control" id="username" autocomplete="off">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12 mb-2">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Mobile</label>
                                    <div class="position-relative">
                                        <input type="tel" name="contact" class="form-control"  id="first-name-icon" autocomplete="off">
                                        <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12 mb-2">
                                <div class="form-group has-icon-left">
                                    <label for="username">Email</label>
                                    <div class="position-relative">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12 mb-2">
                                <div class="form-group has-icon-left">
                                    <label for="username">Password</label>
                                    <div class="position-relative">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" >
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12 mb-2">
                                <div class="form-group has-icon-left">
                                    <label for="username">Confirm Password</label>
                                    <div class="position-relative">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" >
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12 mb-2 col-md-6">
                                <div class="form-group has-icon-left">
                                    <label for="username">Status</label>
                                    <div class="position-relative">
                                        <select name="status" id="" class="form-control">
                                            <option value="1" {{ old('status') == '1' ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ old('status') == '1' ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 col-md-6">
                                <div class="form-group has-icon-left">
                                    <label for="username">Role</label>
                                    <div class="position-relative">
                                        <select name="is_admin" id="" class="form-control">
                                            <option value="1" {{ old('is_admin') == '1' ? 'selected' : ''}}>Administrator</option>
                                            <option value="0" {{ old('is_admin') == '0' ? 'selected' : ''}}>Staff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12 mb-2 ">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Register
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

            if(extension == 'jpeg' || extension == 'jpg' || extension == 'png' ){
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