<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Technical Sales Requests</title>
  {{ HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
  {{ HTML::style('css/app.css') }}
</head>
<body>


  <header id="header">
  <nav class="navbar-inverse navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
       <a href="/" class="navbar-brand">Technical Sales Requests</a>
      </div>

    </div>
  </nav>
</header>


<div class="container-fluid">

  @if (Session::get('message'))
    <div>
       {{ Session::get('message') }}
    </div>
  @endif

  @if (Session::get('error_message'))
    <div>
      {{ Session::get('error_message') }}
    </div>
  @endif

  @if (Session::get('success'))
    {{ Session::get('success') }}
  @endif

  @yield('content')

{{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
{{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
</div>
</body>
</html>