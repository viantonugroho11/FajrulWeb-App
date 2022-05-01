<section class="uza-newsletter-area">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <!-- Newsletter Content -->
      <div class="col-12 col-md-6 col-lg-6">
        <div class="nl-content mb-80">
          <h2>Tetap terhubung dengan kami</h2>
          <p>Agar kamu tetap mendapatkan informasi terbaru dari kami</p>
        </div>
      </div>
      <!-- Newsletter Form -->
      <div class="col-12 col-md-6 col-lg-5">
        <div class="nl-form mb-80">
          <form action="{{ route('landing.newsletter') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="email" name="nl-email" value="" placeholder="Your Email">
            <button type="submit">TERHUBUNG!</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Border Bottom -->
    <div class="border-line"></div>
  </div>
</section>