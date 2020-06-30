<?
session_start();
include("../includes/dbconn.php");

if(!isset($_SESSION['user']['id'])){
	$current_date = time();
	
	$sqliu = "INSERT INTO qz_users (user_id, user_type, user_register_date) VALUES (?, ?, ?)";
	$sqliu=$db->prepare($sqliu);
    $sqliu->execute(array(NULL, 2, $current_date));
	$user_id = $db->lastInsertId();
	
	$_SESSION['user']['id'] = $user_id;
	$_SESSION['user']['register_date'] = $current_date;
	$_SESSION['user']['type'] = 2;
} 
header("Location: http://quizzard.epizy.com/dashboard/");
exit;
?>
