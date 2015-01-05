@extends('layouts.default')

@section('content')

<h2>Requested Demos  <span><a href="/demo/create" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Request Demo</a></span></h2>


@if (count($demos) == 0)
 <div class="alert alert-info">
  <p>Demos do not exist</p>
 </div>

@else
<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Requested By</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>

  @foreach($demos as $demo)
   <tr>
     <td><a href="demo/{{ $demo->id }}">{{ $demo->name }}</a></td>
     <td>{{ $demo->description }}</td>
     <td><a href="profile/{{ $demo->user->username }}">{{ $demo->user->full_name }}</a></td>
     <td><a href="demo/{{ $demo->id }}/assign">Assign Demo</a></td>
     <td><a href="demo/{{ $demo->id }}/edit">Edit</a></td>
     <td>
       {{ Form::open(['url' => 'demo/'.$demo->id.'/', 'method' => 'DELETE']) }}
         {{ Form::hidden('id') }}
         {{ Form::submit('delete') }}
       {{ Form::close() }}
     </td>
   </tr>
  @endforeach
</table>
@endif

@stop