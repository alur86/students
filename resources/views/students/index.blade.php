@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Students</div>
<div class="card-body">
@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif   
<a href="{{ URL::to('/new') }}"><span class="glyphicon glyphicon-wrench" title="New Student">New Student</span></a>
<br>
<div class="col-md-3">
 <p>Search:</p>
<form class="navbar-form navbar-right" role="search" method="GET" action="{{ url('/search') }}">
<div class="input-group">
@if ($errors->has('query'))
<span class="help-block">
<strong>{{ $errors->first('query') }}</strong>
</span>
@endif
<input type="text" name="query" id="query"  class="form-control" placeholder="Search...">
<span class="input-group-btn">
<button type="submit" class="btn btn-default">
<span class="glyphicon glyphicon-search"></span>
</button>
</span>
</div>
</form> 
</div>
<hr>
<br>
<table class="table table-striped">  
<thead> 
<th>Students</th>  
<tr>  
<th>Id</th>  
<th>Name</th> 
<th>Surname</th>
<th>Birthday</th>
</tr>  
</thead>  
<tbody> 
@foreach($students as $student)  
<tr>  
<td>{{$student->id}}</td>  
<td>
{{$student->name}}
</td> 
<td>
{{$student->surname}}
</td> 
<td>
{{$student->birthdate}}
</td>
<tr>  
<td>
<a href="{{ URL::to('/edit/'.$student->id)}}">
<span class="glyphicon glyphicon-pencil" title="Edit Student">Edit</span></a></td>            
<td>
<form action="{{ route('delete', $student->id)}}" method="post">
@csrf
@method('DELETE')
<button class="btn btn-danger" type="submit">Delete</button>
</form>
</td> 
</tr>         
@endforeach
</tbody>  
</table> 

@endsection
