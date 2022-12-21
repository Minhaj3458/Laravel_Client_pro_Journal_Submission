@extends('layouts.backend.app')
@section('title')
 manage comment
@endsection
@section('comment')
active
@endsection
@section('manage_comment')
active
@endsection 

@section('Content_header')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Comment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Manage Comment </li>
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
                    <th>Topic Name</th>
                    <th>User Name </th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 @if ($comment)
                    @foreach($comment as $serial=>$show)
                    <tr>
                    <td>{{ $serial +1 }}</td>
                    <td>{{ $show->journal->topic_name }}</td>
                    <td>{{ $show->user->user_name }}</td>
                    <td>{{ $show->user->email }}</td>
                    <td>{{ $show->comment }}</td>
                    <td>{{ $show->created_at->format('Y-m-d h:i:s') }}</td>
                    <td>{{ $show->updated_at->format('Y-m-d h:i:s') }}</td>
                    <td> 
                      <a class="h4 text-danger mr-2" type="submit" onclick="deletecontent({{ $show->id  }})">
                          <i class="fas fa-trash-alt"></i>
                      </a>
                    <form id="delete-form-{{ $show->id  }}" 
                     action="{{ url('admin/comment_destroy',$show->id)}}" method="get" style="display: none;">
                      @csrf
                                      
                    </form>

                    <a href="{{ url('admin/comment_edit',$show->id)}}" class="h4 text-success"> <i class="fa fa-pencil-alt"></i> </a>
                   </td>
                  </tr>
                  @endforeach 
                 @endif
              
                 
                 
                 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Topic Name</th>
                    <th>User Name </th>
                    <th>Email</th>
                    <th>Comment</th>
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