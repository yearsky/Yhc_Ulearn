@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.absensi.list') }}">Absensi</a></li>
    <li class="breadcrumb-item active">Edit</li>
  </ol>
  <h1 class="page-title">Edit Data Absensi</h1>
</div>

<div class="page-content">

<div class="panel">
  <div class="panel-body">

  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link py-1 {{ request()->is('admin-absensi-add*') ? 'active' : '' }}" href="#">Absensi Info</a>
    </li>
</ul>
    

    <form method="POST" action="{{url('admin/absensi/update/'.$absensi->id)}}" id="courseForm">
      {{ csrf_field() }}
      <input type="hidden" name="instructor_id" value="{{$absensi->id_instructor}}">
      <div class="row">
      
        <div class="form-group col-md-4">
            <label class="form-control-label">Guru Mata Pelajaran <span class="required">*</span></label>
                <select class="form-control" name="guru" aria-label="Default select example">
                 @foreach($instructor as $ins)
                <option value="{{$ins->id}}"
                  @if($ins->id == $absensi->id_instructor){{'selected'}} @endif>{{$ins->guru}} </option>
                @endforeach
              </select>
        </div>
        <div class="form-group col-md-4">
            <label class="form-control-label">Mata Pelajaran <span class="required">*</span></label>
                <select class="form-control" name="mapel" aria-label="Default select example">
                 @foreach($mapel as $mpl)
                <option value="{{$mpl->id}}"
                  @if($mpl->id == $absensi->id_course){{'selected'}} @endif>{{$mpl->course_title}} </option>
                @endforeach
              </select>
        </div>
        <div class="form-group col-md-4">
            <label class="form-control-label">Kelas <span class="required">*</span></label>
                <select class="form-control" name="kelas" id="kelas" aria-label="Default select example">
                <option hidden>Choose Room</option>
                  @foreach($kelas as $kl)
                  <option value="{{$kl->id}}"
                  @if($kl->id == $absensi->id_kelas){{ 'selected' }}@endif>
                        {{ $kl->nama }}
                    </option>
                @endforeach
              </select>
        </div>

        <div class="form-group col-md-4">
            <label class="form-control-label">Siswa <span class="required">*</span></label>
            <select class="form-control" name="siswa" id="siswa"></select>
            @if($s_class->count() > 0 )
                     @foreach($s_class as $sw)
                       <option value="{{$sw->id}}" @if($sw->id == $absensi->id_kelas) {{'selected'}} @endif>{{$sw->siswa_sekolah}}</option>
                     @endforeach
                   @endif
            @if ($errors->has('category_id'))
                <label class="error" for="category_id">{{ $errors->first('category_id') }}</label>
            @endif 
        </div>

        <div class="form-group col-md-4">
            <label class="form-control-label">Keterangan</label>
            <select class="form-control" name="keterangan" aria-label="Default select example">
                
                <option value="Hadir" @if($absensi->keterangan == 'Hadir') {{'selected'}} @endif>Hadir </option>
                <option value="Izin" @if($absensi->keterangan == 'Izin'){{'selected'}} @endif>Izin</option>
                <option value="Tidak Hadir" @if($absensi->keterangan == 'Tidak Hadir'){{'selected'}} @endif>Tidak Hadir</option>
              </select>
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
      $('#kelas').on('change', function() {
               var kelasId = $(this).val();
               var siswaId = $(this).val();
               if(kelasId) {
                   $.ajax({
                       url: '/getKelas/'+kelasId,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#siswa').empty();
                            $('#siswa').append('<option hidden>Pilih Siswa</option>'); 
                            $.each(data, function(key, siswa){
                                $('select[name="siswa"]').append('<option value="'+ siswa.id +'">' + siswa.siswa + '</option>');
                            });
                        }else{
                 $('#siswa').empty();

                        }
                     }
                   });
               }else{
                 $('#siswa').empty();

               }
            });


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