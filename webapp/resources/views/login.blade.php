@extends('common')

@section('content')
<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Admin Login</h3>
		<div class="card-text">
		@if(Session::has('message'))
                    <p class="alert alert-danger text-center">{{ Session::get('message') }}</p>
                    @endif
			<!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
			<form action="{{ route('postadmin') }}"method="post">
				@csrf
				<!-- to error: add class "has-danger" -->
				<div class="form-group">
					<label for="username">UserName</label>
					<input type="text" name="username" class="form-control form-control-sm" >
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control form-control-sm">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Sign in</button>
				
			</form>
		</div>
	</div>
</div>
</div>

@endsection