<header id="header">
  <nav class="navbar-inverse navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
       <a href="/" class="navbar-brand">Technical Sales Requests</a>
      </div>

       <ul class="nav navbar-nav pull-right">

        @if (Auth::check())
        <li><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">

              {{ Confide::user()->username }} <span class="caret"></span>

        </a>
         <ul class="dropdown-menu dropdown-user" role="menu">
            <li><a href="{{ URL::route('password-reset', Auth::user()->remember_token) }}">Change Password</a></li>
            <li><a href="/users/logout">Logout</a></li>
         </ul>
        </li>
        @endif
       </ul>
    </div>
  </nav>
</header>


