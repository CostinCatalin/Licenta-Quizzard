<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['quiz_id']) && isset($_POST['quiz_status'])){
	$quiz_id = $_POST['quiz_id'];
	$quiz_status = $_POST['quiz_status'];
	
	$sqluq = "UPDATE qz_quizzes SET quiz_status=? WHERE quiz_id=?";
	$sqluqe=$db->prepare($sqluq);
    $sqluqe->execute(array($quiz_status, $quiz_id));
	
	die("success");
}
?>
