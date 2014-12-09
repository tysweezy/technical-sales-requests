@extends('layouts.default')

@section('content')
 <h1>Technical Sales Requests</h1>

 <!-- temp nav -->
 <ul>
   <li><a href="/demo/create">Create Demo</a></li>
 </ul>

<h2>Demos</h2>
<table>
  <tr>
    <th>Name</th>
    <th>Description</th>
  </tr>

  @foreach($demos as $demo)
   <tr>
     <td><a href="demo/{{ $demo->id }}">{{ $demo->name }}</a></td>
     <td>{{ $demo->description }}</td>
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


@stop