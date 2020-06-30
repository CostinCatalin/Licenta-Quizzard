<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['question_id']) && isset($_POST{'question_description'})){
	$question_id = $_POST['question_id'];
	$question_description = $_POST['question_description'];
	
	$sqluq = "UPDATE qz_questions SET question_text=? WHERE question_id=?";
	$sqluqe=$db->prepare($sqluq);
    $sqluqe->execute(array($question_description, $question_id));
	
	die("success");
}
?>
