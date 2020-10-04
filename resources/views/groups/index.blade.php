@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Group</div>
<div class="card-body">
@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif   
<a href="{{ URL::to('/groups/create') }}"><span class="glyphicon glyphicon-wrench" title="Add New Group">Add New Group</span></a>
<br>
<hr>
<br>
<table class="table table-striped">  
<thead> 
<th>Groups</th>  
<tr>  
<th>Id</th>  
<th>Group Number</th> 
<th>Course</th>
</tr>  
</thead>  
<tbody> 
@foreach($groups as $group)  
<tr>  
<td>{{$group->id}}</td>  
<td>
{{$group->group_number}}
</td> 
<td>
{{$group->course}}
</td> 
<tr>  
<td>
<a href="{{ URL::to('/groups/'.$group->id.'/edit /') }}"><span class="glyphicon glyphicon-pencil" title="Edit Group">Edit</span></a></td>     
<td>
<form action="{{ route('groups.destroy', $group->id)}}" method="post">
@csrf
@method('DELETE')
<button class="btn btn-danger" type="submit">Delete</button></form>
</td> 
</tr>         
@endforeach
</tbody>  
</table> 
{!! $groups->links() !!}
@endsection
