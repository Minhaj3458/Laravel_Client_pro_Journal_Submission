@extends('layouts.backend.app')
@section('title')
show admin paper pdf
@endsection
@section('journal')
active
@endsection


@section('Content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Journal Paper</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/manage_journal') }}">manage Journal</a></li>
              <li class="breadcrumb-item active">Show Journal Paper</li>
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
    
              <iframe src="{{asset('assets/paper_pdf/'.$pdf->pdf)}}" title="description" height="500" width="1000"></iframe>
           
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  

@endsection