@extends('layouts.default')

@section('content')
 <h2>Reset Password</h2>

  {{ Confide::makeResetPasswordForm(Auth::user()->remember_token) }}
@stop