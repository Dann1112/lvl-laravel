@extends('layouts.layout')

@section('content')
<div class="container contenedor text-center my-3 py-3">
        <hr>
        <h3>@lang('contact.weTitle')</h3>
        <p style="color:white">@lang('contact.we')</p>
        <hr>
        <h2>@lang('contact.improveTitle')</h2>
        <p style="color:white">@lang('contact.improve')</p>
        <a href="mailto:contacto@lvlesports.com"><button class="btn btn-lg acento" style="color:white">@lang('contact.improveBtn')</button></a>
        <h3 class="display-4 my-2">@lang('contact.thanks')</h3>
        <hr>
      
      </div>
@endsection
