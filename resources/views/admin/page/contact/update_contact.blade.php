@extends('layouts.backend.app')
@section('title')
update contact
@endsection
@section('contact')
active
@endsection

@section('Content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Contact</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/contact_manage') }}">manage Contact</a></li>
              <li class="breadcrumb-item active">Update Contact</li>
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
                <h3 class="card-title">Update Contact</h3>
              </div>
             <!-- /.card-header -->
              <!-- form start -->
           
              <form id="quickForm" action="{{ url('admin/contact_update',$contact->id) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="form-control"
                    id="name" value="{{ $contact->name}}" placeholder="Enter Full Name"  >
                  </div>
                  <div class="form-group">
                    <label for="phone">Email</label>
                    <input type="email" name="email" value="{{ $contact->email }}" class="form-control" id="phone" placeholder="Email" >    
                  </div>
                  <div class="form-group">
                    <label for="address">Subject</label>
                    <input type="text" name="subject" value="{{ $contact->subject}}"  class="form-control" id="address" placeholder="Subject">
                  </div>
                  <div class="form-group">
                    <label for="about">Message</label>
                    <textarea name="message" id="about" cols="5" rows="5" class="form-control">{{ $contact->message}}</textarea>
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
                  <button type="submit" class="btn btn-primary h3">Update Contact</button>
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