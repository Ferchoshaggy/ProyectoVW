<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-sm-12 col-md-8 col-lg-5 my-3">
            <div>
                {{ $logo }}
            </div>

            <div class="card shadow-sm px-1 mx-4" style="background-color: rgba(0, 0, 0, 0.384)">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
