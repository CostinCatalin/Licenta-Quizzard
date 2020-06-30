<?php
function getUserIdByEmail($db, $email){
	$sqli=$db->prepare("SELECT user_id FROM qz_users WHERE user_email=?");
    $sqli->execute(array($email));
	$row = $sqli->fetch(PDO::FETCH_ASSOC);
    return $row['user_id']; 
}
function getUserIdByUser($db, $user){
	$sqli=$db->prepare("SELECT user_id FROM qz_users WHERE user_name=?");
    $sqli->execute(array($user));
	$row = $sqli->fetch(PDO::FETCH_ASSOC);
    return $row['user_id']; 
}
?>