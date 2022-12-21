@extends('layouts.frontend.app')
@section('title')
Journal Type
@endsection
@push('css')
<style>  
.search {
   background-color: rgba(0, 0, 0, 0.65);
   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
   padding: 2px;
   border-radius: 2px;
   margin-bottom: 30px;
}

::placeholder {
    color: #eee;
    opacity: 1
}

.search-2 {
    position: relative;
    width: 100%
}

.search-2 input {
   background-color: #222;
   border: none;
   color: #fff;
    height: 45px;
    border: none;
    width: 100%;
    padding-left: 18px;
    padding-right: 100px
}

.search-2 input:focus {
    border-color: none;
    box-shadow: none;
    outline: none
}

.search-2 i {
    position: absolute;
    top: 12px;
    left: -10px;
    font-size: 24px;
    color: #eee
}

.search-2 button {
    position: absolute;
    right: 1px;
    top: 0px;
    border: none;
    height: 45px;
    background-color: #ffb600;
    color: #fff;
    width: 90px;
    border-radius: 4px
}

@media (max-width:800px) {
    .search-1 input {
        border-right: none;
        border-bottom: 1px solid #eee
    }

    .search-2 i {
        left: 4px
    }

    .search-2 input {
        padding-left: 34px
    }

    .search-2 button {
        height: 37px;
        top: 5px
    }
}  
</style>  
@endpush
@section('slider')
<div id="banner-area" class="banner-area" style="background-image:url({{ asset('assets/frontends/images/slider-main/slider5.jpg') }})">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Journal Type</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Journal Type</a></li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

@endsection
@section('content')
  <section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 order-1 order-lg-0">

        <div class="sidebar sidebar-left">
          <div class="widget recent-posts">
            <h3 class="widget-title">Recent Journal</h3>
            <ul class="list-unstyled">
              @if ($journal_latest )
                @foreach ($journal_latest  as $show)
                  <li class="d-flex align-items-center">
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="{{ url('single_journal_Show',$show->id)}}">{{ $show->topic_name }}</a>
                    <span class="post-meta-date"><i class="far fa-calendar"></i>{{$show->created_at->format('Y-M-d')}}</span>
                  </h4>
                </div>
              </li><!-- 1st post end-->
                @endforeach
              @endif
              


            </ul>

          </div><!-- Recent post end -->

        </div><!-- Sidebar end -->

  
      </div><!-- Sidebar Col end -->

      <div class="col-lg-8 mb-5 mb-lg-0 order-0 order-lg-1" id="show" >
       <div class="search"> 
          <div class="row">  
            <div class="col-md-12"> <div>
              <div class="search-2"> <i class='bx bxs-map' ></i> 
              <input type="text" name="search" id="searchbar" onkeyup="search_animal()"  placeholder="Search Journal"> <button>Search</button>
              </div>
            </div> 
          </div> 
        </div> 
       </div>
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
        @if ($journal_typeBy_show)
          @foreach ($journal_typeBy_show as $show)
        <div class="post">
          <div class="post-media post-image">
             <iframe src="{{asset('assets/paper_pdf/'.$show->pdf)}}" title="description" height="250" width="720" loading="lazy"></iframe>
          </div>
          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="{{ url('single_journal_Show',$show->id)}}">{{$show->submit_by}}</a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="{{ url('single_journal_Show',$show->id)}}">{{ $show->journal_type->journal_type }}</a>
                </span>
                <span class="post-meta-date"><i class="far fa-calendar"></i>{{$show->created_at->format('Y-m-d')}}</span>
                <span class="post-comment"><i class="far fa-comment"></i>{{ $show->email }} <a href="#"
                    class="comments-link"></a></span>
              </div>
               <div class="">
                  <div class="row">
                     <div class="col-lg-5">
                       Name : {{$show->name}}
                     </div>
                     <div class="col-lg-6">
                      @if ($show->student_id)
                        ID : {{$show->student_id}}
                      @elseif ($show->teacher_id)
                        ID : {{$show->teacher_id}}
                      @else
                        ID:
                      @endif
                     </div>
                     <div class="col-lg-5">
                      Department : {{$show->department}}
                     </div>
                     <div class="col-lg-6">
                      Batch: {{$show->batch}}
                     </div>
                  </div>
              </div>
              <h2 class="entry-title">
                <a href="{{ url('single_journal_Show',$show->id)}}">{{ $show->topic_name }}</a>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <p>{{Str::limit($show->description, 100)}}</p>
            </div>

            <div class="post-footer">
              <a href="{{ url('single_journal_Show',$show->id)}}" class="btn btn-primary">Continue Reading</a>
            </div>

          </div><!-- post-body end -->
        </div><!-- 1st post end -->
        
          @endforeach
          {{ $journal_typeBy_show->links() }} 
        @endif
      </div><!-- Content Col end -->

    </div><!-- Main row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->

@endsection