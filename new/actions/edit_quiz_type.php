<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['quiz_id']) && isset($_POST['quiz_type'])){
	$quiz_id = $_POST['quiz_id'];
	$quiz_type = $_POST['quiz_type'];
	
	$sqluq = "UPDATE qz_quizzes SET quiz_type=? WHERE quiz_id=?";
	$sqluqe=$db->prepare($sqluq);
    $sqluqe->execute(array($quiz_type, $quiz_id));
	
	die("success");
}
?>
