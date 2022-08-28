
<div class="pt-4">
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-1 mb-lg-0">
            <h1 class="h4">
                @yield('title')
            </h1>
            <nav aria-label="breadcrumb" class="d-md-inline-block">
               @yield('breadcrumbs')
            </nav>    
        </div>
        <div class="mt-4">
            @yield('create_button')
        </div>

        
    </div>
</div>