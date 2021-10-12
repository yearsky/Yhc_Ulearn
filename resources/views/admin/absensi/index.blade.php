@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Absensi</li>
  </ol>
  <h1 class="page-title">Absensi</h1>
</div>

<div class="page-content">

<div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
              <a href="{{ route('admin.absensi.add') }}" class="btn btn-success btn-sm"><i class="icon wb-plus" aria-hidden="true"></i> Add Data Absensi</a>
            </div>
          
          <div class="panel-actions">
          <form method="GET" action="{{ route('admin.absensi.list') }}">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ Request::input('search') }}">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-original-title="Search"><i class="icon wb-search" aria-hidden="true"></i></button>
                  <a href="{{ route('admin.absensi.list') }}" class="btn btn-danger" data-toggle="tooltip" data-original-title="Clear Search"><i class="icon wb-close" aria-hidden="true"></i></a>
                </span>
              </div>
          </form>
          </div>
        </div>
        
        <div class="panel-body">
          <table class="table table-hover table-striped w-full">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
                @foreach($absensi as $abs)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$abs->Siswa}}</td>
                <td>{{$abs->Kelas}}</td>
                <td>{{$abs->Mapel}}</td>
                <td>{{$abs->instructors}}</td>
                <td>{{$abs->keterangan}}</td>
                
                <td>
                  <a href="{{route('admin.absensi.edit',$abs->id)}}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit" >
                    <i class="icon wb-pencil" aria-hidden="true"></i>
                  </a>
                  <!-- <form action="{{ route('instructor.absensi.delete',$abs->id) }}" method="post">
                  @csrf
                  @method('DELETE') -->
                    <a href="{{ route('admin.absensi.delete',$abs->id) }}" class="delete-record btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Delete" >
                    <i class="icon wb-trash" aria-hidden="true"></i>
                  </a>
                </td>
                @endforeach
              </tr>
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