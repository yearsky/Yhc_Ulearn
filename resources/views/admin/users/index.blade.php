@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Users Management</li>
  </ol>
  <h1 class="page-title">Semua Pengguna</h1>
</div>

<div class="page-content">
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a href="{{ route('admin.guru.list') }}" class="btn btn-warning btn-sm"><i class="icon fas fa-chalkboard-teacher" aria-hidden="true"></i> Data Guru</a>
        <a href="{{ route('admin.siswa.list') }}" class="btn btn-primary btn-sm"><i class="icon fas fa-user-graduate" aria-hidden="true"></i> Data Siswa</a>
      </div>
    </div>
    
    <div class="panel-body">
      <table id="tblalluser" class="table table-striped table-bordered w-full">
        <thead>
          <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email ID</th>
            <th>Roles</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @foreach($user->roles as $role)
              @if($role->name == 'student')
              <span class="badge badge-primary">Siswa</span>
              @elseif($role->name == 'instructor')
              <span class="badge badge-warning">Guru</span>
              @endif
              @if(!$loop->last)
              <br>
              @endif
              @endforeach
            </td>
            <td>
              @if($user->is_active)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
            </td>
            <td style="text-align:center">
              @if($role->name == 'student')
              <a href="{{ route('admin.editSiswa',$user->id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
                <i class="icon wb-pencil" aria-hidden="true"></i>
              </a>
              @elseif($role->name == 'instructor')
              <a href="{{ route('admin.editGuru',$user->id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
                <i class="icon wb-pencil" aria-hidden="true"></i>
              </a>
              @endif
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
    $('#tblalluser').DataTable();
  });
</script>
@endsection