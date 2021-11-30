@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users Management</a></li>
    <li class="breadcrumb-item active">Guru</li>
  </ol>
  <h1 class="page-title">Data Guru</h1>
</div>

<div class="page-content">
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a href="{{ route('guru.getForm') }}" class="btn btn-success btn-sm"><i class="icon wb-plus" aria-hidden="true"></i> Add Data Guru</a>
      </div>
    </div>
    
    <div class="panel-body">
      <table id="tblguru" class="table table-striped table-bordered w-full">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama lengkap</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($guru as $gw)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $gw->n_guru }}</td>
            <td>{{ $gw->contact_email }}</td>
            <td>
              @if($gw->is_active)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
            </td>
            <td style="text-align:center">
              <a href="{{ route('admin.editGuru', $gw->user_id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
                <i class="icon wb-pencil" aria-hidden="true"></i>
              </a>
              <a href="{{ route('admin.hapusGuru', $gw->user_id)  }}" class="delete-record btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Delete" >
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
  $(document).ready(function()
  { 
    $('#tblguru').DataTable();
  });
</script>
@endsection