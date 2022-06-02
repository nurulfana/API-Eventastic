<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Eventastic : Admin Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    html{
      background-color: wheat;
    }

    body{
      background-color:white;
      font-family: Rockwell, Georgia, serif;
        max-width: 1000px;
      width:90%;
      margin: 0 auto;
      box-shadow: 4px 4px 8px rgba(0,0,0.15)
    }
    h1{
      background-color: tomato;
      color: white;
      text-align: center;
      padding:6px;
    }
    .column{
      width:50%;
      float:left;
      padding:2%;
      box-sizing:border-box;
    }
    .column{
      padding:3%;
    }
    /*clear-fix the parent of column because it collapsed!  */
    form:after{
      content:'';
      display:block;
      clear:both;
    }

    /* FORM STUFF BEGINS HERE */
    form{
      font-size:110%
    }
    label{
      display:block;
      color:saddlebrown;
      margin:16px 0 3px;
    }
    fieldset label{
      display:inline-block;
      font-size:85%;
      font-family: Calibri, sans-serif;
    }


    input[type=text],
    input[type=email],
    input[type=tel],
    textarea,
    select{
      width:100%;
      padding:5px;
      box-sizing:border-box;
      background-color:cornsilk;
      border: solid 1px tan;
      font-family:'Lucida Console', monospace;
    }
    textarea{
      resize: vertical;
      min-height: 70px;
    }
    fieldset{
      border:none;
      margin:20px 0 ;
      padding:10px 0;
      border-bottom: 1px solid tan;
    }
    legend{
      color:white;
      background-color:tan;
      display:block;
      width:100%;
      padding:3px;
    }
    input[type=checkbox]{
      background-color:red;
      border: solid 1px red;
      color:red;
      outline:red;
    }
    /* BUTTONS */
    input[type=submit]{
      background-color:forestgreen;
      color:white;
      border:none;
      padding: 6px 20px;
      font-size:110%;
      border-radius:10px;
      font-family: Rockwell, georgia, serif;
    }
    /* Reset Button: minimize the appearance */
    input[type=reset]{
      background-color:transparent;
      border:none;
      text-decoration:underline;
      cursor:pointer;
      margin:20px 0;
      color:olive;
    }

    /* hovers and tabs */
    input[type=text]:hover,
    input[type=email]:hover{
      background-color:khaki;
    }
    input[type=text]:focus,
    input[type=email]:focus{
      outline: 2px solid tan;
    }
    input[type=sumbit]:hover,
    input[type=submit]:focus{
      background-color:limegreen;
    }
    /* responsive bonus round */
    @media screen and (min-width:450px){
    /*  2col  */
      .column{
        width:50%;
        float:left;
        padding:3%;
        box-sizing:border-box;
      }
    }
    </style>
</head>
<?php
        if(isset($_POST['signup'])){
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $place_area = $_POST['place_area'];
            $venue_name = $_POST['venue_name'];
            $venue_book_status = $_POST['venue_book_status'];
            $venue_ratings = $_POST['venue_ratings'];
            $venue_latitude = $_POST['venue_latitude'];
            $venue_longitude = $_POST['venue_longitude'];
    
            $message = "$fullname would like to request an account.";
            $query = "INSERT INTO `requests` (`id`, `fullname`, `email`, `place_area`, `venue_name`, `venue_book_status`, `venue_ratings`,`venue_latitude`,`venue_longitude`, `message`, `date`) VALUES (NULL, '$fullname', '$email', '$place_area', '$venue_name', '$venue_book_status', '$venue_ratings','$venue_latitude','$venue_longitude', '$message', CURRENT_TIMESTAMP)";
            if(performQuery($query)){
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }
        }
    
    ?>
<body>
<main>
    <form method="post" class="form-signin">
  <h1>Register Your Venue Here</h1>
              
  <div class="column">
     <label for="inputFName">Full Name</label>
      <input name="fullname" type="text" id="inputFName" class="form-control" placeholder="Full Name" required autofocus>
    
    <label for="inputEmail">Email</label>
      <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>

    <label for="inputPlace">Place Area</label>
      <input name="place_area" type="text" id="inputPlace" class="form-control" placeholder="Place Area" required autofocus>

    <label for="inputVName">Venue Name</label>
      <input name="venue_name" type="text" id="inputVName" class="form-control" placeholder="Venue Name" required>

    <label for="inputVStatus">Booking Status</label>
      <input name="venue_book_status" type="text" id="inputVStatus" class="form-control" placeholder="Booking Status" required>
    
  </div>
   
  <div class="column">
    <label for="inputVRatings">Ratings</label>
      <input name="venue_ratings" type="text" id="inputVRatings" class="form-control" placeholder="Ratings" required>

    <label for="inputVLatitude">Latitude</label>
    <input name="venue_latitude" type="text" id="inputVLatitude" class="form-control" placeholder="Latitude" required autofocus>

    <label for="inputVLongitude">Longitude</label>
    <input name="venue_longitude" type="text" id="inputVLongitude" class="form-control" placeholder="Longitude" required autofocus>

    <br><br>

    <label for="venueimage" class="col-sm-3 control-label">Image</label>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
      </form>
    <br><br>

  
    <button name="signup" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      <a href="login.php" class="mt-5 mb-3 text-muted">Go back to login page</a>
    <input type="reset" value="Start Over" />
  </div>
  
</form>
  </main>