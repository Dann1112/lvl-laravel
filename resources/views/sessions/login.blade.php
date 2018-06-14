
<!doctype html>
<html lang="en">

        @include('partials.head')

<body>

  <!-- Container principal-->
  <div class="container-fluid px-5 py-5" >

    <div class="container border rounded px-5" style="max-width: 500px; background-color: #FFFFFF">
      <section>
        <img class="img-fluid mx-auto d-block" src="/assets/img/logos/logo2.png" style="height:150px">
        <h1 class="entry-title text-center text-dark">@lang('login.login')</h1>
        <hr>
      
        @include('layouts.errors')

    
        <form action="{{ route('login') }}" class="form-group" method="POST" name="signup" id="signup" enctype="multipart/form-data" >

            {{ csrf_field ()}}

          <!--USERNAME-->
          <div class="form-group">
            <label class="col-form-label" for="username">@lang('login.username')<span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="@lang('login.usernameHint')" required autofocus>
              </div>
          </div>


          <!--PASSWORD-->
          <div class="form-group">
            <label class="control-label" for="password">@lang('login.password') <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="@lang('login.passwordHint')" required>
              </div>
              <small><a class="btn btn-link" href="#">@lang('login.forgot')</a></small>
          </div>

          <h5 class="text-right" style="color:black">@lang('login.notRegistered')<br>
            <a href="{{route('register')}}">@lang('login.createAccount')</a></h5>
          <br>
      <div class="form-group">
        <div class="d-flex flex-column justify-content-center text-center">
          <button name="submit" type="submit" class="btn btn-lg acento my-2" style="color:white">@lang('login.login')</button>
                <!--<label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                </label>-->
        </div>
      </div>
    </div>
  </form>
</div>
</div>


</body>
</html>