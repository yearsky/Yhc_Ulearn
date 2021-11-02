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

    
    

    <form method="post" action="{{route('instructor.question.save')}}">
	{{ csrf_field() }}
    
		<div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-3">
		  <div class="form-group">
		    <label class="col-form-label" for="formGroupExampleInput">Question</label>
		    <input type="text" name="question" class="form-control " id="formGroupExampleInput" required>
		  </div>
		  <div class="form-group">
		    <label class="col-form-label" for="formGroupExampleInput2">option 1</label>
		    <input type="text" name="option1" class="form-control" id="formGroupExampleInput2" required>
		  </div>
		  <div class="form-group">
		    <label class="col-form-label" for="formGroupExampleInput2">Option 2</label>
		    <input type="text" name="option2" class="form-control" id="formGroupExampleInput2" required>
		  </div>
		  <div class="form-group">
		    <label class="col-form-label" for="formGroupExampleInput2">Option 3</label>
		    <input type="text" name="option3" class="form-control" id="formGroupExampleInput2" required>
		  </div>
		  <div class="form-group">
		    <label class="col-form-label" for="formGroupExampleInput2">Option 4</label>
		    <input type="text" name="option4" class="form-control" id="formGroupExampleInput2" required>
		  </div>
		  <div class="form-group">
		    <label class="col-form-label" for="formGroupExampleInput2">Answer</label>
		    <input type="text" name="answer" class="form-control" id="formGroupExampleInput2" required>
		  </div>
		  <div class="form-group">
		    <label class="col-form-label" for="formGroupExampleInput2">Quiz ID</label>
		    <input type="hidden" name="quizid" class="form-control" id="formGroupExampleInput2" value="{{$examinfo->id}}" readonly>
		  </div>
		  <button type="Submit" class="btn btn-success btn-block">Submit</button>
		</div>

</form>
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