<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['quiz_id']) && isset($_POST['quiz_start_date'])){
	$quiz_id = $_POST['quiz_id'];
	$quiz_start_date = $_POST['quiz_start_date'];
	
	$sqluq = "UPDATE qz_quizzes SET quiz_start_date=? WHERE quiz_id=?";
	$sqluqe=$db->prepare($sqluq);
    $sqluqe->execute(array(strtotime($quiz_start_date), $quiz_id));
	
	die("success");
}
?>
