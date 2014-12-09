<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Technical Sales Requests</title>
</head>
<body>

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
</body>
</html>