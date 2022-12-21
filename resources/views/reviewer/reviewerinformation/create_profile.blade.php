@extends('layouts.backend.app')
@section('title')
create reviewer profile
@endsection
@section('Profile')
active
@endsection
@section('create_profile')
active
@endsection


@section('Content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('reviewer/manage_profile') }}">manage Profile</a></li>
              <li class="breadcrumb-item active">Create Profile</li>
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
          <!-- left column -->
          <div class="col-md-12">
            @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('message') }}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
              </div>
            @elseif (session()->has('message_warring'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>{{ session()->get('message_warring') }}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
              </div>
            @endif
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Profile</h3>
              </div>
             <!-- /.card-header -->
              <!-- form start -->
           
              <form id="quickForm" action="{{ url('reviewer/store_profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                            <label for="name">User Name</label>
                         <select class="select form-control" name="user_id"     data-placeholder="Select a username" style="width: 100%;" required>
                              <option value="{{$user_profile->id}}" selected>{{$user_profile->user_name}}</option>
                         </select>
                         @if(session()->has('user_warring'))
                          <p class="text-danger"> {{ session()->get('user_warring') }}</p>
                         @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control"
                            id="name"  placeholder="Enter Full Name"  >
                        </div>
                        <div class="form-group">
                            <label for="name">Student Id</label>
                            <input type="text" name="student_id" class="form-control"
                            id="name"  placeholder="Student ID"  >
                        </div>
                        <div class="form-group">
                            <label for="name">Department</label>
                            <input type="text" name="department" class="form-control"
                            id="name" placeholder="Department"  >
                        </div>
                         <div class="form-group">
                            <label for="name">Batch</label>
                            <input type="text" name="Batch" class="form-control"
                            id="name" placeholder="Department"  >
                        </div>
                       
                        
                        
                     </div>
                     <div class="col-md-5 ml-2">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" name="number" class="form-control" id="phone" placeholder="Phone Number" >    
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"  name="image" class="form-control" id="image" >
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea name="about" id="about" cols="5" rows="5" class="form-control"> </textarea>
                        </div>
                    
                     </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary h3">Update Profile</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
@endsection