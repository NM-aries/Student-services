<div class="card shadow border-0 ">
    <div class="card-body">
        <h2 class="h5 mb-4">General Information</h2>
        <div class="row mt-3">
            <div class="col-3">
                <p class="">Full Name</p>
            </div>
            <div class="col-9">
                <p class="text-muted">{{$user->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p class="">User ID</p>
            </div>
            <div class="col-9">
                <p class="text-muted ">{{$user->user_id}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p class="">Email</p>
            </div>
            <div class="col-9">
                <p class="text-muted ">{{$user->email}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p class="">Mobile</p>
            </div>
            <div class="col-9">
                <p class="text-muted ">{{$user->contact}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p class="">Role</p>
            </div>
            <div class="col-9">
                @if ($user->is_admin == 1)
                    Administrator
                @else
                    Staff
                @endif
            </div>
        </div>
    </div>
</div>