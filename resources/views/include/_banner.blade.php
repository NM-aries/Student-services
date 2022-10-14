
    <div id="carouselExampleIndicators" class="carousel slide mb-3" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach ($banner as $indicator )
                <button type="button" data-bs-target="#carouselExampleIndicators" aria-current="true" aria-label="Slide 1"
                    data-bs-slide-to="{{ $loop->index }}" 
                    @if($loop->first) class=" bg-primary active" @endif>
                </button>
            @endforeach
        </div>
        <div class="carousel-inner bg-gray">
            @foreach ( $banner as $banners )
                <div @if($loop->first) class="carousel-item active" @endif class="carousel-item" >
                    <a @if($banners->link)
                            href="{{ $banners->link }}" target="_blank" 
                        @else 
                            href="#" 
                        @endif>
                        <div class="img">
                            <img class="d-block img-fluid" width="100%" src="{{ asset('upload/banner/'. $banners->image) }}" alt="{{ $banners->description }}">
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="30" height="30" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
            </svg>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="30" height="30" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
              </svg>
        </button>
    </div>