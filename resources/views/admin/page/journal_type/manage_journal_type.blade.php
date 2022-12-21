@extends('layouts.backend.app')
@section('title')
 manage journal type
@endsection
@section('journal_type')
active
@endsection
@section('manage_journal_type')
active
@endsection 

@section('Content_header')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Journal Type</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/create_journal_type')}}">Create Journal Type</a></li>
              <li class="breadcrumb-item active">Manage Journal Type </li>
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
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($journal_type as $serial=>$show)
                    <tr>
                    <td>{{ $serial +1 }}</td>
                    <td>{{ $show->journal_type }}</td>
                    <td>{{ $show->created_at->format('Y-m-d h:i:s') }}</td>
                    <td>{{ $show->updated_at->format('Y-m-d h:i:s') }}</td>
                    <td> 
                      <a class="h4 text-danger mr-2" type="submit" onclick="deletecontent({{ $show->id  }})">
                          <i class="fas fa-trash-alt"></i>
                      </a>
                    <form id="delete-form-{{ $show->id  }}" 
                     action="{{ url('admin/destroy_journal_type',$show->id)}}" method="get" style="display: none;">
                      @csrf
                                      
                    </form>

                    <a href="{{ url('admin/edit_journal_type',$show->id)}}" class="h4 text-success"> <i class="fa fa-pencil-alt"></i> </a>
                   </td>
                  </tr>
                  @endforeach
                 
                 
                 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Journal Type</th>
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