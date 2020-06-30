<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['quiz_id']) && isset($_POST['quiz_title'])){
	$quiz_id = $_POST['quiz_id'];
	$quiz_title = $_POST['quiz_title'];
	
	$sqluq = "UPDATE qz_quizzes SET quiz_title=? WHERE quiz_id=?";
	$sqluqe=$db->prepare($sqluq);
    $sqluqe->execute(array($quiz_title, $quiz_id));
	
	die("success");
}
?>
