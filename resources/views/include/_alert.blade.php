@if (Session::has('message'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div class="alert bg-success alert-dismissible fade shadow" role="alert" id="alert">
            <strong>Congratulation</strong>
            <br> {{ session::get('message') }}
            <small>
                <a type="button" class="btn-close" data-bs-dismiss="alert"></a>
            </small>
          </div>
    </div>
@endif
