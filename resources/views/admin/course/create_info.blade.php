@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.course.list') }}">Courses</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
  <h1 class="page-title">Add Course</h1>
</div>

<div class="page-content">

<div class="panel">
  <div class="panel-body">

    
    @include('admin/course/tabs')
    

    <form method="POST" action="{{ route('admin.course.info.save') }}" id="courseForm">
      {{ csrf_field() }}
      <input type="hidden" name="course_id" value="{{ $course->id }}">
      <input type="hidden" name="instructor_id" value="{{ $guru->id }}">
      <div class="row">
      
        <div class="form-group col-md-4">
            <label class="form-control-label">Course Title <span class="required">*</span></label>
            <input type="text" class="form-control" name="course_title" 
                placeholder="Course Title" value="{{ $course->course_title }}" />
                @if ($errors->has('course_title'))
                    <label class="error" for="course_title">{{ $errors->first('course_title') }}</label>
                @endif
        </div>

        <div class="form-group col-md-4">
            <label class="form-control-label">Category <span class="required">*</span></label>
            <select class="form-control" name="category_id">
                <option value="">Select</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                    @if($category->id == $course->category_id){{ 'selected' }}@endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            
            @if ($errors->has('category_id'))
                <label class="error" for="category_id">{{ $errors->first('category_id') }}</label>
            @endif
        </div>

        <div class="form-group col-md-4">
            <label class="form-control-label">Kelas<span class="required">*</span></label>
            <select class="form-control" name="kelas">
                <option hidden value="">Select</option>
                @foreach($kelas as $kl)
                    <option value="{{ $kl->id }}" 
                    @if($kl->id == $course->kelas_id){{ 'selected' }}@endif>
                        {{ $kl->nama }}
                    </option>
                @endforeach
            </select>
            
            @if ($errors->has('instruction_level_id'))
                <label class="error" for="instruction_level_id">{{ $errors->first('instruction_level_id') }}</label>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label class="form-control-label">Instructor<span class="required">*</span></label>
                <input class="form-control" value="@if($guru->id == $course->instructor_id){{$guru->first_name.' '.$guru->last_name}} @endif" list="instructor" id="instructor" placeholder="Search Instructors...">
                <datalist id="instructor">
                    @foreach($instructor as $is)
                    <option data-value="{{$is->id}}" value="@if($is->id == $course->instructor_id){{$is->first_name.' '.$is->last_name}} @endif" >{{$is->first_name.' '.$is->last_name}}</option>
                    @endforeach
                </datalist>
                <input type="hidden" name="instructor" id="instructor-hidden">
            
            @if ($errors->has('instruction_level_id'))
                <label class="error" for="instruction_level_id">{{ $errors->first('instruction_level_id') }}</label>
            @endif
        </div>

        <div class="form-group col-md-8">
            <label class="form-control-label">Keywords</label>
            <input type="text" class="form-control tagsinput" name="keywords" 
                placeholder="Keywords" value="{{ $course->keywords }}" />
        </div>

        <div class="form-group col-md-4">
            <label class="form-control-label">Status</label>
            <div>
              <div class="radio-custom radio-default radio-inline">
                <input type="radio" id="inputBasicActive" name="is_active" value="1" @if($course->is_active) checked @endif />
                <label for="inputBasicActive">Active</label>
              </div>
              <div class="radio-custom radio-default radio-inline">
                <input type="radio" id="inputBasicInactive" name="is_active" value="0" @if(!$course->is_active) checked @endif/>
                <label for="inputBasicInactive">Inactive</label>
              </div>
            </div>
        </div>





        <div class="form-group col-md-12">
            <label class="form-control-label">Overview</label>
            <textarea name="overview">
                {{ $course->overview }}
            </textarea>
        </div>

      </div>
      <hr>
      <div class="form-group row">
        <div class="col-md-4">
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-default btn-outline">Reset</button>
        </div>
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

        document.querySelector('input[list]').addEventListener('input', function(e) {
            var input = e.target,
                list = input.getAttribute('list'),
                options = document.querySelectorAll('#' + list + ' option'),
                hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
                label = input.value;

            hiddenInput.value = label;

            for(var i = 0; i < options.length; i++) {
                var option = options[i];

                if(option.innerText === label) {
                    hiddenInput.value = option.getAttribute('data-value');
                    break;
                }
            }
            var value = document.getElementById('instructor-hidden').value;
            return value;
        });
       
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