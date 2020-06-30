<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['quiz_id'])){
	$quiz_id = $_POST['quiz_id'];
	
	$sqliq = "INSERT INTO qz_questions (question_id, quiz_id, answers_type) VALUES (?, ?, ?)";
	$sqliqe=$db->prepare($sqliq);
    $sqliqe->execute(array(NULL, $quiz_id, 3));
	
	$question_id = $db->lastInsertId();
	die($question_id);
}
?>
