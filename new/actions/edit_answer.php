<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['answer_id']) && isset($_POST['answer_description'])){
	$answer_id = $_POST['answer_id'];
	$answer_description = $_POST['answer_description'];
	
	$sqlua = "UPDATE qz_answers SET answer_description=? WHERE answer_id=?";
	$sqluae=$db->prepare($sqlua);
    $sqluae->execute(array($answer_description, $answer_id));
	
	die("success");
}
?>
