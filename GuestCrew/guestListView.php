<?php
require "../db.php";

if (isset($_POST['process'])) {
    $process=$_POST['process'];

    if ($process=='list') {
       $type=$_POST['type'];
        $stmt = null;
        if($type == 'all'){
            $stmt = $conn->prepare("SELECT * FROM guest_user WHERE username=:username AND event_id=:event_id");
}else{

    $stmt = $conn->prepare("SELECT * FROM guest_user WHERE username=:username AND event_id=:event_id AND progress='$type'");

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

        $stmt = $conn->prepare("INSERT INTO guest_user(username,name,gender,category,quantity,progress,phone,email,notes,event_id) VALUES(:username,:name,:gender,:category,:quantity,:progress,:phone,:email,:notes,:event_id)");

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_STR);
            $stmt->bindParam(':progress', $progress, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
            $stmt->bindParam(':event_id', $event_id, PDO::PARAM_STR);
            
            $username = $_POST['username'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $category = $_POST['category'];
            $quantity = $_POST['quantity'];
            $progress = $_POST['progress'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $notes = $_POST['notes'];
            $event_id = $_POST['event_id'];
            
            $stmt->execute();
            echo "200";
            
            
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }else if ($process=='update') {
        try{



        $stmt = $conn->prepare("UPDATE guest_user SET name=:name,gender=:gender,category=:category,quantity=:quantity,progress=:progress,phone=:phone,email=:email, notes=:notes WHERE guest_id=:guest_id");

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_STR);
            $stmt->bindParam(':progress', $progress, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
            $stmt->bindParam(':guest_id', $guest_id, PDO::PARAM_STR);
            
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $category = $_POST['category'];
            $quantity = $_POST['quantity'];
            $progress = $_POST['progress'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $notes = $_POST['notes'];
            $guest_id = $_POST['guest_id'];
            
            $stmt->execute();
            echo "200";
            
            
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }else if ($process=='delete') {
        try{

        $stmt = $conn->prepare("DELETE FROM guest_user WHERE guest_id  = :guest_id ");

            $stmt->bindParam(':guest_id', $guest_id, PDO::PARAM_STR);

            $guest_id = $_POST['guest_id'];
            
            $stmt->execute();
            echo "200";
            
            
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }



}

?>

