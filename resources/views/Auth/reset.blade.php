<!doctype html>
<html lang="en">
  <head>
  	<title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="/assets/css/auth.css">

	</head>
	<body >
	<section class="ftco-section">
		<div class="container">

			
			
			<div class="row justify-content-center">

				
				<div class="col-md-7 col-lg-5">

					@if(session('message'))
						<div class="alert alert-danger">
							{{ session('message') }}
						</div>
					@endif


					<div class="wrap">
						<div class="img" style="background-image: url(https://turbologo.com/articles/wp-content/uploads/2019/07/Three-Bars-adidas-logo-1.jpg.webp);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">récupération:</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
				<form action="" method="post" class="signin-form">
					@csrf
			      		<div class="form-group mt-3">
			      			<input type="password" class="form-control" name="pass" required>
			      			<label class="form-control-placeholder"  for="username">new password</label>
			      		</div>
			      		<div class="form-group mt-3">
			      			<input type="password" class="form-control" name="c_pass" required>
			      			<label class="form-control-placeholder"  for="username">comfirm password</label>
			      		</div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Recupirer le mot de pass</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	
		          </form>
		        </div>
				<p class="text-center">Not a member? <a data-toggle="tab" href="/register">Sign Up</a></p>
				<p class="text-center">member? <a data-toggle="tab" href="/login">Sign In</a></p>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

