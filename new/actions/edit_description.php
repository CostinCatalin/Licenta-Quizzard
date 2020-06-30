<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['quiz_id']) && isset($_POST['quiz_description'])){
	$quiz_id = $_POST['quiz_id'];
	$quiz_description = $_POST['quiz_description'];
	
	$sqluq = "UPDATE qz_quizzes SET quiz_description=? WHERE quiz_id=?";
	$sqluqe=$db->prepare($sqluq);
    $sqluqe->execute(array($quiz_description, $quiz_id));
	
	die("success");
}
?>
