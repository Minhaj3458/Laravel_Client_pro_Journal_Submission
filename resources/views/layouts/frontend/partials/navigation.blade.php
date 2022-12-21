<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
    
    </div><!-- Container end -->
  </div>

  <div class="site-navigation">
    <div class="container">
        <div class="row">
          <div class="col-lg-2">
          </div>
          <div class="col-lg-9">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item active"><a class="nav-link" href="{{ url('/')}}">Home</a></li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Journal Type<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            @if ($journal_type)
                              @foreach ($journal_type as $show )
                                 <li><a href="{{ url('journal_type_Show',$show->id)}}">{{$show->journal_type}}</a></li>
                              @endforeach
                              
                            @endif
                           
                          </ul>
                      </li>
              
                       <li class="nav-item"><a class="nav-link" href="{{ url('about_page') }}">About</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('contact_page') }}">Contact</a></li>
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Registration<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('auth/registration_page')}}" target="_blank">Author</a></li>
                            <li><a  href="{{ url('reviewer/registraion_page')}}" target="_blank">Reviewer</a></li>
                          </ul>
                      </li>
              
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Login <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('admin/login_page')}}" target="_blank">Admin</a></li>
                            <li><a href="{{ url('auth/login_page')}}" target="_blank">Author</a></li>
                            <li><a  href="{{ url('reviewer/login_page')}}" target="_blank">Reviewer</a></li>
                          </ul>
                      </li>
              
                    </ul>
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <!-- <div class="nav-search">
          <span id="search"><i class="fa fa-search"></i></span>
        </div> -->
        <!-- Search end -->
        <form action="{{ url('journal_search') }}"  method="get">
          @csrf 
          <div class="search-block" style="display: none;">
            <label for="search-field" class="w-100 mb-0">
              <input type="text" class="form-control" name="name"  placeholder="Type what you want and enter">
            </label>
            <span class="search-close">&times;</span>
          </div><!-- Site search end -->
        </form>
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->