<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="assets/CSS/bootstrap.min.css" rel="stylesheet">
<title>Sign In</title>
</head>
<body>
	<br>
	<section class="container">
		<div class="jumbotron text-center">
			<h1>Welcome to Test Login!</h1>
		</div>
		<section class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<form class="form-group" action="LoginServlet" method="POST">
					<label for="username" class="mr-sm-2">Username:</label> 
					<input type="text" class="form-control mb-2 mr-sm-2" id="username" placeholder="Enter Username" name="username">
	
					<label for="pwd" class="mr-sm-2">Password:</label> 
					<input type="password" class="form-control mb-2 mr-sm-2" id="pwd" placeholder="Enter Password" name="password">
					<div class="form-check mb-2 mr-sm-2">
						<label class="form-check-label"> 
							<input class="form-check-input" type="checkbox">Remember Me
						</label>
					</div>
					<button type="submit" class="btn btn-primary mb-2">Submit</button>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</section>
	</section>

	<script type="text/javascript" src="assets/JS/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="assets/JS/bootstrap.min.js"></script>
	<script type="text/javascript">
		if("${userError}"!==""){
			$("#username").after('<div class="alert alert-danger"><strong>${userError}</strong></div>');
		}
		if("${passError}"!==""){
			$("#pwd").after('<div class="alert alert-danger"><strong>${passError}</strong></div>');
		}
	</script>
</body>
</html>