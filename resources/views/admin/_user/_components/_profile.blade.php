<div class="col-12">
    <div class="card shadow border-0 text-center p-0">
        <div class="profile-cover rounded-top" style="background: url({{ asset('images/others/cover.gif') }});"></div>
        <div class="card-body pb-4">
            <img src="{{ asset('images/user/'.$user->profile_img) }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="User Portrait">
            <h4 class="h3">
                {{ $user->fname }}
            </h4>
            <p class="text-gray mb-4">
                @if ($user->status)
                   <span class="btn text-white btn-sm btn-success">
                        Active
                   </span>
                @else
                    <span class="btn text-white btn-sm btn-danger">
                        Inactive
                    </span>
                @endif
            </p>
            <a href="{{ url('admin/users/edit/'.$user->id) }}" class="btn btn-sm btn-secondary" href="#">
                Update User
            </a>
        </div>
    </div>
</div>