@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.penjadwalan.list') }}">Penjadwalan</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
  <h1 class="page-title">Add Data Penjadwalan</h1>
</div>

<div class="page-content">

<div class="panel">
  <div class="panel-body">

    <form method="POST" action="{{route('admin.saveJadwal')}}" id="courseForm">
      {{ csrf_field() }}
      <input type="hidden" name="penjadwalan_id" value="{{$penjadwalan->id}}">
      <div class="row">
      
        <div class="form-group col-md-4">
            <label class="form-control-label">Kelas <span class="required">*</span></label>
                <select class="form-control" name="kelas" id="kelas" aria-label="Default select example">
                @foreach($kelas as $kl)
                <option value="{{$kl->id}}" @if($kl->id == $penjadwalan->kelas_id){{'selected'}} @endif>{{$kl->nama}}</option>
                @endforeach
              </select>
        </div>
        
        <div class="form-group col-md-4">
            <label class="form-control-label">Mapel <span class="required">*</span></label>
            <select class="form-control" name="mapel" id="mapel"></select>
            @if ($errors->has('mapel'))
                <label class="error" for="category_id">{{ $errors->first('mapel') }}</label>
            @endif 
        </div>        
        <div class="form-group col-md-4">
            <label class="form-control-label">Guru <span class="required">*</span></label>
            <select class="form-control" name="guru" id="guru"></select>
            @if ($errors->has('guru'))
                <label class="error" for="category_id">{{ $errors->first('guru') }}</label>
            @endif 
        </div>        
    
        <div class="form-group col-md-4">
            <label class="form-control-label">Mengajar Pada Jam? <span class="required">*</span></label>
                <select class="form-control" name="jam" id="jam" aria-label="Default select example">
                @if($penjadwalan->jam_mulai == 08.00 && $penjadwalan->jam_akhir == 08.35)
                <option value="jam1" selected>Jam Ke-1 </option>
                @endif
                @if($penjadwalan->jam_mulai == 08.35 && $penjadwalan->jam_akhir == 09.10)
                <option value="jam2" selected>Jam Ke-2 </option>
                @endif
                @if($penjadwalan->jam_mulai == 09.10 && $penjadwalan->jam_akhir == 09.45)
                <option value="jam3" selected>Jam Ke-3 </option>
                @endif
                @if($penjadwalan->jam_mulai == 10.15 && $penjadwalan->jam_akhir == 10.50)
                <option value="jam4" selected>Jam Ke-4 </option>
                @endif
                @if($penjadwalan->jam_mulai == 10.50 && $penjadwalan->jam_akhir == 11.25)
                <option value="jam5" selected>Jam Ke-5 </option>
                @endif
                @if($penjadwalan->jam_mulai == 11.40 && $penjadwalan->jam_akhir == 12.15)
                <option value="jam6" selected>Jam Ke-6 </option>
                @endif
                @if($penjadwalan->jam_mulai == 12.15 && $penjadwalan->jam_akhir == 12.50)
                <option value="jam7" selected>Jam Ke-7 </option>
                @endif
                <option value="jam1" >Jam Ke-1 </option>
                <option value="jam2" >Jam Ke-2 </option>
                <option value="jam3" >Jam Ke-3 </option>
                <option value="jam4" >Jam Ke-4 </option>
                <option value="jam5" >Jam Ke-5 </option>
                <option value="jam6" >Jam Ke-6 </option>
                <option value="jam7" >Jam Ke-7 </option>

              </select>
        </div>
        <div class="form-group col-md-4">
            <label class="form-control-label">Mengajar Pada Hari? <span class="required">*</span></label>
                <select class="form-control" name="hari" id="hari" aria-label="Default select example">
                <option value="Senin" >Hari Senin </option>
                <option value="Selasa" >Hari Selasa</option>
                <option value="Rabu" >Hari Rabu</option>
                <option value="Kamis" >Hari Kamis</option>
                <option value="Jumat" >Hari Jumat</option>
                <option value="Sabtu" >Hari Sabtu</option>
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
      $("kelas select").val(1).change();  
      $('#kelas').on('change', function() {
               var kelasId = $(this).val();
               if(kelasId) {
                   $.ajax({
                       url: '/getMapelByKelas/'+kelasId,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#mapel').empty();
                            $('#mapel').append('<option hidden>Pilih Mapel</option>'); 
                            $.each(data, function(key, mapel){
                                $('select[name="mapel"]').append('<option value="'+ mapel.id +'"selected>' + mapel.course_title + '</option>').change();
                            });
                        }else{
                            $('#mapel').empty();
                        }
                     }
                   });
               }else{
                 $('#mapel').empty();
               }
            });
      $('#mapel').on('change', function() {
               var kelasId = $(this).val();
               if(kelasId) {
                   $.ajax({
                       url: '/getGuruByMapel/'+kelasId,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#guru').empty();
                            $('#guru').append('<option hidden>Pilih Guru</option>'); 
                            $.each(data, function(key, guru){
                                $('select[name="guru"]').append('<option value="'+ guru.id +'"selected>' + guru.n_guru + '</option>').change();
                            });
                        }else{
                            $('#guru').empty();
                        }
                     }
                   });
               }else{
                 $('#guru').empty();
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