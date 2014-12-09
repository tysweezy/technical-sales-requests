@extends('layouts.default')

@section('content')

  @if ($errors->has())
   <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
   </ul>
  @endif

  <h2>Edit Demo</h2>

  {{ Form::model($demo, ['route' => array('demo-edit', $demo->id)]) }}

    {{ Form::label('name', 'Name') }} <br>
    {{ Form::text('name') }} <br><br>

    {{ Form::label('description', 'Description') }} <br>
    {{ Form::textarea('description') }} <br>

    {{ Form::submit('Edit Demo') }}
  {{ Form::close() }}

@stop