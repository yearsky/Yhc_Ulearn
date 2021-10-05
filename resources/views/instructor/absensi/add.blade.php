@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('instructor.absensi.list') }}">Absensi</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
  <h1 class="page-title">Add Data Absensi</h1>
</div>

<div class="page-content">

<div class="panel">
  <div class="panel-body">

  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link py-1 {{ request()->is('instructor-absensi-add*') ? 'active' : '' }}" href="#">Absensi Info</a>
    </li>
</ul>
    

    <form method="POST" action="" id="courseForm">
      {{ csrf_field() }}
      <input type="hidden" name="course_id" value="">
      <div class="row">
      
        <div class="form-group col-md-4">
            <label class="form-control-label">Mata Pelajaran <span class="required">*</span></label>
            <input type="text" disabled class="form-control" name="course_title" 
                placeholder="Course Title" value="" />
                @if ($errors->has('course_title'))
                    <label class="error" for="course_title">{{ $errors->first('course_title') }}</label>
                @endif
        </div>

        <div class="form-group col-md-4">
            <label class="form-control-label">Siswa <span class="required">*</span></label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
              <datalist id="datalistOptions">
                @foreach($siswa as $sw)
                <option value="{{$sw->Siswa}}">
                
                @endforeach
              </datalist>
            
            @if ($errors->has('category_id'))
                <label class="error" for="category_id">{{ $errors->first('category_id') }}</label>
            @endif 
        </div>

        

       
        <div class="form-group col-md-4">
            <label class="form-control-label">Keterangan</label>
            <select class="form-control" aria-label="Default select example">
                <option value="Hadir" selected>Hadir </option>
                <option value="Izin">Izin</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
              </select>
        </div>





        <div class="form-group col-md-12">
            <label class="form-control-label">Overview</label>
            <textarea name="overview">
            </textarea>
        </div>

      </div>
      <hr>
      <div class="form-group row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary">Submit</button>
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

        $("#courseForm").validate({
            rules: {
                course_title: {
                    required: true
                },
                category_id: {
                    required: true
                },
                instruction_level_id: {
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
                instruction_level_id: {
                    required: 'The instruction level field is required.'
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