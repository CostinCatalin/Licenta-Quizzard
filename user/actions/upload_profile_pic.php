<?
require_once("../../includes/dbconn.php");
date_default_timezone_set('Europe/Helsinki');

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("PNG" => "image/png", "png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg","JPG" => "image/jpg", "JPEG" => "image/jpeg", "JPG" => "image/jpg"); //formatul permis
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
		$location = $_FILES["photo"]["tmp_name"]; //locatie
		$user_id = $_POST['user-id'];
		
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("error: file_format");
		
        // Verify file size - 8MB maximum
        $maxsize = 8 * 1024 * 1024;
        if($filesize > $maxsize) die("error: file_size");
		
		//Verify file dimensions minimum 940x300
  		list($width, $height) = getimagesize($location); //preia dimensiuni
		if($width < 940 || $height < 400) die("error: file_dim");
		
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            $image_name = generateRandomString(10).'.'.$ext;
			
            if(move_uploaded_file($location, "../../backbone/profile_pics/".$image_name)){
            	$sqls=$db->prepare("SELECT user_profile_img FROM qz_users WHERE user_id=?");
				$sqls->execute(array($user_id));
				$row=$sqls->fetch(PDO::FETCH_ASSOC);
				
				//remove last profile picture from server
				if($row['user_profile_img'] != ""){
					unlink("../../backbone/profile_pics/".$row['user_profile_img']);
				}
				
				
				//update current photo
				$sqluu = "UPDATE qz_users SET user_profile_img=? WHERE user_id=?";
				$sqluue=$db->prepare($sqluu);
			    $sqluue->execute(array($image_name, $user_id));
            	die("success: data_saved");
            } else {
            	die("error: save_data");
            }			
        } else{
            die("error: file_myme"); 
        }
    } else {
    	die("error: no_file");
    }
} else {
	die("error: no_request");
}
?>