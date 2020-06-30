<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['answer_id'])){
	$answer_id = $_POST['answer_id'];
	
	$sqlra = "DELETE FROM qz_answers WHERE answer_id=?";
	$sqlrae=$db->prepare($sqlra);
    $sqlrae->execute(array($answer_id));
	
	die("success");
}
?>
