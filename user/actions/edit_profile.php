<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['user_id']) && ($_POST['user_id'] == $_SESSION['user']['id'])){
	$user_name = $_POST['user_name'];
	$user_id = $_POST['user_id'];
	$user_first_name = $_POST['user_first_name'];
	$user_last_name = $_POST['user_last_name'];
	$user_description = $_POST['user_description'];
	$user_occupation = $_POST['user_occupation'];
	$user_born_date = $_POST['user_born_date'];
	$user_phone = $_POST['user_phone'];
	$user_email = $_POST['user_email'];
	$user_country = $_POST['user_country'];
	$user_county = $_POST['user_county'];
	$user_city = $_POST['user_city'];
	
	
	$sqluu = "UPDATE qz_users SET user_first_name=?, user_last_name=?, user_description=?, user_occupation=?, user_born_date=?, user_phone=?, user_email=?, user_country=?,
			user_county=?, user_city=? WHERE user_id=?";
	$sqluue=$db->prepare($sqluu);
    $sqluue->execute(array($user_first_name, $user_last_name, $user_description, $user_occupation, strtotime($user_born_date), $user_phone, $user_email, $user_country,
							$user_county, $user_city, $user_id));
	
	die("edit: success");
}
?>
