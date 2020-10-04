@extends('layouts.app')

@section('content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Add New Group</div>
<div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="{{ url('/groups.store') }}">
{{ csrf_field() }}
<div class="col-md-6">
<div class="form-group{{ $errors->has('group_number') ? ' has-error' : '' }}">
<label for="group_number" class="col-md-4 control-label">Group Number</label>
<div class="col-md-6">
<input id="group_number" type="text" class="form-control" name="group_number" value="{{old('group_number')}}">
@if ($errors->has('group_number'))
<span class="help-block">
<strong>{{ $errors->first('group_number') }}</strong>
</span>
@endif
</div>
<div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
<label for="course" class="col-md-4 control-label">Course</label>
<div class="col-md-6">
<input id="course" type="text" class="form-control" name="course" value="{{old('course')}}">
@if ($errors->has('course'))
<span class="help-block">
<strong>{{ $errors->first('course') }}</strong>
</span>
@endif
</div>
<div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
<label for="department_id" class="col-md-4 control-label">Department</label>
<div class="col-md-6">
<select  name="department_id">
<option selected disabled>Please select one option</option>
@foreach($departments as $dep)
<option value="{{ $dep->id }}">{{ $dep->title }}</option>
@endforeach
</select>  
@if ($errors->has('department_id'))
<span class="help-block">
<strong>{{ $errors->first('department_id') }}</strong>
</span>
@endif
</div>


<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
 <i class="fa fa-btn fa-user"></i> Add
</button>
</div>
</div>
</div>
</div>
</div>
@endsection