@extends('layouts.backend.app')
@section('title')
update admin 
@endsection
@section('admininformation')
active
@endsection

@section('Content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/manage_information') }}">manage Information</a></li>
              <li class="breadcrumb-item active">Update Information</li>
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
          <div class="col-md-1"></div>
          <div class="col-md-8">
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
                <h3 class="card-title">Update Information</h3>
              </div>
             <!-- /.card-header -->
              <!-- form start -->
           
              <form id="quickForm" action="{{ url('admin/update_information',$admin_info->id) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group text-dark">
                    <label for="name">User Name</label>
                     <select name="user_name" id="" class="form-control" disabled>
                      @if ($users)
                      @foreach ($users as $show )
                        @if( $show->id == $admin_info->user_id )
                          <option value="{{$show->id}}" class="text-dark" selected><p class="text-dark" >{{$show->user_name}}</p></option>
                        @endif
                      @endforeach 
                      @endif
                     </select>
                     @if(session()->has('user_warring'))
                      <p class="text-danger"> {{ session()->get('user_warring') }}</p>
                     @endif
                  </div>
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="form-control"
                    id="name" value="{{ $admin_info->name}}" placeholder="Enter Full Name"  >
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="number" value="{{ $admin_info->number }}" class="form-control" id="phone" placeholder="Phone Number" >    
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ $admin_info->address}}"  class="form-control" id="address" placeholder="Address">
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file"  name="image" class="form-control" id="image" >
                  </div>
                  <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $admin_info->about}}</textarea>
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary h3">Update Information</button>
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