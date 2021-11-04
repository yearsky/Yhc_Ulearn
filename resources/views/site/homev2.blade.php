@extends('layouts.frontend.v2index')
@section('content')
  <!-- Section Hero -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        @foreach($slider as $sl)
        <div class="carousel-item active">
          <div class="carousel-container">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
              <div>
              <h1>
                 {{$sl->title}}
              </h1>
              <h2>{!!$sl->desc!!}
              </h2>
                <!-- <a href="#" class="download-btn"><i class="bx bxl-apple"></i> Untuk Guru</a>
                <a href="#" class="download-btn"><i class="bx bxl-apple"></i> Untuk Siswa</a> -->
            </div>
          </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
              <img src="{{asset('storage/'.$sl->image) }}" width="65%" class="img-fluid animated" alt="" alt="">
            </div>
          </div>
        </div>
        @endforeach

        <!-- Slide 2 -->
        

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

<main id="main">

  <!-- ======= work Section (Content 2)======= -->
  <section id="work" class="work">
    <div class="container">
    <div class="row" data-aos="zoom-in">
      <div class="col-lg-3 col-6 text-center">
      <a href="#!"><img src="{{asset('newfrontend/assets/img/icon1.png') }}" class="img-fluid" alt=""><br></a>
        <h5><b>Program Islamic</b></h5>
      </div>
  
      <div class="col-lg-3 col-6 text-center">
        <a href="#!"><img src="{{asset('newfrontend/assets/img/icon2.png') }}" class="img-fluid" alt=""></a>
        <h5><b>Program & Keunggulan GIBS</b></h5>
      </div>

      <div class="col-lg-3 col-6 text-center">
      <a href="#!"><img src="{{asset('newfrontend/assets/img/icon3.png') }}" class="img-fluid" alt=""></a>
        <h5><b>Program Departemen SES</b></h5>
      </div>

      <div class="col-lg-3 col-6 text-center">
      <a href="#!"><img src="{{asset('newfrontend/assets/img/icon4.png') }}" class="img-fluid" alt=""></a>
        <h5><b>Ekstrakurikuler & Intra-kurikuler</b></h5>
      </div>

    </div>
    </div>
  </section>  <!-- End work section -->


    <!-- ======= video Section (content 3)======= -->
    <section id="video" class="video" style="text-align: center;">
      <div class="container">
        <div class="section-title">
          <h2><br><b>So, what is your role to this world ?</b></h2><br>
            <video width="55%" height="55%" controls muted poster="">
              <source src="{{asset('newfrontend/assets/img/demo.mp4')}}" type="video/mp4">
              browser anda tidak didukung
            </video>
          <p><h1>GIBS AT A GLANCE</h1>
        </div>
      </div>
    </section><!-- End video Section -->
<br>
    <!-- ======= Picture Section (content 4) ======= -->
    <section id="picture" class="picture">

      <div class="container" data-aos="fade-up">
        <!-- <div class="section-title">
          <h2><br>Gallery</h2>
        </div> -->
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="picture-item">
              <a href="{{asset('newfrontend/assets/img/gallery/GIBS 27.JPG')}}" class="picture-lightbox" data-gall="picture-item">
                <img src="{{asset('newfrontend/assets/img/gallery/GIBS 27.JPG')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="picture-item">
              <a href="{{asset('newfrontend/assets/img/gallery/GIBS 2.jfif')}}" class="picture-lightbox" data-gall="picture-item">
                <img src="{{asset('newfrontend/assets/img/gallery/GIBS 2.jfif')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="picture-item">
              <a href="{{asset('newfrontend/assets/img/gallery/GIBS 24.JPG')}}" class="picture-lightbox" data-gall="picture-item">
                <img src="{{asset('newfrontend/assets/img/gallery/GIBS 24.JPG')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="picture-item">
              <a href="{{asset('newfrontend/assets/img/gallery/GIBS 29.jfif')}}" class="picture-lightbox" data-gall="picture-item">
                <img src="{{asset('newfrontend/assets/img/gallery/GIBS 29.jfif')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="picture-item">
              <a href="{{asset('newfrontend/assets/img/gallery/GIBS 5.jfif')}}" class="picture-lightbox" data-gall="picture-item">
                <img src="{{asset('newfrontend/assets/img/gallery/GIBS 5.jfif')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="picture-item">
              <a href="{{asset('newfrontend/assets/img/gallery/GIBS 6.jfif')}}" class="picture-lightbox" data-gall="picture-item">
                <img src="{{asset('newfrontend/assets/img/gallery/GIBS 6.jfif')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="picture-item">
              <a href="{{asset('newfrontend/assets/img/gallery/GIBS 7.jfif')}}" class="picture-lightbox" data-gall="picture-item">
                <img src="{{asset('newfrontend/assets/img/gallery/GIBS 7.jfif')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="picture-item">
              <a href="{{asset('newfrontend/assets/img/gallery/GIBS 23.JPG')}}" class="picture-lightbox" data-gall="picture-item">
                <img src="{{asset('newfrontend/assets/img/gallery/GIBS 23.JPG')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>
          <div class="swiper-pagination"></div>
            <div class="swiper-text">
          </div>
      </div>
    </section><!-- End picture Section -->

<br>

<!-- ======= Materi belajar Section (content 5) ======= -->
  <section id="features" class="padd-section text-center">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Materi Pelajaran</h2>
          <br>
        </div>
      <div class="features-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="feature-item">
                  <div class="feature-block">
                    <img src="{{asset('newfrontend/assets/img/tips/st1.png')}}" alt="img">
                    <h4>BIOLOGI</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                  </div>
                </div>
              </div>
          
              <div class="swiper-slide">
                <div class="feature-item">
                  <div class="feature-block">
                    <img src="{{asset('newfrontend/assets/img/tips/st2.png')}}" alt="img">
                    <h4>KIMIA</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="feature-item">
                  <div class="feature-block">
                    <img src="{{asset('newfrontend/assets/img/tips/st3.png')}}" alt="img">
                    <h4>Bahasa Inggris</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="feature-item">
                  <div class="feature-block">
                    <img src="{{asset('newfrontend/assets/img/tips/st4.png')}}" alt="img">
                    <h4>Matematika</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="feature-item">
                  <div class="feature-block">
                    <img src="{{asset('newfrontend/assets/img/tips/st4.png')}}" alt="img">
                    <h4>Sejarah</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                  </div>
                </div>
              </div>
          </div>
          <div class="swiper-pagination"></div>
      </div>
    </div>
  </section><!-- End tips belajar Section -->

    <!-- count section (content 6) -->
    <section id="counts" class="counts section-bg">
      <div class="container">
        <div class="row counters">
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>
        </div>
      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Gallery prestasi Section (content 7) ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">
      </div>
      <div class="container-fluid" data-aos="fade-up">
        <div class="gallery-slider swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('newfrontend/assets/img/prestasi/foto1.png') }}" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Testimonials Section (content 8)======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{asset('newfrontend/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
          <div class="swiper-pagination"></div>
      </div>
    </section><!-- End Testimonials Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @endsection