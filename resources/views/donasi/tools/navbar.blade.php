<div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="#" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-money-bill-alt me-2"></i>Faris Fundaraise</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('donasi.index')}}" class="nav-item nav-link active">Beranda</a>
                    <a href="{{route('donasi.kampanye.index')}}" class="nav-item nav-link">Donasi</a>
                    <a href="contact.html" class="nav-item nav-link">Kontak</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <a href="https://htmlcodex.com/startup-company-website-template" class="btn btn-primary py-2 px-4 ms-3">Cek Donasi</a>
            </div>
        </nav>

        @yield('carousel')

    </div>
