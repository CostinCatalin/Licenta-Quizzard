<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['question_id'])){
	$question_id = $_POST['question_id'];
	
	$sqlrq = "DELETE FROM qz_questions WHERE question_id=?";
	$sqlrqe=$db->prepare($sqlrq);
    $sqlrqe->execute(array($question_id));
	
	$sqlra = "DELETE FROM qz_answers WHERE question_id=?";
	$sqlrae=$db->prepare($sqlra);
    $sqlrae->execute(array($question_id));
	
	die("success");
}
?>
