@extends('layouts.default')

@section('content')
 <div class="row">
  <div class="col-lg-6">
    <h1>{{ $user->full_name }}</h1>
  </div>

   <div class="col-lg-6">
    <div id="shift-hours">
      <header id="shift-header">
        <p>Shift Hours</p>
      </header>
     <section id="shift-body">
        <p>8 am - 5 pm</p>
     </section>
    </div>
  </div>
 </div>

 <!-- upcoming demos -->
 <div class="row">

   <div class="col-lg-12">
     <h3>Assigned Demos</h3>

     @if(count($user->demos) == 0)
       <div class="alert alert-info">
         <p>User doesn't have demos assigned</p>
       </div>

     @else

     <table class="table table-striped">
       <tr>
         <th>Demo Name</th>
         <th>Company</th>
         <th>Date Requested</th>
         <th>Time Requested</th>
         <th>Status</th>
         <th></th>
       </tr>

     <!-- placeholder data -->
     <!-- start foreach -->
     @foreach($user->demos as $demo)
       <tr>
         <td>{{ $demo->name }}</td>
         <td>Decipher</td>
         <td>12/22/2014</td>
         <td>11:25 AM PST</td>
         <td><span class="label label-success">Open</span></td>
         <td><a href="/demo/{{ $demo->id }}/edit">Edit Demo</a></td>
       </tr>
     @endforeach
      <!-- end foreach -->
     </table>

    @endif
   </div>
 </div>
@stop