@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users Management</a></li>
    <li class="breadcrumb-item active">Siswa</li>
  </ol>
  <h1 class="page-title">Data Siswa</h1>
</div>

<div class="page-content">
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a href="{{ route('siswa.getForm') }}" class="btn btn-success btn-sm"><i class="icon wb-plus" aria-hidden="true"></i> Add Data Siswa</a>
      </div>
    </div>
    
    <div class="panel-body">
      <table id="tblsiswa" class="table table-striped table-bordered w-full">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($siswa as $sw)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sw->n_siswa }}</td>
            <td>{{ $sw->kelas }}</td>
            <td>
              @if($sw->is_active)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
            </td>
            <td style="text-align:center">
              <a href="{{ route('admin.editSiswa',$sw->id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
                <i class="icon wb-pencil" aria-hidden="true"></i>
              </a>
              <a href="{{ route('admin.hapusSiswa',$sw->id) }}" class="delete-record btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Delete" >
                <i class="icon wb-trash" aria-hidden="true"></i>
              </a>
            </td>
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
  $(document).ready(function() { 
    $('#tblsiswa').DataTable();  
  });
</script>
@endsection