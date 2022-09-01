<div class="card shadow border-0 ">
    <div class="card-body ">
        <h2 class="h5 mb-4">User Posts</h2>
        <ul class="nav nav-pills nav-justified mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#announcement" role="tab" aria-controls="home" aria-selected="false" tabindex="-1">
                    Announcement
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#news" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">
                    News
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link " id="contact-tab" data-bs-toggle="tab" href="#services" role="tab" aria-controls="contact" aria-selected="true">
                    Services
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="announcement" role="tabpanel" aria-labelledby="home-tab">
                <p class="my-2">
                    @if ($user_announcement->first())
                        <div class="list-group list-group-flush list-group-timeline">
                            @foreach ($user_announcement as $user_announce)
                            <div class="list-group-item border-0">
                                <div class="row ps-lg-1">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xs bg-warning rounded">
                                            <img class="_icon" src="{{ asset('images/icons/announcement.webp') }}" alt="icon">
                                        </div>
                                    </div>
                                    <div class="col ms-n2">
                                        <a href="{{ url('admin/announcement/view/'.$user_announce->id) }}" class="fs-6 text-warning fw-bold mb-1">{{ $user_announce->title }}</a>
                                        <p class="mb-0">
                                            {!! Str::limit($user_announce->description, 150) !!}
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                            <span class="small">{{$user_announce->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">
                            No Data
                        </p>
                    @endif
                    
                </p>
            </div>
            <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="profile-tab">
                <p class="mt-2">
                    @if ($user_news->first())
                        <div class="list-group list-group-flush list-group-timeline">
                            @foreach ($user_news as $news)
                            <div class="list-group-item border-0">
                                <div class="row ps-lg-1">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xs bg-danger rounded">
                                            <img class="_icon" src="{{ asset('images/icons/news.webp') }}" alt="icon">
                                        </div>
                                    </div>
                                    <div class="col ms-n2">
                                        <a href="{{ url('admin/news/view/'.$news->id) }}" class="fs-6 text-danger fw-bold mb-1">{{ $news->title }}</a>
                                        <p class="mb-0">
                                            {!! Str::limit($news->description, 150) !!}
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                            <span class="small">{{$news->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">
                            No Data
                        </p>
                    @endif
                </p>
            </div>
            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="contact-tab">
                <p class="mt-2">
                    @if ($user_services->first())
                        <div class="list-group list-group-flush list-group-timeline">
                            @foreach ($user_services as $services)
                            <div class="list-group-item border-0">
                                <div class="row ps-lg-1">
                                    <div class="col-auto">
                                        <div class="icon-shape icon-xs bg-info rounded">
                                            <img class="_icon" src="{{ asset('images/icons/services.webp') }}" alt="icon">
                                        </div>
                                    </div>
                                    <div class="col ms-n2">
                                        <a href="{{ url('admin/services/view/'.$services->id) }}" class="fs-6 text-info fw-bold mb-1">{{ $services->title }}</a>
                                        <div class="d-flex align-items-center">
                                            <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                            <span class="small">{{$services->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">
                            No Data
                        </p>
                    @endif
                    
                </p>
            </div>
        </div>
    </div>
</div>