<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">



	<?php
// Start the session at the beginning of the file
session_start();
?>

	<?php


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "treknepal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3308);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Fetch hashed password from the database
  $sql = "SELECT id, password FROM user WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($id , $hashed_password);
  $stmt->fetch();

  // Verify the password
  // Verify the password
  if (password_verify($password, $hashed_password)) {
	$_SESSION['userid'] = $id;
    header("Location: booking.php"); // Redirect user to register.php
    exit();
  } else {
	echo '<script>alert("Invalid email or password");</script>';
  }

  // Close the prepared statement and the connection
  $stmt->close();
  $conn->close();
}
?>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center">
					<h2 class="heading-section">Trek Nepal</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Email" required name="email">
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" required name="password">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
				<h6 class="mb-4 text-center"><a href = "register.php">Don't Have a Account? Sign Up</a></h6>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>

	            </div>
	          </form>
	          
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

