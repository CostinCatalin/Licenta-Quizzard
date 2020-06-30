<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['question_id']) && isset($_POST['answer_type'])){
	$question_id = $_POST['question_id'];
	$answer_type = $_POST['answer_type'];
	
	if($answer_type == "text"){
		$sqls=$db->prepare("SELECT answer_id, answer_value FROM qz_answers WHERE question_id=? ORDER BY answer_id DESC");
		$sqls->execute(array($question_id));
		$row=$sqls->fetch(PDO::FETCH_ASSOC);
		
		$response->id = $row['answer_id'];
		$response->value = $row['answer_value'];
	} else {
		$sqls=$db->prepare("SELECT correct_answer FROM qz_questions WHERE question_id=?");
		$sqls->execute(array($question_id));
		$row=$sqls->fetch(PDO::FETCH_ASSOC);
		
		$response->id = 0;
		$response->value = $row['correct_answer'];
	}
	
	$jsonResponse = json_encode($response);
	die($jsonResponse);
}
?>
