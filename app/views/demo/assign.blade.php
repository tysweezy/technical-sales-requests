@extends('layouts.default')

@section('content')
 <h1>Assign {{ $demo->name }} Demo</h1>

 <label for="">Demo Name</label>
 <p>{{ $demo->name }}</p>

{{ Form::open() }}
  <label for="user_assign">Assign Sales Person to Demo</label>
  <select name="user_assign" id="assign-dropdown" class="form-control">
    <option value="0">---</option>
    @foreach($users as $user)
      <option value="{{ $user->id }}">{{ $user->full_name }}</option>
    @endforeach
  </select>

  <br>

  {{ Form::submit("Assign Demo", array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop