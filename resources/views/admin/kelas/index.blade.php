@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Kelas</li>
  </ol>
  <h1 class="page-title">Data Kelas</h1>
</div>

<div class="page-content">
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mdlAdd">
          <i class="icon wb-plus" aria-hidden="true"></i> Tambah Kelas
        </button>
      </div>
    </div>
    
    <div class="modal fade" id="mdlAdd" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Kelas</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{route('admin.saveKelas')}}">
            {{ csrf_field() }}
            <div class="modal-body">
              <div class="form-group">
                <label for="nm_kelas">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control" id="nm_kelas" placeholder="Masukkan Kelas">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <div class="panel-body">
      <table id="tblkelas" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($kelas as $val)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $val->nama }}</td>
            <td style="text-align:center">
              <button type="button" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="modal" data-target="#mdlEdit{{$val->id}}">
                <i class="icon wb-pencil" aria-hidden="true"></i>
              </button>
              <a href="{{ route('admin.hapusKelas', $val->id) }}" class="delete-record btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Delete">
                <i class="icon wb-trash" aria-hidden="true"></i>
              </a>
            </td>
            
            <div class="modal fade" id="mdlEdit{{$val->id}}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form method="POST" action="{{ route('admin.updateKelas', $val->id) }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="nm_kelas">Ubah Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" id="nm_kelas" value="{{$val->nama}}">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- End Panel Basic -->
</div>
@endsection

@section('javascript')
<script type="text/javascript">
  $(document).ready(function () {
    $("#tblkelas").DataTable({
      "responsive": true
    });
  });
</script>
@endsection