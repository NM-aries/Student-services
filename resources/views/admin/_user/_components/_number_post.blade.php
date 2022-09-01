<div class="card shadow border-0 ">
    <div class="card-body">
        <h2 class="h5 mb-4">Number of Posts</h2>
        
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ url('admin/announcement/') }}" class="fs-6 text-primary fw-bold mb-1">
                    ANNOUNCEMENTS
                </a>
                <span class="badge py-2 px-3 bg-warning badge-pill badge-round ml-1">
                    {{$user_announcement->count()}} 
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ url('admin/news/') }}" class="fs-6 text-primary fw-bold mb-1">
                    NEWS
                </a>
                <span class="badge py-2 px-3 bg-danger badge-pill badge-round ml-1">
                    {{$user_news->count()}} 
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ url('admin/services/') }}" class="fs-6 text-primary fw-bold mb-1">
                    SERVICES
                </a>
                <span class="badge py-2 px-3 bg-info badge-pill badge-round ml-1">
                    {{$user_services->count()}} 
                </span>
            </li>
        </ul>
    </div>
</div>