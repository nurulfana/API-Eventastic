<?php
require "../db.php";

$username = $_POST['username'];
$event_id = $_POST['event_id'];
$totalspent = 0;
$total = 0;
//booking----------------------------------------------------------------------
$result_booking_paid = $conn->prepare( "SELECT COUNT(*) FROM booking_user WHERE username = '$username' AND event_id=$event_id AND payment_status='Paid'");
$result_booking_paid->execute();
$num_rows_booking_paid = $result_booking_paid->fetchColumn();
           


$result_booking_notpaid = $conn->prepare( "SELECT COUNT(*) FROM booking_user WHERE username = '$username' AND event_id=$event_id AND payment_status='Not Paid Yet'");
$result_booking_notpaid->execute();
$num_rows_booking_notpaid = $result_booking_notpaid->fetchColumn();





//Guest----------------------------------------------------------------------
$result_guest_pending = $conn->prepare( "SELECT COUNT(*) FROM guest_user WHERE username = '$username' AND event_id=$event_id AND progress='Yes'");
$result_guest_pending->execute();
$num_rows_guest_pending = $result_guest_pending->fetchColumn();
           

$result_guest_sent = $conn->prepare( "SELECT COUNT(*) FROM guest_user WHERE username = '$username' AND event_id=$event_id AND progress='No'");
$result_guest_sent->execute();
$num_rows_guest_sent = $result_guest_sent->fetchColumn();




//Crew----------------------------------------------------------------------
$result_crew_pending = $conn->prepare( "SELECT COUNT(*) FROM crew_user WHERE username = '$username' AND event_id=$event_id AND progress='Yes'");
$result_crew_pending->execute();
$num_rows_crew_pending = $result_crew_pending->fetchColumn();

$result_crew_sent = $conn->prepare( "SELECT COUNT(*) FROM crew_user WHERE username = '$username' AND event_id=$event_id AND progress='No'");
$result_crew_sent->execute();
$num_rows_crew_sent = $result_crew_sent->fetchColumn();






//Advertisement----------------------------------------------------------------------
$result_ads_unconfirmed = $conn->prepare( "SELECT COUNT(*) FROM ads_user WHERE username = '$username' AND event_id=$event_id AND status='Not Finished'");
$result_ads_unconfirmed->execute();
$num_rows_ads_unconfirmed = $result_ads_unconfirmed->fetchColumn();



$result_ads_confirmed = $conn->prepare( "SELECT COUNT(*) FROM ads_user WHERE username = '$username' AND event_id=$event_id AND status='Finished'");
$result_ads_confirmed->execute();
$num_rows_ads_confirmed = $result_ads_confirmed->fetchColumn();


// $am = var_dump($result_booking_paid,$result_booking_notpaid,$result_guest_pending,$result_guest_sent,$result_crew_pending,$result_crew_sent,$result_ads_unconfirmed,$result_ads_confirmed);

//Budget
$result_budget = $conn->prepare( "SELECT event_budget FROM update_event WHERE username = '$username' AND event_id=$event_id");
$result_budget->execute();
$budget=$result_budget->fetch(PDO::FETCH_ASSOC);
$encode_budget = json_encode($budget);

$result_booking_budget = $conn->prepare( "SELECT payment FROM booking_user WHERE username = '$username' AND event_id=$event_id AND payment_status='Paid'");
$result_booking_budget->execute();
$booking_paid=$result_booking_budget->fetchAll(PDO::FETCH_ASSOC);


echo $num_rows_booking_paid.',';
echo $num_rows_booking_notpaid.',';
echo $num_rows_guest_pending.',';
echo $num_rows_guest_sent.',';
echo $num_rows_crew_pending.',';
echo $num_rows_crew_sent.',';
echo $num_rows_ads_unconfirmed.',';
echo $num_rows_ads_confirmed.',';


$total = json_decode($encode_budget)->event_budget ;
foreach ($booking_paid as $key) {
	
	$totalspent = $totalspent + $key["payment"];
	$total = $total - $key["payment"];

}
echo $totalspent.',';
echo $total;

// echo json_decode($encode_budget)->event_budget;
// echo json_encode($booking_paid);


?>
