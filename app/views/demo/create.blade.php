@extends('layouts.default')

@section('content')
 <h1>Request Demo</h1>

  @if ($errors->has())
   <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
   </ul>
  @endif

  {{ Form::open() }}

    {{ Form::label('title', 'Title') }} <br>
    {{ Form::text('title') }}  <br>



    {{ Form::label('description', 'Description') }} <br>
    {{ Form::textarea('description') }} <br>

    <br>

    {{ Form::submit('Create Demo') }}

  {{ Form::close() }}

@stop