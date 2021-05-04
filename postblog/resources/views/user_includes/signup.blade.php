
<!-- include header and footer  -->
@extends('user_includes.user')

<!--include body -->
@section('content')

<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-info">SignUp !</h3>
					@if ($message = Session::get('success'))

					<div class="alert alert-success alert-block">

						<button type="button" class="close" data-dismiss="alert">×</button>

						<strong>{{ $message }}</strong>

					</div>

					@endif
				</div>
				<div class="panel-body">
					<form role="form" action="/insert" method="post">

						@csrf
						<div class="row">
							<div class=" col-md-12">
								<div class="form-group">
									<input type="text" name="name" class="form-control input-sm"
										placeholder="Enter Your Name">
								</div>
								@error('name')

								<div class="alert alert-danger">{{$message}}</div>

								@enderror
							</div>

						</div>
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