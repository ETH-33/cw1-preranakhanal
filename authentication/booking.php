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

	  // Get user id from session
	$userid = $_SESSION['userid'];

	// Query to get user details
	$query = "SELECT * FROM user WHERE id = '$userid'";
	$user_result = mysqli_query($conn, $query);

	if(mysqli_num_rows($user_result) > 0){
		$user = mysqli_fetch_assoc($user_result);
		// Now you have the user's details in the $user variable
		$username = $user['username'];
		$email = $user['email'];
	}

	// Get trip id from session
	$tripid = $_SESSION['tripid'];

	// Query to get user details
	$query2 = "SELECT * FROM trip WHERE id = '$tripid'";
	$trip_result = mysqli_query($conn, $query2);

	if(mysqli_num_rows($trip_result) > 0){
		$trip = mysqli_fetch_assoc($trip_result);
		$tripname = $trip['name'];
		$tripduration = $trip['duration'];
	}
	  
	  // Check if form is submitted
	  if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Fetch data from form
		$fullname = $_POST['fullname'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$message = $_POST['message'];
		$trekrequested = $tripname;
		$email = $email;
	  
		// Insert data into the database
		$sql = "INSERT INTO booking (fullname, address, phone, message, trekrequested, email) VALUES (?, ?, ?,?,?,?)";
	  
		// Prepare and bind
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssssss", $fullname, $address, $phone, $message, $trekrequested, $email);
	  
		// Execute the prepared statement
		$stmt->execute();
	  
		// Close the prepared statement and the connection
		$stmt->close();
		$conn->close();

		header("Location: /Prerana");
		exit;
	  }
	  ?>

	
	
	
	
		<section class="ftco-section" style="padding: 3em 0;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center">
					<h2 class="heading-section" style="font size:42px;">Trip Booking Form</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	  <h5 class="mb-4 text-center">Email :  <?php echo $email; ?></h5>
					<h5 class="mb-4 text-center">Trip Name :  <?php echo $tripname; ?></h5>					
					<h5 class="mb-4 text-center">Duration :  <?php echo $tripduration; ?></h5>

		      	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Full Name" required name="fullname">
		      		</div>
	            <div class="form-group">
	              <input type="text" class="form-control" placeholder="Phone" required name="phone">
	              
	            </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Address" required name="address">
                    
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Message" required name="message">
                    
                  </div>
	            <div class="form-group">
	            	<button type="Send" class="form-control btn btn-primary submit px-3">Send</button>
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
window.onload = function() {
    document.querySelector(".signin-form").addEventListener("submit", function(event) {
        var fullname = document.querySelector('input[name="fullname"]').value;
        var phone = document.querySelector('input[name="phone"]').value;
        var address = document.querySelector('input[name="address"]').value;
        var message = document.querySelector('input[name="message"]').value;

        if(fullname == "" || phone == "" || address == "" || message == "") {
            event.preventDefault();
            alert("All fields are required");
            return;
        }

        if(!/^\d+$/.test(phone)) {
            event.preventDefault();
            alert("Phone number must contain only digits");
            return;
        }
    });
}
</script>
	</body>
</html>

