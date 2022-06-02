<?php
require "../db.php";

if (isset($_POST['process'])) {
    $process=$_POST['process'];

    if ($process=='list') {
       $type=$_POST['type'];
        $stmt = null;
        if($type == 'all'){
            $stmt = $conn->prepare("SELECT * FROM ads_user WHERE username=:username AND event_id=:event_id");
}else{

    $stmt = $conn->prepare("SELECT * FROM ads_user WHERE username=:username AND event_id=:event_id AND  status='$type'");

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

        $stmt = $conn->prepare("INSERT INTO ads_user(username,name,category,notes,status,event_id) VALUES(:username,:name,:category,:notes,:status,:event_id)");

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':event_id', $event_id, PDO::PARAM_STR);
            
            $username = $_POST['username'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $notes = $_POST['notes'];
            $status = $_POST['status'];
            $event_id = $_POST['event_id'];
            
            $stmt->execute();
            echo "200";
            
            
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }else if ($process=='update') {
        try{



        $stmt = $conn->prepare("UPDATE ads_user SET name=:name,category=:category,notes=:notes,status=:status");

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
                        
            $name = $_POST['name'];
            $category = $_POST['category'];
            $notes = $_POST['notes'];
            $status = $_POST['status'];
                        
            $stmt->execute();
            echo "200";
            
            
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }else if ($process=='delete') {
        try{

        $stmt = $conn->prepare("DELETE FROM ads_user WHERE ads_id  = :ads_id ");

            $stmt->bindParam(':ads_id', $ads_id, PDO::PARAM_STR);

            $ads_id = $_POST['ads_id'];
            
            $stmt->execute();
            echo "200";
            
            
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }


}

?>
