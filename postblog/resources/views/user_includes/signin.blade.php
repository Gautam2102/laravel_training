<style>
	body {
		background-color: #525252;
	}
	.centered-form {
		margin-top: 60px;
	}

	.centered-form .panel {
		background: rgba(255, 255, 255, 0.8);
		box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
	}
</style>

@extends('user_includes.user')

<!--include body -->
@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-info">SignIn !</h3>
				</div>
				<div class="panel-body">
					@if ($message = Session::get('error'))
					<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{ $message }}</strong>
					</div>
					@endif
					<form role="form" action="/login" method="post">

						@csrf

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="email" class="form-control input-sm"
										placeholder="Enter Your Email">
								</div>
								@error('email')
								<div class="alert alert-danger">{{$message}}</div>
								@enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" name="password" class="form-control input-sm"
										placeholder="Enter Your Password">
								</div>
								@error('password')

								<div class="alert alert-danger">{{$message}}</div>

								@enderror
							</div>
						</div>
						<button type="submit" name="submit" class=" btn btn-info btn-block">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
   
@endsection