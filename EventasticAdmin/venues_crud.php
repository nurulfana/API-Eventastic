<!--
Matric Number: A175171
Name: Nurul Farhanah binti Sallehuddin
-->
<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO venue_list(id, fullname, email, place_area, venue_name, venue_book_status, venue_ratings, venue_latitude, venue_longitude, venue_search) VALUES(:id, :fullname, :email, :place_area, :venue_name, :venue_book_status, :venue_ratings, :venue_latitude, :venue_longitude)");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':place_area', $place_area, PDO::PARAM_STR);
    $stmt->bindParam(':venue_name', $venue_name, PDO::PARAM_STR);
    $stmt->bindParam(':venue_book_status', $venue_book_status, PDO::PARAM_STR);
    $stmt->bindParam(':venue_ratings', $venue_ratings, PDO::PARAM_STR);
    $stmt->bindParam(':venue_latitude', $venue_latitude, PDO::PARAM_STR);
    $stmt->bindParam(':venue_longitude', $venue_longitude, PDO::PARAM_STR);
    
       
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $place_area = $_POST['place_area'];
    $venue_name = $_POST['venue_name'];
    $venue_book_status = $_POST['venue_book_status'];
    $venue_ratings = $_POST['venue_ratings'];
    $venue_latitude = $_POST['venue_latitude'];
    $venue_longitude =  $_POST['venue_longitude'];
    
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE venue_list SET id = :id, fullname = :fullname, email = :email, place_area = :place_area, venue_name = :venue_name, venue_book_status = :venue_book_status, venue_ratings = :venue_ratings, venue_latitude = :venue_latitude, venue_longitude = :venue_longitude
      WHERE id = :oldid");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':place_area', $place_area, PDO::PARAM_STR);
    $stmt->bindParam(':venue_name', $venue_name, PDO::PARAM_STR);
    $stmt->bindParam(':venue_book_status', $venue_book_status, PDO::PARAM_STR);
    $stmt->bindParam(':venue_ratings', $venue_ratings, PDO::PARAM_STR);
    $stmt->bindParam(':venue_latitude', $venue_latitude, PDO::PARAM_STR);
    $stmt->bindParam(':venue_longitude', $venue_longitude, PDO::PARAM_STR);
    $stmt->bindParam(':oldid', $oldid, PDO::PARAM_STR);
       
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $place_area = $_POST['place_area'];
    $venue_name = $_POST['venue_name'];
    $venue_book_status = $_POST['venue_book_status'];
    $venue_ratings = $_POST['venue_ratings'];
    $venue_latitude = $_POST['venue_latitude'];
    $venue_longitude =  $_POST['venue_longitude'];
    $oldid = $_POST['oldid'];
       
    $stmt->execute();
 
    header("Location: venuetable.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM venue_list WHERE id = :id");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
       
    $id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: venuetable.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM venue_list WHERE id = :id");
   
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
       
    $id = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
 
?>