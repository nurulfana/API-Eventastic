<?php
require "../db.php";

            $stmt = $conn->prepare("SELECT * FROM venue_list ");

            // $stmt->bindParam(':place_area', $place_area, PDO::PARAM_STR);
            
            // $place_area = $_POST['place_area'];

            $stmt->execute();
            $user=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(isset($user)){

               echo json_encode($user) ;
            }else echo "500";
        
    
?>
