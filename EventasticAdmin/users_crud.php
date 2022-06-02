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
 
    $stmt = $conn->prepare("INSERT INTO loginregister_user(fullname, username, password, email) VALUES(:uname, :username, :upass, :uemail,)");
   
    // $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
    $stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':upass', $upass, PDO::PARAM_STR);
    $stmt->bindParam(':uemail', $uemail, PDO::PARAM_STR);
    
       
    // $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $username =  $_POST['username'];
    $upass = $_POST['upass'];
    $uemail = $_POST['uemail'];
    
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
 
    $stmt = $conn->prepare("UPDATE loginregister_user SET fullname = :uname, username = :username, password = :upass, email = :uemail
      WHERE id = :olduid");
   
    // $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
    $stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':upass', $upass, PDO::PARAM_STR);
    $stmt->bindParam(':uemail', $uemail, PDO::PARAM_STR);
    $stmt->bindParam(':olduid', $olduid, PDO::PARAM_STR);
       
    // $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $username =  $_POST['username'];
    $upass = $_POST['upass'];
    $uemail = $_POST['uemail'];
    $olduid = $_POST['olduid'];
       
    $stmt->execute();
 
    header("Location: user.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM loginregister_user WHERE id = :uid");
   
    $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
       
    $uid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: user.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM loginregister_user WHERE id = :uid");
   
    $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
       
    $uid = $_GET['edit'];
     
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