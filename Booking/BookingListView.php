<?php
require "../db.php";

if (isset($_POST['process'])) {
    $process=$_POST['process'];

    if ($process=='list') {
        $type=$_POST['type'];
        $stmt = null;
        if($type == 'all'){
       
            $stmt = $conn->prepare("SELECT * FROM booking_user WHERE username=:username AND event_id=:event_id");
}else{

    $stmt = $conn->prepare("SELECT * FROM booking_user WHERE username=:username AND event_id=:event_id AND payment_status='$type'");

}
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':event_id', $event_id, PDO::PARAM_STR);
            
            $username = $_POST['username'];
            $event_id = $_POST['event_id'];

            $stmt->execute();
            $user=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(isset($user)){

               echo json_encode($user) ;
            }else echo "500";
        
    } 
    else if ($process=='insert') {
        try{

        $stmt = $conn->prepare("INSERT INTO booking_user(username,name,category,notes,payment,payment_status,phone,email,event_id) VALUES(:username,:name,:category,:notes,:payment,:payment_status,:phone,:email,:event_id)");

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
            $stmt->bindParam(':payment', $payment, PDO::PARAM_STR);
            $stmt->bindParam(':payment_status', $payment_status, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':event_id', $event_id, PDO::PARAM_STR);
            
            $username = $_POST['username'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $notes = $_POST['notes'];
            $payment = $_POST['payment'];
            $payment_status = $_POST['payment_status'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $event_id = $_POST['event_id'];
            
            $stmt->execute();
            echo "200";
            
            
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }else if ($process=='update') {
        try{



        $stmt = $conn->prepare("UPDATE booking_user SET name=:name,category=:category,notes=:notes,payment=:payment,payment_status=:payment_status,phone=:phone,email=:email WHERE booking_id=:booking_id");

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
            $stmt->bindParam(':payment', $payment, PDO::PARAM_STR);
            $stmt->bindParam(':payment_status', $payment_status, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_STR);
            
            $name = $_POST['name'];
            $category = $_POST['category'];
            $notes = $_POST['notes'];
            $payment = $_POST['payment'];
            $payment_status = $_POST['payment_status'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $booking_id = $_POST['booking_id'];
            
            $stmt->execute();
            echo "200";
            
            
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }else if ($process=='delete') {
        try{

        $stmt = $conn->prepare("DELETE FROM booking_user WHERE booking_id  = :booking_id ");

            $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_STR);

            $booking_id = $_POST['booking_id'];
            
            $stmt->execute();
            echo "200";
            
            
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }



}

?>