@extends('layouts.backend.app')
@section('title')
create admin journal
@endsection
@section('journal')
active
@endsection
@section('create_journal')
active
@endsection 

@section('Content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Journal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/manage_journal') }}">manage Journal</a></li>
              <li class="breadcrumb-item active">Create Journal</li>
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
                <h3 class="card-title">Create Journal</h3>
              </div>
             <!-- /.card-header -->
              <!-- form start -->
           
              <form id="quickForm" action="{{ url('admin/store_journal') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="journal_type_id">Journal Type</label>
                    <select class="form-control select" name="journal_type_id" data-placeholder="Select a username" required>
                     @if ($journal_type )
                      @foreach ($journal_type as $show )
                          <option value="{{$show->id}}">{{$show->journal_type}}</option>
                      @endforeach 
                    @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="topic_name">Topic Name</label>
                    <input type="text" name="topic_name" class="form-control"
                    id="topic_name" placeholder="Enter Topic Name" maxlength="350" required >
                  </div>
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="form-control"
                    id="name" placeholder="Enter Full Name" required>
                  </div>
                  <div class="form-group">
                    <label for="student_id">Student Id</label>
                    <input type="text" name="student_id" class="form-control"
                    id="student_id" placeholder="Enter Student Id"  >
                  </div>
                  <div class="form-group">
                    <label for="teacher_id">Teacher Id</label>
                    <input type="text" name="teacher_id" class="form-control"
                    id="teacher_id" placeholder="Enter Teacher Id"  >
                  </div>
                  <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" name="department" class="form-control"
                    id="department" placeholder="Enter Department" required >
                  </div>
                  <div class="form-group">
                    <label for="batch">Batch</label>
                    <input type="text" name="batch" class="form-control"
                    id="batch" placeholder="Enter Batch" >
                  </div>
                  
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                  </div>
                 <div class="col-md-6">
                 <div class="form-group">
                    <label for="submit_by">Submit By</label>
                    <select class="form-control select" name="submit_by" data-placeholder="Select a username"  required>
                          <option value="admin">Admin</option>
                          <option value="auth">Author</option>
                          <option value="reviewer">Reviewer</option>
                    
                    </select>
                  </div>
                 <div class="form-group">
                    <label for="phone">Email</label>
                    <input type="email" name="email" maxlength="80" class="form-control" id="phone" placeholder="Enter Email" required >    
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone_number" maxlength="15" class="form-control" id="phone" placeholder="Phone Number" required>    
                  </div>
                  <div class="form-group">
                    <label for="pdf">Upload Paper(PDF)</label>
                    <input type="file" name="pdf" class="form-control" id="pdf" accept="application/pdf" required>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" data-placeholder="Enter Description" cols="5" rows="5" class="form-control" maxlength="500" required></textarea>
                  </div>
                 </div>
                </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary h3">Create Journal</button>
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