<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Portal Berita - Register Page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ ('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ ('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ ('admin/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ ('admin/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form  method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control p_input @error('name') is-invalid @enderror" id="inputName">
                    @error('name')
                        <span class="text text-danger" >{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control p_input @error('email') is-invalid @enderror" id="inputEmail">
                    @error('email')
                        <span class="text text-danger" >{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control p_input @error('password') is-invalid @enderror" id="inputPassword">
                    @error('password')
                        <span class="text text-danger" >{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook col mr-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="/login"> Login</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ ('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ ('admin/js/off-canvas.js') }}"></script>
    <script src="{{ ('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ ('admin/js/misc.js') }}"></script>
    <script src="{{ ('admin/js/settings.js') }}"></script>
    <script src="{{ ('admin/js/todolist.js') }}"></script>
    <!-- endinject -->
  </body>
</html>
