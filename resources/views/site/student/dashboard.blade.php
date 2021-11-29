@extends('layouts.frontend.v2index')
@section('content')

<!-- content start -->
<div class="container-fluid p-0 home-content-course">
  <!-- banner start -->
  <div class="subpage-slide-blue-course">
    <div class="container">
      <h1>Hi, {{Auth::user()->first_name}} Welcome!</h1>
    </div>
    <!-- <div class="breadcrumbs-container-course">
                <div class="container">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                  </ol>
                </div>
            </div> -->
  </div>
  <!-- banner end -->
  <section id="features" class="features">
    <div class="container">
      <h3 class="mt-4">Magic Card</h3>
      <div class="row">
        <div class="col-sm-3">
          <div class="card" id="cardsw" style="background-color: #FFE652">
            <div class="card-body">

              <h5 class="card-title" style="font-family:sans-serif">
                On Coming Course</h5>

              <a href="#oncoming" class="stretched-link"></a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card" id="cardsw">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>

              <a href="#" class="stretched-link"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="oncoming" class="courses">
    <div id="oncoming" class="container mt-5">
      <h2>On Coming</h2>
    </div>
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="courses-container">
          @if(!$penjadwalan>0)
          <div class="course">
            <div class="course-info">
              <!-- <div class="progress-container">
                <div class="progress"></div>
                <span class="progress-text">
                  6/9 Challenges
                </span>
              </div> -->
              <h6>No Schedule Today!</h6>
            </div>
          </div>
          @else
          @foreach($penjadwalan as $pw)
          <div class="course">
            <div class="course-preview">
              <h6>Course</h6>
              <h2 style="color:#fff;">{{$pw->mapel}}</h2>
              <h7>Ms. {{$pw->guru}}</h7>
            </div>
            <div class="course-info">
              <!-- <div class="progress-container">
                <div class="progress"></div>
                <span class="progress-text">
                  6/9 Challenges
                </span>
              </div> -->
              <h6>Course Info</h6>
              <h2>Course Open In {{$pw->jam_mulai}}</h2>
              <a href="{{url('course-learn/'.$pw->id_kelas.'/'.$pw->course_slug)}}"><button type="button" class="btn btncourse">View All</button></a>
            </div>
          </div>
          @endforeach
          @endif

        </div>

      </div>
  </section>

  <section class="courses">
    <div id="courseSection" class="container mt-5">
      <h2>Courses</h2>
    </div>
    <div class="app-container" data-aos="fade-up">

      <div class="app-content">
        <div class="project-boxes jsGridView">
          @foreach($courses as $course)
          <div class="project-box-wrapper">
            <div class="project-box" style="background-color: {{$colour[mt_rand(0,count($colour) -1)]}};">
              <div class="project-box-header">
                <span>{{$course->guru}}</span>
                <div class="more-wrapper">
                  <button class="project-btn-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="12" cy="5" r="1" />
                      <circle cx="12" cy="19" r="1" />
                    </svg>
                  </button>
                </div>
              </div>
              <div class="project-box-content-header">
                <p class="box-content-header">{{$course->course_title}}</p>
                <p class="box-content-subheader">{{$course->category}}</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header">Progress</p>
                <div class="box-progress-bar">
                  <span class="box-progress" style="width: 60%; background-color: #ff942e"></span>
                </div>
                <p class="box-progress-percentage">60%</p>
              </div>
              <div class="project-box-footer justify-content-end">

                <div class="days-left" style="color: #ff942e;">

                  <a href="#" style="text-decoration: none;">Pelajari Sekarang</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <!-- <div class="project-box-wrapper">
            <div class="project-box" style="background-color: #e9e7fd;">
              <div class="project-box-header">
                <span>December 10, 2020</span>
                <div class="more-wrapper">
                  <button class="project-btn-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="12" cy="5" r="1" />
                      <circle cx="12" cy="19" r="1" />
                    </svg>
                  </button>
                </div>
              </div>
              <div class="project-box-content-header">
                <p class="box-content-header">Testing</p>
                <p class="box-content-subheader">Prototyping</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header">Progress</p>
                <div class="box-progress-bar">
                  <span class="box-progress" style="width: 50%; background-color: #4f3ff0"></span>
                </div>
                <p class="box-progress-percentage">50%</p>
              </div>
              <div class="project-box-footer">
                <div class="participants">
                  <img src="https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1215&q=80" alt="participant">
                  <img src="https://images.unsplash.com/photo-1583195764036-6dc248ac07d9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2555&q=80" alt="participant">
                  <button class="add-participant" style="color: #4f3ff0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                      <path d="M12 5v14M5 12h14" />
                    </svg>
                  </button>
                </div>
                <div class="days-left" style="color: #4f3ff0;">
                  2 Days Left
                </div>
              </div>
            </div>
          </div>
          <div class="project-box-wrapper">
            <div class="project-box">
              <div class="project-box-header">
                <span>December 10, 2020</span>
                <div class="more-wrapper">
                  <button class="project-btn-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="12" cy="5" r="1" />
                      <circle cx="12" cy="19" r="1" />
                    </svg>
                  </button>
                </div>
              </div>
              <div class="project-box-content-header">
                <p class="box-content-header">Svg Animations</p>
                <p class="box-content-subheader">Prototyping</p>
              </div>
              <div class="box-progress-wrapper">
                <p class="box-progress-header">Progress</p>
                <div class="box-progress-bar">
                  <span class="box-progress" style="width: 80%; background-color: #096c86"></span>
                </div>
                <p class="box-progress-percentage">80%</p>
              </div>
              <div class="project-box-footer">
                <div class="participants">
                  <img src="https://images.unsplash.com/photo-1587628604439-3b9a0aa7a163?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjR8fHdvbWFufGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="participant">
                  <img src="https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1215&q=80" alt="participant">
                  <button class="add-participant" style="color: #096c86;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                      <path d="M12 5v14M5 12h14" />
                    </svg>
                  </button>
                </div>
                <div class="days-left" style="color: #096c86;">
                  2 Days Left
                </div>
              </div>
            </div>
          </div> -->

        </div>
      </div>
      <!-- <div class="messages-section">
                <button class="messages-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x-circle">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="15" y1="9" x2="9" y2="15" />
                        <line x1="9" y1="9" x2="15" y2="15" />
                    </svg>
                </button>
                <div class="projects-section-header">
                    <p>Client Messages</p>
                </div>
                <div class="messages">
                    <div class="message-box">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80"
                            alt="profile image">
                        <div class="message-content">
                            <div class="message-header">
                                <div class="name">Stephanie</div>
                                <div class="star-checkbox">
                                    <input type="checkbox" id="star-1">
                                    <label for="star-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                    </label>
                                </div>
                            </div>
                            <p class="message-line">
                                I got your first assignment. It was quite good. 🥳 We can continue with the next
                                assignment.
                            </p>
                            <p class="message-line time">
                                Dec, 12
                            </p>
                        </div>
                    </div>
                    <div class="message-box">
                        <img src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80"
                            alt="profile image">
                        <div class="message-content">
                            <div class="message-header">
                                <div class="name">Mark</div>
                                <div class="star-checkbox">
                                    <input type="checkbox" id="star-2">
                                    <label for="star-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                    </label>
                                </div>
                            </div>
                            <p class="message-line">
                                Hey, can tell me about progress of project? I'm waiting for your response.
                            </p>
                            <p class="message-line time">
                                Dec, 12
                            </p>
                        </div>
                    </div>
                    <div class="message-box">
                        <img src="https://images.unsplash.com/photo-1543965170-4c01a586684e?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDZ8fG1hbnxlbnwwfDB8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                            alt="profile image">
                        <div class="message-content">
                            <div class="message-header">
                                <div class="name">David</div>
                                <div class="star-checkbox">
                                    <input type="checkbox" id="star-3">
                                    <label for="star-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                    </label>
                                </div>
                            </div>
                            <p class="message-line">
                                Awesome! 🤩 I like it. We can schedule a meeting for the next one.
                            </p>
                            <p class="message-line time">
                                Dec, 12
                            </p>
                        </div>
                    </div>
                    <div class="message-box">
                        <img src="https://images.unsplash.com/photo-1533993192821-2cce3a8267d1?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTl8fHdvbWFuJTIwbW9kZXJufGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                            alt="profile image">
                        <div class="message-content">
                            <div class="message-header">
                                <div class="name">Jessica</div>
                                <div class="star-checkbox">
                                    <input type="checkbox" id="star-4">
                                    <label for="star-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                    </label>
                                </div>
                            </div>
                            <p class="message-line">
                                I am really impressed! Can't wait to see the final result.
                            </p>
                            <p class="message-line time">
                                Dec, 11
                            </p>
                        </div>
                    </div>
                </div>
            </div> -->
    </div>

</div>
</section>
<section id="schedule" id="courses" class="courses">
  <div class="container mt-5">
    <h2>Schedule</h2>
  </div>
  <div class="container" data-aos="fade-up">

    <div class="row" data-aos="zoom-in" data-aos-delay="100">

      <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
        <div class="cd-schedule__timeline">
          <ul>
            <li><span>09:00</span></li>
            <li><span>09:30</span></li>
            <li><span>10:00</span></li>
            <li><span>10:30</span></li>
            <li><span>11:00</span></li>
            <li><span>11:30</span></li>
            <li><span>12:00</span></li>
            <li><span>12:30</span></li>
            <li><span>13:00</span></li>
            <li><span>13:30</span></li>
            <li><span>14:00</span></li>

          </ul>
        </div> <!-- .cd-schedule__timeline -->

        <div class="cd-schedule__events">
          <ul>
            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Monday</span></div>

              <ul>
                <li class="cd-schedule__event">
                  <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                    <em class="cd-schedule__name">Abs Circuit</em>
                  </a>
                </li>

                <li class="cd-schedule__event">
                  <a data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2" href="#0">
                    <em class="cd-schedule__name">Rowing Workout</em>
                  </a>
                </li>

                <li class="cd-schedule__event">
                  <a data-start="12:30" data-end="14:00" data-content="event-yoga-1" data-event="event-3" href="#0">
                    <em class="cd-schedule__name">Yoga Level 1</em>
                  </a>
                </li>
              </ul>
            </li>
            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Monday</span></div>

              <ul>
                <li class="cd-schedule__event">
                  <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                    <em class="cd-schedule__name">Abs Circuit</em>
                  </a>
                </li>

                <li class="cd-schedule__event">
                  <a data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2" href="#0">
                    <em class="cd-schedule__name">Rowing Workout</em>
                  </a>
                </li>

                <li class="cd-schedule__event">
                  <a data-start="12:30" data-end="14:00" data-content="event-yoga-1" data-event="event-3" href="#0">
                    <em class="cd-schedule__name">Yoga Level 1</em>
                  </a>
                </li>
              </ul>
            </li>
            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Monday</span></div>

              <ul>
                <li class="cd-schedule__event">
                  <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                    <em class="cd-schedule__name">Abs Circuit</em>
                  </a>
                </li>

                <li class="cd-schedule__event">
                  <a data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2" href="#0">
                    <em class="cd-schedule__name">Rowing Workout</em>
                  </a>
                </li>

                <li class="cd-schedule__event">
                  <a data-start="12:30" data-end="14:00" data-content="event-yoga-1" data-event="event-3" href="#0">
                    <em class="cd-schedule__name">Yoga Level 1</em>
                  </a>
                </li>
              </ul>
            </li>


          </ul>
        </div>

        <div class="cd-schedule-modal">
          <header class="cd-schedule-modal__header">
            <div class="cd-schedule-modal__content">
              <span class="cd-schedule-modal__date"></span>
              <h3 class="cd-schedule-modal__name"></h3>
            </div>

            <div class="cd-schedule-modal__header-bg"></div>
          </header>

          <div class="cd-schedule-modal__body">
            <div class="cd-schedule-modal__event-info"></div>
            <div class="cd-schedule-modal__body-bg"></div>
          </div>

          <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
        </div>

        <div class="cd-schedule__cover-layer"></div>
      </div> <!-- .cd-schedule -->
    </div>

  </div>
</section>





<!-- footer course -->

<!-- footer end -->

<!-- content end -->
@endsection

@section('javascript')
<script type="text/javascript">
  $(document).ready(function() {
    $('.filter-results').change(function() {
      $('#courseList').submit();
    });
    $ - >
      $('[data-toggle]').on('click', - >
        toggle = $(this).addClass('active').attr('data-toggle') $(this).siblings('[data-toggle]').removeClass('active') $('.surveys').removeClass('grid list').addClass(toggle)
      )




  });
</script>
@endsection