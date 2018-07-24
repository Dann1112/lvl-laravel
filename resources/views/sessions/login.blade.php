
<!doctype html>
<html lang="en">

        @include('partials.head')

<body>

  <!-- Container principal-->
  <div class="container-fluid px-5 py-5" >

    <div class="container rounded px-5 contenedor py-3" style="max-width: 500px">
      <section>
          
        <img class="img-fluid mx-auto d-block" src="/assets/img/logos/GMR_BLANCO_2.png" style="max-height:150px">
        <hr style="border-color:cyan">
        <h1 class="entry-title text-center text-light">@lang('login.login')</h1>
        <hr style="border-color:cyan">
      
        @include('layouts.errors')

    
        <form action="{{ route('login') }}" class="form-group" method="POST" name="signup" id="signup" enctype="multipart/form-data" >

            {{ csrf_field ()}}

          <!--USERNAME-->
          <div class="form-group">
            <label class="col-form-label text-light" for="username">@lang('login.username')<span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="@lang('login.usernameHint')" required autofocus>
              </div>
          </div>


          <!--PASSWORD-->
          <div class="form-group">
            <label class="control-label text-light" for="password">@lang('login.password') <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="@lang('login.passwordHint')" required>
              </div>
              <!--<small><a class="btn btn-link" style="color:cyan; word-break:break-all" href="#">@lang('login.forgot')</a></small>-->
          </div>

          <!--<h5 class="text-right text-light" style="word-break:break-all">@lang('login.notRegistered')--><br>
            <h5 class="text-right"><a href="{{route('register')}}" style="color:cyan; word-break:break-all">@lang('login.createAccount')</a></h5>
          <br>
      <div class="form-group">
        <div class="d-flex flex-column justify-content-center text-center">
          <button name="submit" type="submit" class="btn btn-lg my-2" style="color:black; background-color:cyan">@lang('login.login')</button>
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