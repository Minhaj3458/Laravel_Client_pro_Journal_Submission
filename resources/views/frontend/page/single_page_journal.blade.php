@extends('layouts.frontend.app')
@section('title')
Single Journal Show 
@endsection
@section('slider')
<div id="banner-area" class="banner-area" style="background-image:url({{ asset('assets/frontends/images/slider-main/slider3.jpg') }})">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Journal</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Single Journal</a></li>
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

      <div class="col-lg-8 mb-5 mb-lg-0">

        <div class="post-content post-single">
          <div class="post-media post-image">
            <iframe src="{{asset('assets/paper_pdf/'.$journal->pdf)}}" title="description" height="500" width="750" loading="lazy" ></iframe>
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#">{{$journal->submit_by}}</a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#">{{ $journal->journal_type->journal_type }}</a>
                </span>
                <span class="post-meta-date"><i class="far fa-calendar"></i> {{ $journal->created_at->format('Y-m-d')}}</span>
                <span class="post-comment"><i class="far fa-comment"></i>{{ $journal->email }} <a href="#"
                    class="comments-link"></a></span>
              </div>
              <div class="">
                  <div class="row">
                     <div class="col-lg-5">
                       Name : {{$journal->name}}
                     </div>
                     <div class="col-lg-6">
                      @if ($journal->student_id)
                        ID : {{$journal->student_id}}
                      @elseif ($journal->teacher_id)
                        ID : {{$journal->teacher_id}}
                      @else
                        ID:
                      @endif
                     </div>
                     <div class="col-lg-5">
                      Department : {{$journal->department}}
                     </div>
                     <div class="col-lg-6">
                      Batch: {{$journal->batch}}
                     </div>
                  </div>
              </div>
              <h2 class="entry-title">
                {{ $journal->topic_name }}
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <p>{{ $journal->description }} </p>
            </div>


          </div><!-- post-body end -->
        </div><!-- post content end -->

        
       <!-- Post comment start -->
        <div id="comments" class="comments-area">
          <h3 class="comments-heading">{{ $journal->comment()->count()}} Comments</h3>

          <ul class="comments-list">
            @foreach ($journal->comment as $comment )
                <li>
              <div class="comment d-flex">
                @if ($comment->user->admin_info)
                   <img loading="lazy" class="comment-avatar" alt="image" src="{{asset('assets/profile/'.$comment->user->admin_info->image)}}">
                @elseif ($comment->user->reviewer_info)
                  <img loading="lazy" class="comment-avatar" alt="image" src="{{asset('assets/reviewer_profile/'.$comment->user->reviewer_info->image)}}">
                @elseif ($comment->user->auth_info)
                <img loading="lazy" class="comment-avatar" alt="image" src="{{asset('assets/auth_profile/'.$comment->user->auth_info->image)}}">
                @else
                  <img loading="lazy" class="comment-avatar" alt="image" src="">
                @endif
               
                <div class="comment-body">
                  <div class="meta-data">
                    <span class="comment-author mr-3">{{ $comment->user->user_name }} </span>
                    <span class="comment-date float-right">{{$comment->created_at->format('M d ,Y  H:i:s ')}}</span>
                  </div>
                  <div class="comment-content">
                    <p>{{ $comment->comment }}</p>
                  </div>
                </div>
              </div><!-- Comments end -->
            </li><!-- Comments-list li end -->
            @endforeach
          
          </ul><!-- Comments-list ul end -->
        </div><!-- Post comment end -->

        <div class="comments-form border-box">
          <h3 class="title-normal">Add a comment</h3>
          @guest()
           <p> For Journal A New Comment.You Need To Login First<a href="{{ url('reviewer/login_page')}}" class="btn-primary ml-2"> Login </a></p>
          @else
          <form role="form" action="{{ url('comment_store',$journal->id) }}"  method="POST" enctype="multipart/form-data" >
             @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="message"><textarea class="form-control required-field" id="message" name="comment" placeholder="Your Comment" cols="150" rows="6" required></textarea></label>
                </div>
              </div><!-- Col 12 end -->
            </div><!-- Form row end -->
            <div class="clearfix">
              <button class="btn btn-primary" type="submit" aria-label="post-comment">Add Comment</button>
            </div>
          </form><!-- Form end -->
          @endguest
          
        </div><!-- Comments form end -->
      </div><!-- Content Col end -->
      <div class="col-lg-4">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Recent Posts</h3>
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

    </div><!-- Main row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->
@endsection