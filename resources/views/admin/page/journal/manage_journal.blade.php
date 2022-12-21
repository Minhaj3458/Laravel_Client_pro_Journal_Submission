@extends('layouts.backend.app')
@section('title')
 manage journal
@endsection
@section('journal')
active
@endsection
@section('manage_journal')
active
@endsection 

@section('Content_header')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Journal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/create_journal')}}">Create Journal</a></li>
              <li class="breadcrumb-item active">Manage Journal </li>
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
                    <th>Journal Type</th>
                    <th>Topic Name </th>
                    <th>Journal Paper</th>
                    <th>Status</th>
                    <th>Status Action</th>
                    <th>Full Name</th>
                    <th>Student Id</th>
                    <th>Teacher Id</th>
                    <th>Department</th>
                    <th>Batch</th>
                    <th>Submit By</th>
                    <th>Description</th>
                    <th>Publish Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($journal as $serial=>$show)
                    <tr>
                    <td>{{ $serial +1 }}</td>
                    <td>{{ $show->journal_type->journal_type }}</td>
                    <td>{{ $show->topic_name }}</td>  
                    <td>
                        <a href="{{ url('admin/show_pdf',$show->id)}}"  class="btn btn-primary h3"> view </a>
                    </td>
                    @if ($show->status == 1)
                    <td class="text-success">approved</td>
                    @else
                    <td class="text-warning">unapproved</td>
                    @endif
                    @if ($show->status == 0)
                    <td class="text-success"><a href="{{ url('admin/journal_status_update',$show->id)}}" class="btn btn-success">Approved</a></td>
                    @else
                    <td class="text-warning"><a href="{{ url('admin/journal_status_update',$show->id)}}" class="btn btn-danger">Unapproved</a></td>
                    @endif
                    <td>{{ $show->name }}</td> 
                    <td>{{$show->student_id}}</td>
                    <td>{{$show->teacher_id}}</td>
                    <td>{{$show->department}}</td>
                    <td>{{$show->batch}}</td>
                    <td>{{$show->submit_by}}</td>
                    <td>{{Str::limit($show->description, 50)}}</td>
                    <td>{{$show->created_at->format('Y-m-d')}}</td>
                    <td> 
                      <a class="h4 text-danger mr-2" type="submit" onclick="deletecontent({{ $show->id  }})">
                          <i class="fas fa-trash-alt"></i>
                      </a>
                    <form id="delete-form-{{ $show->id  }}" 
                     action="{{ url('admin/destroy_journal',$show->id)}}" method="get" style="display: none;">
                      @csrf
                                      
                    </form>

                    <a href="{{ url('admin/edit_journal',$show->id)}}" class="h4 text-success"> <i class="fa fa-pencil-alt"></i> </a>
                   </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Journal Type</th>
                    <th>Topic Name </th>
                    <th>Journal Paper</th>
                    <th>Status</th>
                    <th>Status Action</th>
                    <th>Full Name</th>
                    <th>Student Id</th>
                    <th>Teacher Id</th>
                    <th>Department</th>
                    <th>Batch</th>
                    <th>Submit By</th>
                    <th>Description</th>
                    <th>Publish Date</th>
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