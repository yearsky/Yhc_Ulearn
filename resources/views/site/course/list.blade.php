@extends('layouts.frontend.v2index')
@section('content')
<?php 
    $get = '';
    $link = Request::url();
    $i = $j = 0;
    // echo '<pre>';print_r($_GET);
    foreach ($_GET as $key => $value):
      if($key != 'sort_price' && $key != 'sort_rating')
      {
        if(is_array($value))
        {
            foreach ($value as $inner_value):
                $get .= ($i == 0) ? '?'.$key.'[]='.$inner_value : '&'.$key.'[]='.$inner_value;
            $i++;
            endforeach;
        }
        else
        {
            $get .= ($i == 0) ? '?'.$key.'='.$value : '&'.$key.'='.$value;    
        }
        
      }
        if(is_array($value))
        {
            foreach ($value as $inner_value):
                $link .= ($j == 0) ? '?'.$key.'[]='.$inner_value : '&'.$key.'[]='.$inner_value;
            $j++;
            endforeach;
        }
        else
        {
            $link .= ($j == 0) ? '?'.$key.'='.$value : '&'.$key.'='.$value;   
        }
      
    $i++;
    $j++;
    endforeach;
?>
<!-- content start -->
    <div class="container-fluid p-0 home-content-course">
        <!-- banner start -->
        <div class="subpage-slide-blue-course">
            <div class="container">
                <h1>Course List</h1>
                <a href="#!" class="button1"><b>My Class</b></a>
                <a href="#!" class="button1"><b>Help</b></a>
            </div>
            <div class="breadcrumb-container-course">
                <div class="container">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Course List</li>
                  </ol>
                </div>
            </div>
        </div>
        <!-- banner end -->
<br>
            <form class="breadcrumb-item-search">               
                <input class="search" type="search" placeholder="Search...">               
                <input class="button" type="submit" value="Search">       
            </form>  
            <form name="daftarisi" style="margin-left: 188px;margin-top: -60px;">
                <select name="menu" style="width:180px; height: 45px;border:2px solid #FF0075;">
                    <option value="url link menu 1">Menu 1</option>
                    <option value="url link menu 2">Menu 2</option>
                    <option value="url link menu 2">Menu 2</option>
                    <option selected> — Pilih Courses — </option>
                </select>
                <input type="button" onClick="location=document.daftarisi.menu.options[document.daftarisi.menu.selectedIndex].value;" value="OK" style="width:50px; height: 45px; border:2px solid #FF0075; background-color: #FF0075; color: white; margin: 0.1px;">
            </form>
        
        <div class="container mt-5">
            <div class="row">
                <!-- filter start -->
                <div class="col-xl-2 col-lg-2 col-md-3 d-none d-md-block">
                <form method="GET" action="{{ route('course.list') }}" id="courseList">
                    <span class="blue-title">Filter Results</span>
                    @if($_GET)
                    <a href="{{ route('course.list') }}" class="clear-filters"><i class="fa fa-sync"></i>&nbsp;Clear filters</a>
                    @endif
                    

                    

                    
                    <!-- <ul class="ul-no-padding">
                        
                    </ul> -->
                </form>
                </div>
                <!-- filter end -->
                <!-- course block start -->
                <!-- <div class="col-xl-10 col-lg-10 col-md-9">
                    <div class="row px-2">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-8">
                            <span >Showing {{ $courses->currentPage() }} of {{ $courses->lastPage() }} page(s)</span>
                        </div>
                        <div class="col-xl-2 offset-xl-4 col-lg-2 offset-lg-4 col-md-3 offset-md-3 col-sm-3 offset-sm-3 col-4">
                            <select class="form-control form-control-sm sort-by">
                                <option value="">Sort By</option>
                                <option<?php echo(!empty($_GET['sort_price']) && $_GET['sort_price']=='asc')?' selected="selected"':'';?> value="sort_price=asc">Price (Low to High)</option>
                                <option<?php echo(!empty($_GET['sort_price']) && $_GET['sort_price']=='desc')?' selected="selected"':'';?>  value="sort_price=desc">Price (High to Low)</option>
                            </select>
                        </div>
                    </div> -->
                    
                    <!-- course start -->
                    <div class="row">
                    @foreach($courses as $course)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="course-block mx-auto">
                            <a href="{{ route('course.view', $course->course_slug) }}" class="c-view">
                                <main>
                                    <img src="@if(Storage::exists($course->thumb_image)){{ Storage::url($course->thumb_image) }}@else{{ asset('backend/assets/images/course_detail_thumb.jpg') }}@endif">
                                    <div class="col-md-12"><h6 class="course-title">{{ $course->course_title }}</h6></div>
                                    
                                    <div class="instructor-clist">
                                        <div class="col-md-12">
                                            <i class="fa fa-chalkboard-teacher"></i>&nbsp;
                                            <span>Created by <b>{{ $course->first_name.' '.$course->last_name }}</b></span>
                                        </div>
                                    </div>
                                </main>
                                <footer>
                                    <div class="c-row">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            @php $course_price = $course->price ? config('config.default_currency').$course->price : 'Free'; @endphp
                                            <h5 class="course-price">{{  $course_price }}&nbsp;<s>{{ $course->strike_out_price ? $course->strike_out_price : '' }}</s></h5>
                                        </div>
                                        <div class="col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-5 offset-1">
                                            <star class="course-rating">
                                            <?php for ($r=1;$r<=5;$r++) { ?>
                                                <span class="fa fa-star <?php echo $r <= $course->average_rating ? 'checked' : '';?>"></span>
                                            <?php }?>
                                            </star>
                                        </div>
                                    </div>
                                </footer>
                            </a>    
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <!-- course end -->
                    <!-- pagination start -->
                    <div class="row float-right mt-5">
                       {{ $courses->appends($_GET)->links() }}
                    </div>
                    <!-- pagination end -->
                </div>
                <!-- course block end -->
            </div>
        </div>

        <!-- footer course -->
<footer id="footer-course" class="footer-course">


<div class="footer-course-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-course-contact">
        <h3><b>SMP/SMA Global Islamic School</b></h3>
        <p>Jl. Trans Kalimantan, Sungai Lumbah <br>
        Alalak, Barito Kuala<br>
        Kalimantan Selatan 70582 <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 footer-course-links">
        <h4><b>Organisasi</b></h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">SOGIBS</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">CRC</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">CBT</a></li>

        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-course-links">
        <h4><b>Co Curricular</b></h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Karate</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Silat</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Panahan</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Basket Ball</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Volley Ball</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-course-links">
        <h4><b>Sosial Media</b></h4>
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
  <div class="copyright" style="text-align: center;">
    &copy; Copyright @2021 <strong><span>GLOBAL ISLAMIC BOARDING SCHOOL</span></strong>. All Rights Reserved
  </div>
</div>
</footer>
<!-- footer end -->
        
    <!-- content end -->
@endsection

@section('javascript')
<script type="text/javascript">


$(document).ready(function()
{
    $('.filter-results').change(function()
    {
        $('#courseList').submit();
    });

    $('.sort-by').change(function()
    {
        var search = '{{ url("courses") }}';
        var get = '<?php echo $get;?>';
        var sort = $(this).val();
        var operand = '<?php echo empty($get) ? "?" : "&";?>';
        window.location = search + get + operand + sort;
    });

    $('.c-view').click(function()
    {
         var link = '{{ $link }}';
         var page_link = $(this).attr('href');
         $.ajax({
                type:  'get',
                cache:  false ,
                url:  '{{ route("course.breadcurmb") }}',
                data:  {link:link},
                success: function(data)
                {
                    window.location = page_link;
                }
            });
         return false;
    });
});
</script>
@endsection