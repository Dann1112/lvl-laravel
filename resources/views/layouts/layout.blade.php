<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('partials.head')
    @include('partials.header')
    <body>
        <!-- Div que permite desplazar el contenido debido al header flotante-->
        <div class="container-fluid row d-none p-0 d-md-flex" style="height:70px; background-color: black">
        </div>
        <div class="container-fluid d-md-none p-0" style="height:250px; background-color:black">
        </div>
        @yield('content')
    </body>
    @include('partials.footer')
</html>