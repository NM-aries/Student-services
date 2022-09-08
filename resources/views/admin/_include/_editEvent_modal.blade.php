<div class="modal fade" tabindex="-1" id="editModal{{ $items->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/events/edit-event/'. $items->id) }}" method="post">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="mb-2">
                        <label class="col-form-label">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $items->title }}">
                    </div>
                    <div class="mb-2">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" name="description" id="description">{{ $items->description }}</textarea>
                    </div>

                    <div class="mb-2">
                        <label for="message-text" class="col-form-label">Organizer:</label>
                        <input type="text" class="form-control" name="organizer" id="organizer" value="{{ $items->organizer }}">
                    </div>

                    <div class="mb-2">
                        <label for="message-text" class="col-form-label">Location:</label>
                        <input type="text" class="form-control" name="location" id="location" value="{{ $items->location }}">
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <label class="col-form-label">Background Color:</label>
                        <input type="color" class="form-control" name="backgroundColor" value="{{ $items->backgroundColor }}" >
                    
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="col-form-label">Text Color:</label>
                        <input type="color" class="form-control" name="textColor" value="{{ $items->color }}">
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="col-form-label">Start Date:</label>
                        <input type="date" class="form-control" name="start" value="{{ $items->start }}" >
                    </div>

                    <div class="col-12 col-md-6 mb-3" id="datetimepicker">
                        <label class="col-form-label">End Date:</label>
                        <input type="date" class="form-control" name="end" value="{{ $items->end }}" >
                    </div>

                    <div class="col-12 col-md-6" id="datetimepicker">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
