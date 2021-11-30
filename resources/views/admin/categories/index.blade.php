@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Kategori</li>
  </ol>
  <h1 class="page-title">Data Kategori</h1>
</div>

<div class="page-content">
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title">
        <a href="{{ route('admin.categoryForm') }}" class="btn btn-success btn-sm"><i class="icon wb-plus" aria-hidden="true"></i> Add Category</a>
      </div>
    </div>
    
    <div class="panel-body">
      <table id="tblkategori" class="table table-striped table-bordered w-full">
        <thead>
          <tr>
            <th>No</th>
            <th>Icon</th>
            <th>Category Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td><i class="fas {{ $category->icon_class }}"></i></td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
              @if($category->is_active)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
            </td>
            <td style="text-align:center">
              <a href="{{ route('admin.editCategory',$category->id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit" >
                <i class="icon wb-pencil" aria-hidden="true"></i>
              </a>
              <a href="{{ route('admin.hapusCategory',$category->id) }}" class="delete-record btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Delete" >
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
    $('#tblkategori').DataTable();
  });
</script>
@endsection