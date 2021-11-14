
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Learning GIBS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="{{asset('newfrontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset ('newfrontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset ('newfrontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('newfrontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset ('newfrontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset ('newfrontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
<<<<<<< HEAD
=======
  <link href="{{asset ('newfrontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
>>>>>>> ebebc9c178a4028303846bec054375420815a705
  <link href="{{asset ('newfrontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('newfrontend/assets/css/index2Style.css')}}" rel="stylesheet">
<<<<<<< HEAD
=======
  <link href="{{asset('newfrontend/assets/css/teacherStyle.css')}}" rel="stylesheet">
  
>>>>>>> ebebc9c178a4028303846bec054375420815a705
  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="{{route('home')}}"><b>LMS <span>GIBS</span></b></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
<<<<<<< HEAD
        <li><a class="nav-link scrollto" href="{{ route('home') }}"><b>HOME</b></a></li>
          <li><a class="nav-link scrollto active" href="{{ route('home') }}"><b>GIBS ARJUNA</b></a></li>
          <li><a class="nav-link scrollto" href="{{ route('teacher') }}"><b>TEACHER</b></a></li>
=======
        <li><a class="nav-link scrollto {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}"><b>HOME</b></a></li>
          <li><a class="nav-link scrollto {{ request()->is('/gibs-arjuna') ? 'active' : '' }}" href="{{ route('gibs-arjuna') }}"><b>GIBS ARJUNA</b></a></li>
          <li><a class="nav-link scrollto {{ request()->is('teacher') ? 'active' : '' }}" href="{{ route('teacher') }}"><b>TEACHER</b></a></li>
>>>>>>> ebebc9c178a4028303846bec054375420815a705
          <li class="dropdown"><a href="#"><span><b>PROFILE</b></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#"><b>Fasilitas</b></a></li>
              <li><a href="#"><b>Sejarah</b></a></li>
              <li><a href="#"><b>Program Unggulan</b></a></li>
              <li><a href="#"><b>Gallery</b></a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span><b>STUDY</b></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Jurusan</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Academic</a></li>
                  <li><a href="#">9 Pillar</a></li>
                  <li><a href="#">Skills & Conduct</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact"><b>CONTACT US</b></a></li>
          

          @guest
          <li><a class="getstarted scrollto" href="{{ route('login') }}"><b>Login / Sign Up</b></a></li>
          @else
          <li class="dropdown"><a href="#"><span>
            {{ Auth::user()->first_name }} &nbsp;
          </span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @if(Auth::user()->hasRole('instructor'))
                <li><a href="{{ route('instructor.dashboard') }}"> Instructor</a></li>
              @elseif(Auth::user()->hasRole('admin'))
                <li><a href="{{ route('admin.dashboard') }}"> Admin</a></li>
              @elseif(Auth::user()->hasRole('student'))
<<<<<<< HEAD
                <li><a href="{{ route('my.courses') }}"> Mapel Saya</a></li>
=======
                <!-- <li><a href="{{ route('my.courses') }}"> Mapel Saya</a></li>
               -->
                <li><a href="{{route('student.dashboard')}}"> Dashboard</a></li>
>>>>>>> ebebc9c178a4028303846bec054375420815a705
                <li><a href="#"> Absensi</a></li>
                <li><a href="#"> Profil</a></li>
              @endif
              <li><a href="{{ route('logOut') }}"> Logout</a></li>
            </ul>
          </li>
          @endguest
          
          <!-- <li><a class="getstarted scrollto" href="#features">Login/Logut</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- Section Hero -->
  

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <hr size="12px">
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SMP/SMA Global Islamic School</h3>
            <p>
            Jl. Trans Kalimantan, Sungai Lumbah <br>
            Alalak, Barito Kuala<br>
            Kalimantan Selatan 70582 <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Organisasi</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">SOGIBS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">CRC</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">CBT</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Co Curricular</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pramuka</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">PMR</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marching Band</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Sosial Media</h4>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright @2021 <strong><span>GLOBAL ISLAMIC BOARDING SCHOOL</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('newfrontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('newfrontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('newfrontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('newfrontend/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('newfrontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('newfrontend/assets/js/main.js')}}"></script>
  <script src="{{asset('newfrontend/assets/js/blog.js')}}"></script>
  <script src="{{asset('newfrontend/assets/js/blogJava.js')}}"></script>
  

</body>

</html>