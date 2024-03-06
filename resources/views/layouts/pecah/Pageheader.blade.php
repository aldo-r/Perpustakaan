<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    @yield('name')
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                @stack('btn')
            </div>
        </div>
    </div>
</div>
