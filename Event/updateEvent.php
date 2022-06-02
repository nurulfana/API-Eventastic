<?php
require "../db.php";

if (isset($_POST['process'])) {

   if ($_POST['process']=='list') {
   $stmt = $conn->prepare("SELECT * FROM update_event WHERE username=:username && event_id=:event_id");

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':event_id', $event_id, PDO::PARAM_STR);
            
            $username = $_POST['username'];
            $event_id = $_POST['event_id'];

            $stmt->execute();
            $user=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(isset($user)){

               echo json_encode($user[0]) ;
            }else echo "500";
        }else if ($_POST['process']=='insert') {


               try {
                  $stmt = $conn->prepare("INSERT update_event SET event_id = :event_id, username = :username, event_name = :event_name, event_date = :event_date, event_time = :event_time, event_budget = :event_budget ON DUPLICATE KEY UPDATE event_name = :event_name, event_date = :event_date, event_time = :event_time, event_budget = :event_budget");

                  $stmt->bindParam(':event_id', $event_id, PDO::PARAM_STR);
                  $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                  $stmt->bindParam(':event_name', $event_name, PDO::PARAM_STR);
                  $stmt->bindParam(':event_date', $event_date, PDO::PARAM_STR);
                  $stmt->bindParam(':event_time', $event_time, PDO::PARAM_STR);
                  $stmt->bindParam(':event_budget', $event_budget, PDO::PARAM_STR);

                  $event_id = $_POST['event_id'];
                  $username = $_POST['username'];
                  $event_name = $_POST['event_name'];
                  $event_date = $_POST['event_date'];
                  $event_time = $_POST['event_time'];
                  $event_budget = $_POST['event_budget'];

                  $stmt->execute();
               }
               catch(PDOException $e){
                  echo "500";
               }
            



        }

}

?>