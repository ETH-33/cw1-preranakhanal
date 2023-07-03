<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>INFO</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/treknepal/css/mbr-additional.css"><link rel="stylesheet" href="assets/treknepal/css/mbr-additional.css" type="text/css">

  
  
  
</head>
<body>

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
  $conn = new mysqli($servername, $username, $password, $dbname , 3308);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }





	
  ?>


<?php




    // Check if id exists and is a valid integer
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']); // Sanitize the input

        // Prepare the SQL statement using a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM trip WHERE id = ?");
        $stmt->bind_param("i", $id);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Use the data in $result
    } else {
        // Handle the case where no id or an invalid id is provided
        echo "Invalid ID provided.";
    }
?>
  
  <section data-bs-version="5.1" class="menu menu3 cid-tItMwWYwot" once="menu" id="menu3-n">
    
  <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                
                <span class="navbar-caption-wrap"><img src="assets/images/logo.png" style="height:3rem;"><strong><span style= "padding-top:1rem;padding-left:0.3rem;"><b>Trek Nepal</b></span></strong></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php#home">Home</a></li>
                <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php#about-us">
                            About</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php#trek">Tour</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php#contact">Contacts</a>
                    </li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="https://www.facebook.com" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://www.youtube.com" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-youtube socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://www.instagram.com" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-instagram socicon"></span>
                    </a>
                    
                </div>
                
            </div>
        </div>
    </nav>
</section>



<section data-bs-version="5.1" class="features16 cid-tJSrMJWITD" id="features17-t">
    

    
    
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <div class="image-wrapper">
                        <?php
                        
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $currentTripId = $row["id"];
                            echo '<img src="assets/images/' . $row["image"] . '" alt="" style="min-height: 65vh;">';
                            echo '</div>';
                            echo '</div>';echo'<div class="col-12 col-lg">';echo'<div class="text-wrapper">';
                        
                                echo '<h6 class="card-title mbr-fonts-style display-5"><strong>' . $row["name"] . '</strong></h6>';
                                echo '<div class="mbr-section-btn mt-3"><a class="btn btn-primary display-4" id="bookNowBtn">Book Now</a></div>';
                                echo '<p class="mbr-text mbr-fonts-style mb-4 display-4">
                                    <br><br>
                                    Trip Duration: ' . $row["duration"] . '<br>
                                    Trip Grade: ' . $row["grade"] . '<br>
                                    Max Altitude: ' . $row["maxaltitude"] . '<br>
                                    Best Time: ' . $row["besttime"] . '<br>
                                    Accomodation: ' . $row["accomodation"] . '<br>
                                    Transportation: ' . $row["transportation"] . '<br>
                                    Starting Point: ' . $row["startingpoint"] . '<br>
                                    Ending Point: ' . $row["endingpoint"] . '</p>';
                            
                        


                        



                        
                        
                  echo'  </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="tabs content18 cid-tJSrhQA2lj" id="tabs1-q">

    

    
    
    <div class="container">
        
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-8">
                <ul class="nav nav-tabs mb-4" role="tablist">
                    <li class="nav-item first mbr-fonts-style">
                        <a class="nav-link mbr-fonts-style show active display-7" role="tab" data-toggle="tab" data-bs-toggle="tab" href="#tab1" aria-selected="true">
                            <strong>Trip Overview</strong>
                        </a>
                    </li>
                    
                    
                    
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane in active" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text mbr-fonts-style display-7">'
                                  . $row["details"] .
                               '</p>
                            </div>
                        </div>
                    </div>';
                } 
                } else {
                    echo "No trek data found.";
                }    
                $conn->close();
?>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer7 cid-tJRX8AKId1" once="footers" id="footer7-i">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    © Copyright 2023 Trek Nepal. All right reserved.</p>
            </div>
        </div>
    </div>
</section>

<script>
    // Get the book now button by its ID
    var bookNowBtn = document.getElementById('bookNowBtn');
    <?php $_SESSION['tripid'] = $currentTripId; ?>
    bookNowBtn.onclick = function() {
        // Check if the user is logged in (i.e., PHP session variable is set)
        <?php if(isset($_SESSION['userid'])): ?>

            // If the user is logged in, redirect to the booking page
            window.location.href = "authentication/booking.php";
        <?php else: ?>
            // If the user is not logged in, redirect to the login page
            window.location.href = "authentication/login.php";
        <?php endif; ?>
    }
</script>



</body>
</html>