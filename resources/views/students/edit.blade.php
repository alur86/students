@extends('layouts.app')

@section('content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Edit Student</div>
<div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="{{ url('/update') }}">
<input id="student_id" type="hidden" class="form-control" name="student_id" value="{{ $student->id}}">
{{ csrf_field() }}
<div class="col-md-6">
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<label for="name" class="col-md-4 control-label">Name</label>
<div class="col-md-6">
<input id="name" type="text" class="form-control" name="name" value="{{$student->name }}">
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
<div class="col-md-6">
<div class="form-group{{ $errors->has('surname') ? 'has-error' : '' }}">
<label for="surname" class="col-md-4 control-label">Surname</label>
<div class="col-md-6">
<input id="surname" type="text" class="form-control" name="surname" value="{{$student->surname }}">
@if ($errors->has('surname'))
<span class="help-block">
<strong>{{ $errors->first('surname') }}</strong>
</span>
@endif
</div>
<div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
<label for="birthdate" class="col-md-4 control-label">Birthday</label>
<div class="col-md-6">
<input id="birthdate" type="text" class="form-control" name="birthdate" value="{{$student->birthdate}}">
@if ($errors->has('birthdate'))
<span class="help-block">
<strong>{{ $errors->first('birthdate') }}</strong>
</span>
@endif
</div>
<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
<label for="group_id" class="col-md-4 control-label">Groups</label>
<div class="col-md-6">
<select  name="group_id">
<option selected disabled>Please select one option</option>
@foreach($groups as $grp)
<option value="{{ $grp->id }}">{{ $grp->group_number }}</option>
@endforeach
</select>  
@if ($errors->has('group_id'))
<span class="help-block">
<strong>{{ $errors->first('group_id') }}</strong>
</span>
@endif
</div>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
 <i class="fa fa-btn fa-user"></i> Update
</button>
</div>
</div>
</div>
</div>
</div>
@endsection