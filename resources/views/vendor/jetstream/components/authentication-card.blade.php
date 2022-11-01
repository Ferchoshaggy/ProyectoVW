<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-sm-12 col-md-8 col-lg-5 my-4">
            <div>
                {{ $logo }}
            </div>

            <div class="card shadow-sm px-1 mx-4" style="background-color: rgba(255, 255, 255, 0.1)">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
