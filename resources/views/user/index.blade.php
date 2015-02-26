@extends('layout')

@section('title')
User List
@stop

@section('content')
<div class="padded-content">
	<h3>We have {{ $users->count() }} registered users!</h3>
	@include('user/multipleCardPartial', [ 'users' => $users ])
	
</div>
@stop
