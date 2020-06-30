<?
session_start();
include("../../includes/dbconn.php");
include("../../includes/user_functions.php");
$current_date = time();

define("HASH_COST_FACTOR", "10");

if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password'])){
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	
	//check if username or email is already registered
	if(getUserIdByUser($db, $user_name) != "") die("already: user");
	if(getUserIdByEmail($db, $user_email) != "") die("already: email");
	
	//generate password
	$hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
	$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
	
	if(isset($_SESSION['user']['id'])){
		//If user is alreay registered as guest
		$sqluu = "UPDATE qz_users SET user_name=?, user_email=?, user_password=?, user_type=? WHERE user_id=?";
		$sqluue=$db->prepare($sqluu);
	    $sqluue->execute(array($user_name, $user_email, $user_password_hash, 1, $_SESSION['user']['id']));
		
		//set session data
		$_SESSION['user']['name'] = $user_name;
		$_SESSION['user']['email'] = $user_email;
		$_SESSION['user']['type'] = 1;
	} else {
		//If user is not registered
		$sqliu = "INSERT INTO qz_users (user_id, user_name, user_email, user_password, user_type, user_register_date) VALUES (?, ?, ?, ?, ?, ?)";
		$sqliue=$db->prepare($sqliu);
	    $sqliue->execute(array(NULL, $user_name, $user_email, $user_password_hash, 1, $current_date));
		$user_id = $db->lastInsertId();
		
		//set session data
		$_SESSION['user']['id'] = $user_id;
		$_SESSION['user']['name'] = $user_name;
		$_SESSION['user']['email'] = $user_email;
		$_SESSION['user']['type'] = 1;
		$_SESSION['user']['register_date'] = $current_date;
	}
	die("success");
}else {
	die("no_data");
}

?>
