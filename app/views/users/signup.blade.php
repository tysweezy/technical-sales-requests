@extends('layouts.users')

@section('content')
  <h1>Signup</h1>

  {{ Confide::makeSignupForm()->render();  }}
@stop