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
  // Fetch data from form
  $user = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['password'];

  // Hash the password
  $hash = password_hash($pass, PASSWORD_DEFAULT);

  // Insert data into the database
  $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $user, $email, $hash);

  // Execute the prepared statement
  $stmt->execute();

  // Save the ID of the inserted row in the session
  $_SESSION['userid'] = $conn->insert_id;

  // Close the prepared statement and the connection
  $stmt->close();
  $conn->close();

  // Redirect to booking.php
  header('Location: booking.php');
  exit;
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
		      	<h3 class="mb-4 text-center">New account?</h3>
		      	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" required name="username">
		      		</div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" required name="email">
                    </div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" required name="password">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
                <div class="form-group">
                    <input id="password-field2" type="password" class="form-control" placeholder="Confirm Password" required >
                    <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
				  <h6 class="mb-4 text-center"><a href = "login.php">Already a User? Sign in</a></h6>
	            
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
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
  <script>
document.querySelector('.signin-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission
  
  var username = document.querySelector('input[name="username"]').value;
  var email = document.querySelector('input[name="email"]').value;
  var password = document.querySelector('input[name="password"]').value;
  var confirmPassword = document.querySelector('#password-field2').value;
  
  if (!username.trim()) {
    alert('Username is required');
    return;
  }

  // Simple email validation regex
  if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
    alert('Invalid email address');
    return;
  }

  // Password should have 1 lowercase letter, 1 uppercase letter, 1 number, and be at least 8 characters long
  if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(password)) {
    alert('Password should have 1 lowercase letter, 1 uppercase letter, 1 number, and be at least 8 characters long');
    return;
  }

  // Check if password and confirmPassword match
  if (password !== confirmPassword) {
    alert('Passwords do not match');
    return;
  }

  // If all validations passed, manually submit the form
  event.target.submit();
});
</script>
	</body>
</html>

