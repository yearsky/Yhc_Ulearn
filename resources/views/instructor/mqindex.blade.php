@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('instructor.course.list') }}">Courses</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
  <h1 class="page-title">Add Quiz</h1>
</div>

<div class="page-content">

<div class="panel">
  <div class="panel-body">

    
    

  <div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-4" style="width:550px;font-weight:bold;">
	 <h2 style="color: green">Your Question Set is complete</h2>
	  <!-- Trigger the modal with a button -->
	  <h2>Please Remember your Exam Code : <span style="color: red;font-size: 40px; font-weight: bold;">{{$uniqueid}}</span></h2>
	  <a href="{{route('instructor.course.list')}}"><button type="button" class="btn btn-info btn-lg btn-block"> Back To Home </button></a><br>
	  <form action="/makequestion/{{$uniqueid}}/edit" method="get">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="uniqueid" value="{{$uniqueid}}">
	  	<button type="submit" class="btn btn-info btn-lg btn-block">Review Questions</button>
	  </form>
  </div>
  </div>
</div>

       
      <!-- End Panel Basic -->
</div>

@endsection

@section('javascript')
<script type="text/javascript">

    $(document).ready(function()
    { 
        tinymce.init({ 
            selector:'textarea',
            menubar:false,
            statusbar: false,
            content_style: "#tinymce p{color:#76838f;}"
        });

        $(".tagsinput").tagsinput();

        $("#courseForm").validate({
            rules: {
                course_title: {
                    required: true
                },
                category_id: {
                    required: true
                },
                kelas: {
                    required: true
                }
            },
            messages: {
                course_title: {
                    required: 'The course title field is required.'
                },
                category_id: {
                    required: 'The category field is required.'
                },
                kelas: {
                    required: 'The kelas field is required.'
                }
            }
        });

        $('.course-id-empty').click(function()
        {
            toastr.error("Fill course info to proceed");
        });
    });
</script>
@endsection