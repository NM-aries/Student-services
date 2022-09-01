@if (Session::has('message'))
<div class="position-fixed bottom-0 end-0 animate__animated animate__bounceInRight animate__delay-1s" style="width:auto; !important; z-index: 11" >
    <div class="alert alert-dark alert-dismissible fade shadow rounded-0" role="alert" id="alert">
        <div class="row rounded-0">
            <div class="col-3">
                <img src="{{ asset('images/icons/hooray_person.webp') }}" alt="" width="100">
            </div>
            <div class="col-9  text-white align-middle">
                <p>
                    <h4 class="fs-6 fw-600"> Hooray !</h4>
                    {{ session('message') }}
                </p>
            </div>
        </div>
    </div>
</div>
@endif
