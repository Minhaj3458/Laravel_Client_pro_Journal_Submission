
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reviewer Registration Page</title>
    @include('layouts.backend.partials.css')
</head>
<body class="hold-transition dark-mode register-page">
<div class="register-box">
  
  <div class="card">
    <div class="card-body register-card-body">
      @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('message') }}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
              </div>
       @endif
      <p class="login-box-msg">Register a new reviewer membership</p>

      <form  action="{{ url('reviewer/registraion') }}"  method="POST">
         @csrf
        <div class="input-group mb-3">
          <input type="text" name="user_name" class="form-control" placeholder="User Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
            @error('user_name')
                     <p class="text-danger">{{ $message }}</p>
           @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>  
        </div>
         @error('email')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
           <p class="text-danger">{{ $message }}</p>
          @enderror    
        </div>
        <div class="input-group mb-3">
          <input type="password" name="con_password" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
           @if(session()->has('pass_error'))
          <p class="text-danger"> {{ session()->get('pass_error') }}</p>
           @endif
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <a href="{{ url('reviewer/login_page')}}" class="text-center">Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@include('layouts.backend.partials.scripts')
</body>
</html>
