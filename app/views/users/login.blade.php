@extends('layouts.users')

@section('content')

  <h1>Login</h1>

  {{ Confide::makeLoginForm()->render(); }}

@stop