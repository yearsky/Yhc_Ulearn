@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Penjadwalan</li>
  </ol>
  <h1 class="page-title">Penjadwalan</h1>
</div>

<div class="page-content">

<div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
              <a href="{{ route('admin.penjadwalanForm') }}" class="btn btn-success btn-sm"><i class="icon wb-plus" aria-hidden="true"></i> Add Data Jadwal</a>
            </div>
          
          <div class="panel-actions">
          <form method="GET" action="{{ route('admin.penjadwalan.list') }}">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ Request::input('search') }}">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-original-title="Search"><i class="icon wb-search" aria-hidden="true"></i></button>
                  <a href="{{ route('admin.penjadwalan.list') }}" class="btn btn-danger" data-toggle="tooltip" data-original-title="Clear Search"><i class="icon wb-close" aria-hidden="true"></i></a>
                </span>
              </div>
          </form>
          </div>
        </div>
        
        <div class="panel-body">
          <table class="table table-hover table-striped w-full">
            <thead>
              <tr>
                <th>Sl.no</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Guru</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Hari</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($penjadwalan as $pw)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pw->mapel }}</td>
                <td>{{ $pw->kelas }}</td>
                <td>{{ $pw->n_guru }}</td>
                <td>{{ $pw->jam_mulai }}</td>
                <td>{{ $pw->jam_akhir }}</td>
                <td>{{ $pw->hari }}</td>
               
                <td>
                  <a href="{{ url('admin/penjadwalan/pw-form/'.$pw->id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit" >
                    <i class="icon wb-pencil" aria-hidden="true"></i>
                  </a>

                  <a href="{{ url('admin/delete-pw/'.$pw->id) }}" class="delete-record btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Delete" >
                    <i class="icon wb-trash" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
          <div class="float-right">
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

    });
</script>
@endsection