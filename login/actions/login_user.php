<?
session_start();
include("../../includes/dbconn.php");
include("../../includes/user_functions.php");
$current_date = time();

if(isset($_POST['user_name']) && isset($_POST['user_password'])){
	$user_name = $_POST['user_name'];
	$user_password = $_POST['user_password'];
	
	//retrieve user data
	$sqls=$db->prepare("SELECT * FROM `qz_users` WHERE `user_name`=?");
	$sqls->execute(array($user_name));
	$row=$sqls->fetch(PDO::FETCH_ASSOC);
    $count=$sqls->rowCount();
	
	if($count == 1 && !empty($row)){
		if(!password_verify($user_password, $row['user_password'])){
	  		die("login: wrong");
	  	} else {
			//login successfull
			//set session data
			$_SESSION['user']['id'] = $row['user_id'];
			$_SESSION['user']['name'] = $row['user_name'];
			$_SESSION['user']['email'] = $row['user_email'];
			
			$_SESSION['user']['profile_img'] = $row['user_profile_img'];
			$_SESSION['user']['type'] = $row['user_type'];
			$_SESSION['user']['fname'] = $row['user_first_name'];
			$_SESSION['user']['lname'] = $row['user_last_name'];
			$_SESSION['user']['country'] = $row['user_country'];
			$_SESSION['user']['city'] = $row['user_city'];
			$_SESSION['user']['born_date'] = $row['user_born_date'];
			$_SESSION['user']['register_date'] = $row['user_register_date'];
			
			die("login: success");
		}
	} else {
		die("login: wrong");
	}
}else {
	die("no_data");
}

?>
