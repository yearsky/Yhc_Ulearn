@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.kelas.list') }}">Kelas</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
  <h1 class="page-title">Add Data Kelas</h1>
</div>

<div class="page-content">

<div class="panel">
  <div class="panel-body">

  

    <form method="POST" action="{{route('admin.saveKelas')}}" id="courseForm">
      {{ csrf_field() }}
      <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
      <div class="row">
      
        <div class="form-group col-md-4">
            <label class="form-control-label">Nama Kelas <span class="required">*</span></label>
            <input type="text" class="form-control" name="kelas_name" 
            placeholder="Kelas Name" value="{{ $kelas->nama }}" />
            @if ($errors->has('kelas_name'))
                <label class="error" for="blog_title">{{ $errors->first('kelas_name') }}</label>
            @endif
        </div>
       





        

      </div>
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