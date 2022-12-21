@extends('layouts.backend.app')
@section('title')
Admin Profile
@endsection
@section('admininformation')
active
@endsection
@section('create_information')
active
@endsection 

@section('Content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/create_information') }}">Create Information</a></li>
              <li class="breadcrumb-item active">Show Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
           
          <div class="col-md-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
               @if ($user_profile->admin_info)
                       <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                        src="{{asset('assets/profile/'.$user_profile->admin_info->image)}}"
                        alt="User profile picture">
                        </div>
                  
                @else
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src=" "
                       alt="User profile picture">
                </div>
                @endif
                
                <h3 class="profile-username text-center">{{ $user_profile->user_name }}</h3>

                <p class="text-muted text-center">Admin</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <p class="float-right">{{ $user_profile->email}}</p>
                  </li>
                  @if ($user_profile->admin_info)
                   <li class="list-group-item">
                    <b>Full name</b> 
                     <p class="float-right">{{ $user_profile->admin_info->name}}</p>
                   </li>
                   <li class="list-group-item">
                    <b>Phone Number</b> <p class="float-right">{{ $user_profile->admin_info->number}}</p>
                  </li>
                   @else
                     <li class="list-group-item">
                     <b>Full name</b> 
                     <p class="float-right"></p>
                      </li>
                      <li class="list-group-item">
                    <b>Phone Number</b> <p class="float-right"></p>
                  </li>
                    @endif
                   
                  
                  
                </ul>

                <a href="{{ url('admin/create_information') }}" class="btn btn-primary btn-block"><b>Create Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
           <div class="col-md-6">
            <div class="card card-primary card-outline">
             <!-- About Me Box -->
             @if ($user_profile->admin_info)
                 <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> About</strong>

                <p class="text-muted">
                 {{ $user_profile->admin_info->about }}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>

                <p class="text-muted">
                    {{ $user_profile->admin_info->address }}
                </p>

                <hr>

            
              </div>
              <!-- /.card-body -->
             @else  
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> About</strong>

                <p class="text-muted">
                 
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>

                <p class="text-muted"></p>

                <hr>

            
              </div>
              <!-- /.card-body -->
            
             @endif
          </div>
            <!-- /.card -->

           </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection 