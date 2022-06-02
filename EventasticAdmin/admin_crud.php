
<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO loginregister_admin(name, phone_num, email, password) VALUES(:aname, :aphone, ,:aemail, :apass)");
   
    // $stmt->bindParam(':aid', $aid, PDO::PARAM_STR);
    $stmt->bindParam(':aname', $aname, PDO::PARAM_STR);
    $stmt->bindParam(':aphone', $aphone, PDO::PARAM_STR);
    $stmt->bindParam(':aemail', $aemail, PDO::PARAM_STR);
    $stmt->bindParam(':apass', $apass, PDO::PARAM_STR);
       
    // $aid = $_POST['aid'];
    $aname = $_POST['aname'];
    $aphone = $_POST['aphone'];
    $aemail = $_POST['aemail'];
    $apass = $_POST['apass'];
       
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
    $stmt = $conn->prepare("UPDATE loginregister_admin SET name = :aname, phone_num = :aphone, email = :aemail, password = :apass");
   
    // $stmt->bindParam(':aid', $aid, PDO::PARAM_STR);
    $stmt->bindParam(':aname', $aname, PDO::PARAM_STR);
    $stmt->bindParam(':aphone', $aphone, PDO::PARAM_STR);
    $stmt->bindParam(':aemail', $aemail, PDO::PARAM_STR);
    $stmt->bindParam(':apass', $apass, PDO::PARAM_STR);
    // $stmt->bindParam(':oldaid', $oldaid, PDO::PARAM_STR);
       
    // $aid = $_POST['aid'];
    $aname = $_POST['aname'];
    $aphone =  $_POST['aphone'];
    $aemail = $_POST['aemail'];
    $apass = $_POST['apass'];
    // $oldaid = $_POST['oldaid'];
       
    $stmt->execute();
 
    header("Location: admin.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM loginregister_admin WHERE admin_id = :aid");
   
    $stmt->bindParam(':aid', $aid, PDO::PARAM_STR);
       
    $aid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: admin.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM loginregister_admin WHERE admin_id = :aid");
   
    $stmt->bindParam(':aid', $aid, PDO::PARAM_STR);
       
    $aid = $_GET['edit'];
     
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