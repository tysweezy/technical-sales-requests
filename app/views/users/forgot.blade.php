@extends('layouts.users')

@section('content')

  <h1>Forgot Password</h1>

  {{ Confide::makeForgotPasswordForm()->render() }}

@stop