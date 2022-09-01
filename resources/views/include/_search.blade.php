<div class="">
    <div class="card-body">
        <div class="card shadow-sm">
           <div class="card-body">
            <form action="{{ url('search') }}" action="GET">
                <div class="input-group">
                    
                        <input type="text" name="search" class="form-control" placeholder="Search here..." aria-describedby="basic-addon1">
                        <button type="submit" class="text-white bg-danger input-group-text" id="basic-addon1">
                            Search
                        </button>
                    
                </div>
            </form>
           </div>
        </div>
        <div class="card shadow-sm  d-lg-block">
            <div class="card-body">
                <div style="text-align:center;"> 
                    <h5>
                        <a style="text-decoration:none;" href="#">
                            <span >Philippines Standar Time:</span>    
                        </a>
                    </h5> 
                    <iframe 
                        src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FManila" 
                        width="100%" 
                        height="90" 
                        frameborder="0" 
                        style="pointer-events: none">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>