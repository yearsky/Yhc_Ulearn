@extends('layouts.backend.index')
@section('content')
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users Management</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.guru.list') }}">Guru</a></li>
    <li class="breadcrumb-item active">Edit</li>
  </ol>
  <h1 class="page-title">Edit Data Guru</h1>
</div>

<div class="page-content">
  <div class="panel">
    <div class="panel-body">
      <form method="POST" action="{{ route('admin.updateGuru',$user->id) }}" id="userForm">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class="row">
          <div class="form-group col-md-4">
            <label class="form-control-label">First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ $user->first_name }}" required/>
            @if ($errors->has('first_name'))
            <label class="error" for="first_name">{{ $errors->first('first_name') }}</label>
            @endif
          </div>
        
          <div class="form-group col-md-4">
            <label class="form-control-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ $user->last_name }}" required/>
            @if ($errors->has('last_name'))
            <label class="error" for="last_name">{{ $errors->first('last_name') }}</label>
            @endif
          </div>
      
          <div class="form-group col-md-4">
            <label class="form-control-label">Email Address</label>
            <input type="text" class="form-control" name="email" placeholder="Email Address" value="{{ $user->email }}" required/>
            @if ($errors->has('email'))
            <label class="error" for="email">{{ $errors->first('email') }}</label>
            @endif
          </div>
      
          <div class="form-group col-md-4">
            <label class="form-control-label" >Password <small>Default (1-6)</small> </label>
            <input type="password" class="form-control" name="password" value="123456" required/>
            @if ($errors->has('password'))
            <label class="error" for="password">{{ $errors->first('password') }}</label>
            @endif
          </div>
      
          <div class="form-group col-md-4">
            <label class="form-control-label">Status</label>
            <div>
              <div class="radio-custom radio-default radio-inline">
                <input type="radio" id="inputBasicActive" name="is_active" value="1" @if($user->is_active) checked @endif />
                <label for="inputBasicActive">Active</label>
              </div>
              <div class="radio-custom radio-default radio-inline">
                <input type="radio" id="inputBasicInactive" name="is_active" value="0" @if(!$user->is_active) checked @endif/>
                <label for="inputBasicInactive">Inactive</label>
              </div>
            </div>
          </div>
        </div>
        <hr>
      
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
  $(document).ready(function() { 
    $("#userForm").validate({
      rules: {
        first_name: {
          required: true
        },
        last_name: {
          required: true
        },
        @if(!$user->id)
        email:{
          required: true,
          email:true,
          remote: "{{ route('checkUserEmailExists') }}"
        },
        password:{
          required: true,
          minlength: 6
        },
        @endif
        "roles[]": {
          required: true
        }
      },
      messages: {
        first_name: {
          required: 'The first name field is required.'
        },
        last_name: {
          required: 'The last name field is required.'
        },
        email: {
          required: 'The email field is required.',
          email: 'The email must be a valid email address.',
          remote: 'The email has already been taken.'
        },
        password: {
          required: 'The password field is required.',
          minlength: 'The password must be at least 6 characters.'
        },
        "roles[]": {
          required: 'The role field is required.'
        }
      },
      errorPlacement: function(error, element) {
        if(element.attr("name") == "roles[]") {
          error.appendTo("#role-div-error");
        }else {
          error.insertAfter(element);
        }
      }
    });
  });
</script>
@endsection