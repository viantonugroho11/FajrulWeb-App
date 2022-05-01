<header class="header-area">
  <!-- Main Header Start -->
  <div class="main-header-area">
    <div class="classy-nav-container breakpoint-off">
      <!-- Classy Menu -->
      <nav class="classy-navbar justify-content-between" id="uzaNav">

        <!-- Logo -->
        <a class="nav-brand" href="/"><img src="{{asset('assets/frontend/v1/imgfajrul/core-img/logo-faris.png')}}" alt=""></a>

        <!-- Navbar Toggler -->
        <div class="classy-navbar-toggler">
          <span class="navbarToggler"><span></span><span></span><span></span></span>
        </div>

        <!-- Menu -->
        <div class="classy-menu">
          <!-- Menu Close Button -->
          <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
          </div>

          <!-- Nav Start -->
          <div class="classynav">
            <ul id="nav">
              {{-- if request link --}}
              <li class="@if (request()->is('/')) current-item @endif"><a href="/">Home</a></li>
              <li class="@if (request()->is('/tentang')) current-item @endif"><a href="/tentang">Tentang</a></li>
              <li class=""><a href="/proyek">Proyek</a></li>
              <li class="@if (request()->is('/tentang')) current-item @endif"><a href="/blog">Blog</a></li>
              <li class="@if (request()->is('/tentang')) current-item @endif"><a href="/acara">Acara</a></li>
              <li class=""><a href="/sertifikat">Sertifikat</a></li>
            </ul>

            <!-- Get A Quote -->
            <!-- <div class="get-a-quote ml-4 mr-3">
                                <a href="#" class="btn uza-btn">Get A Quote</a>
                            </div> -->

            <!-- Login / Register -->
            {{-- <div class="login-register-btn mx-3">
                <a href="#">Login <span>/ Register</span></a>
              </div> --}}

            <!-- Search Icon -->
            {{-- <div class="search-icon" data-toggle="modal" data-target="#searchModal">
                <i class="icon_search"></i>
              </div> --}}
          </div>
          <!-- Nav End -->

        </div>
      </nav>
    </div>
  </div>
</header>
