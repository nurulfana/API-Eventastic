<?php
include_once 'db.php';

try{

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if (isset($_POST['login'])) {

	if(empty($_POST["adminemail"]) || empty($_POST["adminpassword"])){
		$e = '<label>Fill All</label>';
	}else{
		$stmt = $conn->prepare("SELECT * FROM loginregister_admin WHERE email = :adminemail AND password = :adminpassword");

		$stmt->bindParam(':adminemail', $adminemail, PDO::PARAM_STR);
		$stmt->bindParam(':adminpassword', $adminpassword, PDO::PARAM_STR);
		$adminemail = $_POST['adminemail'];
		$adminpassword = $_POST['adminpassword'];
		$stmt->execute();
		$count = $stmt->rowCount();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($count > 0){
			session_start();
			 $_SESSION["login"]=true;
			 $_SESSION["adminname"]=$result['fullname'];
			header("location:index.php");

		}else{
			
			echo "<script>
			alert('wrong email or password');
			window.location.href='login.php';
			</script>";
		}
	}
}
}
	catch(PDOException $e)
	{
	echo "Error: " . $e->getMessage();
	}


?>

 