<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Technical Sales Requests</title>
  {{ HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
  {{ HTML::style('bower_components/fontawesome/css/font-awesome.min.css') }}
  {{ HTML::style('bower_components/fullcalendar/dist/fullcalendar.css') }}
  {{ HTML::style('css/app.css') }}
</head>
<body>

@include('includes.header')

@include('includes.sidemenu')

<div class="container-fluid">

<div id="page-content">
  @if (Session::get('message'))
    <div class="alert alert-info">
       {{ Session::get('message') }}
    </div>
  @endif

  @if (Session::get('error_message'))
    <div class="alert alert-danger">
      {{ Session::get('error_message') }}
    </div>
  @endif

  @if (Session::get('success'))
   <div class="alert alert-success">
    {{ Session::get('success') }}
   </div>
  @endif

  @yield('content')
</div>

{{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
{{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
{{ HTML::script('bower_components/moment/min/moment.min.js') }}
{{ HTML::script('bower_components/fullcalendar/dist/fullcalendar.js') }}
{{ HTML::script('js/tsrcalendar.js') }}
</div>
</body>
</html>