@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Users Management</li>
  </ol>
  <h1 class="page-title">Users Management</h1>
</div>

<div class="page-content">

<div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
              <a href="{{ route('siswa.getForm') }}" class="btn btn-success btn-sm"><i class="icon wb-plus" aria-hidden="true"></i> Add User</a>
            </div>
          
          <div class="panel-actions">
          <form method="GET" action="{{ route('admin.users') }}">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ Request::input('search') }}">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-original-title="Search"><i class="icon wb-search" aria-hidden="true"></i></button>
                  <a href="{{ route('admin.users') }}" class="btn btn-danger" data-toggle="tooltip" data-original-title="Clear Search"><i class="icon wb-close" aria-hidden="true"></i></a>
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
                <td>
                  <a href="{{ url('admin/user/siswa/edit/'.$sw->id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
                    <i class="icon wb-pencil" aria-hidden="true"></i>
                  </a>
                  <a href="{{ url('admin/user/siswa/delete/'.$sw->id) }}" class="delete-record btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Delete" >
                    <i class="icon wb-trash" aria-hidden="true"></i>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
          <div class="float-right">
            {{ $siswa->appends(['search' => Request::input('search')])->links() }}
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