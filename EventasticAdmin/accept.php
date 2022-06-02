<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $fullname = $row['fullname'];
            $email = $row['email'];
            $place_area = $row['place_area'];
            $venue_name = $row['venue_name'];
            $venue_book_status = $row['venue_book_status'];
            $venue_ratings = $row['venue_ratings'];
            $venue_latitude = $row['venue_latitude'];
            $venue_longitude = $row['venue_longitude'];
            // $venue_image = $row['venue_image'];

            
            $query = "INSERT INTO `venue_list` (`id`, `fullname`, `email`, `place_area`, `venue_name`, `venue_book_status`, `venue_ratings`, `venue_latitude`, `venue_longitude`) VALUES (NULL, '$fullname', '$email', '$place_area', '$venue_name', '$venue_book_status', '$venue_ratings', '$venue_latitude', '$venue_longitude');";
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "Account has been accepted.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="venuee.php">Back</a>