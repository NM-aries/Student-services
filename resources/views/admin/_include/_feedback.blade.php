<div class="modal fade" tabindex="-1" id="feedback{{ $items->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-6">
                    <p><b>Name:</b> {{ $items->name }}</p>
                </div>
                <div class="col-6">
                    <p><b>Contact Number:</b> {{ $items->contact }}</p>
                </div>
                <div class="col-12">
                    <p><b>Email:</b> {{ $items->email }}</p>
                </div>
                <div class="col-12">
                    <b for="">Description</b>
                    <p class="">
                        {!! $items->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
