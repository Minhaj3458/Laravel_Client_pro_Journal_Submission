
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reviewer Login</title>
  @include('layouts.backend.partials.css')
</head>

<body class="hold-transition login-page bg-dark">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
       @if(session()->has('error'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('error') }}</strong> 
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
    <div class="card-header text-center">
      <h1 class="h1 text-dark"><b>Reviewer</b>Login</h1>
    </div>
         
    <div class="card-body">
      <p class="login-box-msg text-dark">Sign in to start your session</p>

      <form action="{{ url('reviewer/login') }}" method="post" >
          @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="{{ url('password/reset')}}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ url('reviewer/registraion_page') }}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@include('layouts.backend.partials.scripts')
</body>
</html>
