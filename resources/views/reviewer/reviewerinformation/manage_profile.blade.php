@extends('layouts.backend.app')
@section('title')
 manage reviewer profile
@endsection
@section('Profile')
active
@endsection
@section('manage_profile')
active
@endsection 

@section('Content_header')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('reviewer/create_profile')}}">Create Profile</a></li>
              <li class="breadcrumb-item active">Manage Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial</th>
                    <th>User Name</th>
                    <th>Full Name</th>
                    <th>Student Id</th>
                    <th>Department</th>
                    <th>Batch</th>
                    <th>Phone Number</th>
                    <th>Image</th>
                    <th>address</th>
                    <th>about</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 @if ($review_profile->reviewer_info)
                  <tr>
                    <td>1</td>
                    <td>{{$review_profile->user_name}}</td>
                    <td>{{$review_profile->reviewer_info->name}}</td>
                    <td>{{$review_profile->reviewer_info->student_id}}</td>
                    <td>{{$review_profile->reviewer_info->department}}</td>
                    <td>{{$review_profile->reviewer_info->Batch}}</td>
                    <td>{{$review_profile->reviewer_info->number}}</td>   
                    <td>
                      <img class="img-fluid img-thumbnail" src="{{asset('assets/reviewer_profile/'.$review_profile->reviewer_info->image)}}" width="40" height="40" alt="img">
                    </td>
                    <td>{{$review_profile->reviewer_info->address}}</td>
                    <td>{{Str::limit($review_profile->reviewer_info->about, 50)}}</td>
                    <td>{{$review_profile->reviewer_info->created_at->format('Y-m-d h:i:s')}}</td>
                    <td>{{$review_profile->reviewer_info->updated_at->format('Y-m-d h:i:s')}}</td>
                    <td> 
                      <a class="h4 text-danger mr-2" type="submit" onclick="deletecontent({{ $review_profile->reviewer_info->id }})">
                          <i class="fas fa-trash-alt"></i>
                      </a>
                    <form id="delete-form-{{ $review_profile->reviewer_info->id }}" 
                    
                action="{{ url('reviewer/destroy_profile',$review_profile->reviewer_info->id)}}" method="get" style="display: none;">
                      @csrf                
                    </form>

                    <a href="{{ url('reviewer/edit_profile_page',$review_profile->reviewer_info->id)}}" class="h4 text-success"> <i class="fa fa-pencil-alt"></i> </a>
                   </td>
                  </tr>
                 @endif
                   
                
                 
                 
                 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>User Name</th>
                    <th>Full Name</th>
                    <th>Student Id</th>
                    <th>Department</th>
                    <th>Batch</th>
                    <th>Phone Number</th>
                    <th>Image</th>
                    <th>address</th>
                    <th>about</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
@endsection

@push('js')

    
@endpush