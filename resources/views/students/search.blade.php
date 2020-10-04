@extends('layouts.app')

@section('content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading"><h3>Students</h3></div>
<div class="panel-body">
<div class="row">
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
@if (count($students) > 0) 
<p>Found: <i>{{$query}} </i></p>
<p>Total: {{$total}} matches</p>     
</div> 
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
</tr>         
@endforeach
</tbody>  
</table> 
{!! $students->links() !!}
@else
<p>Found: <i>{{$query}} </i></p>
<p>Total: {{$total}} matches</p> 
@endif
</div>
@endsection

