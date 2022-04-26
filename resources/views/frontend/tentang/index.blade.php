@extends('frontend.master')

@section('content')
  @include('frontend.tools.carosuel')
  <div class="content d-flex mb-5">
    <h4 class="font-weight-normal m-auto text-center" style="width: 80%;">
      <b>Fajrul Islam</b> UKM Fajrul Islam Universitas Gunadarma merupakan suatu organisasi yang berbasis keislaman dan
      keberadaannya resmi di bawah wakil rektor III Universitas Gunadarma. Salah satu tujuan Fajrul Islam sebagai lembaga
      dakwah kampus tidak lain adalah membumikan nilai-nilai Islam di kampus Universitas Gunadarma tercinta.
      </h2>
  </div>
  <section class="uza-blog-area">
    <div class="blog-bg-curve">
      <img src="./img/core-img/curve-4.png" alt="">
    </div>

    <div class="container">
      <div class="row">
        <!-- Section Heading -->
        <div class="col-12">
          <div class="section-heading text-center">
            <h3>Visi Misi</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Single Blog Post -->
        <div class="col-12 col-lg-6">
          <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/10.jpg);">
            <!-- Post Content -->
            <div class="post-content">
              {{-- <span class="post-date"><span>08</span> July, 2022</span> --}}
              <a href="#" class="post-title">VISI</a>
              <p>Organisasi ini bertujuan sebagai wadah yang menghimpun seluruh mahasiswa muslim Universitas Gunadarma dalam meningkatkan iman, ilmu dan amal dalam kerangka ukhuwah dan dakwah islamiyah, serta mewujudkan kesejahteraan bersama.
</p>
            </div>
          </div>
        </div>

        <!-- Single Blog Post -->
        <div class="col-12 col-lg-6">
          <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/10.jpg);">
            <!-- Post Content -->
            <div class="post-content">
              {{-- <span class="post-date"><span>08git add .</span> July, 2022</span> --}}
              <a href="#" class="post-title">MISI</a>
              <ul>
                <li>Mengikat anggota dalam jalinan dakwah dan ukhuwah islamiyah </li>
                <li>Sebagai sarana yang menampung aspirasi anggota </li>
                <li>Sebagai lembaga formal kampus untuk mengembangkan moralitas, intelektualitas, dan profesionalitas</li>
                <li>Sebagai kontrol sosial dan moral kehidupan kampus </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="uza-about-us-area">
        <div class="container">
          <div class="row align-items-center">

            <!-- About Thumbnail -->
            <div class="col-12 col-md-6">
              <div class="about-us-thumbnail mb-80">
                <img src="{{ asset('assets/frontend/v1/imgfajrul/bg-img/bg-sejarah.png') }}" alt="">
              </div>
            </div>

            <!-- About Us Content -->
            <div class="col-12 col-md-6">
              <div class="about-us-content mb-80">
                <h2>Sejarah</h2>
                <p> Periode Tahun 1981 s/d 1988. Pada awalnya, Lembaga Dakwah Kampus di Sekolah Tinggi Gunadarma hanya sebagai sebuah perkumpulan Mahasiswa dan Mahasiswi yang aktif mengelola Mushola di Kampusnya, yang saat itu masih berlokasi di Kampus Salemba. Di Kampus Salemba sendiri ada 2 konsentrasi jurusan perkuliahan:
1. Sekolah Tinggi Manajemen Informatika Komputer Gunadarma dan
2. Sekolah Tinggi Ilmu Ekonomi Gunadarma.
Karena rutinnya dalam pengelolaan Mushola menjadi sebuah prestasi tersendiri, akhirnya perkumpulan mahasiswa tersebut mendapat kepercayaan untuk menyelenggarakan Kegiatan Panitia Hari Besar Islam oleh pihak Kampus. Tahun demi tahun kegiatan PHBI ini berlangsung.
Tahun 1985-1986 adalah Peletakan Batu Pertama untuk pendirian cabang bangunan Kampus Gunadarma di Margonda Depok, yang otomatis perkumpulan mahasiswa-mahasiswi Muslim yang akrab disebut Rohis (Rohani Islam) harus ikut serta dalam memobilisasi tempat ibadah di Kampus Margonda ini. Sebetulnya antara pengurus Rohis STIE Gunadarma dan STMIK Gunadarma itu berbeda, karena terkait posisi bangunan yang jaraknya cukup jauh, sehingga belum bergabung. Hal ini dikarenakan belum disahkannya kegiatan tersebut sebagai Unit Kegiatan Mahasiswa maka kegiatannya hanya sebatas mengurus Mushola dan penyelenggaraan PHBI.
Tahun 1988 Masjid Daarul Ilmi dibangun dan setelah selesai, ini merupakan Masjid terbesar di Gunadarma. Melalui Masjid inilah menjadi sarana menjadi sebuah tempat untuk melakukan koordinasi terkait kegiatan Keislaman.
Periode 1998 adalah masa di mana segala konsep yang sebelumnya disiapkan dapat direalisasikan. Dengan menimbang hal-hal sebelumnya, yaitu kontribusi Rohis yang nyata terhadap kampus, serta rutinnya melaksanakan pendelegasian di setiap organisasi kampus, membuat langkah Senat Mahasiswa, dan BEM yang diisi oleh Rohis saat itu mampu berperan dalam peristiwa aksi demo menyuarakan aspirasi ketika Kepemimpinan Presiden Soeharto.
Kemudian, pengurus Senat meminta agar Rohis diresmikan menjadi Unit Kegiatan Legal di Kampus Gunadarma. Karena, sebelumnya berstatus tetap legal, tetapi hanya sebatas sebagai perkumpulan saja. Ada ketika hanya ada acara. Setelah acara selesai, kembali pada kegiatan biasa, seperti diskusi, belum terorganisir secara baik. Akhirnya rohis berinisiatif untuk terjun di Senat.
Pada tanggal 28 Desember 1998 Rohis diresmikan menjadi Unit Kegiatan Mahasiswa dengan membawa hal baru, nama baru Fajrul Islam dan adanya sistem. Periode Tahun 1999 s/d 2003 merupakan masa-masa di mana Fajrul Islam yang pengurusnya aktif di berbagai BEM, baik BEM U dan BEM Fakultas, melakukan ekspansi dakwah dengan membentuk Badan Semi Otonom di bawah struktur pengurus BEM, seperti BEM FE terdapat KAESYAR (Kajian Ekonomi Syariah), BEM Psikologi terdapat Psikis (Psikologi Islam), Sastra Islam, dsb
</p>
                <a href="#" class="btn uza-btn btn-2 mt-4">Lihat selengkapnya</a>
              </div>
            </div>
          </div>
        </div>

        <!-- About Background Pattern -->
        <div class="about-bg-pattern">
          <img src="{{ asset('assets/frontend/v1/imgfajrul/core-img/curve-2.png') }}" alt="">
        </div>
      </div>

      <div class="uza-about-us-area">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <div class="about-us-content mb-80">
                <h2>Periode 2021/2022</h2>
                <p> Sehubungan dengan dimulainya tahun akademik baru 2021/2022, UKM Fajrul Islam sebagai lembaga kemahasiswaan bernuansa Islam yang ada di lingkungan Universitas Gunadarma mengadakan Open Recruitment yang merupakan seleksi untuk menjaring sumber daya manusia yang berkualitas dan layak untuk diangkat menjadi anggota ataupun menduduki suatu jabatan tertentu dari organisasi.
Tujuan kegiatan  ini adalah merekrut mahasiswa yang berkomitmen di jalan dakwah, membangun budaya literasi Islam pada diri  mahasiswa, membentuk karakter mahasiswa yang berakhlakul karimah, membuka kesempatan bagi mahasiswa untuk mengaktualisasikan diri, memaksimalkan potensi yang dimiliki setiap mahasiswa, memberikan manfaat kepada mahasiswa terkait peran organisasi.
</p>
                <a href="#" class="btn uza-btn btn-2 mt-4">Lihat selengkapnya</a>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="about-us-thumbnail mb-80">
                <img src="{{ asset('assets/frontend/v1/imgfajrul/bg-img/bg-periode.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>

        <!-- About Background Pattern -->
        <div class="about-bg-pattern">
          <img src="{{ asset('assets/frontend/v1/imgfajrul/core-img/curve-2.png') }}" alt="">
        </div>
      </div>
    </div>
  </section>
@endsection
