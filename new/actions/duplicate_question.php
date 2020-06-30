<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['question_id'])){
	$question_id = $_POST['question_id'];
	
	$sqlsq=$db->prepare("SELECT * FROM qz_questions WHERE question_id=?");
	$sqlsq->execute(array($question_id));
	while($q=$sqlsq->fetch()){
		
		$sqliq = "INSERT INTO qz_questions (question_id, quiz_id, question_text, question_image, answers_type, is_required, correct_answer) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$sqliqe=$db->prepare($sqliq);
	    $sqliqe->execute(array(NULL, $q['quiz_id'], $q['question_text'], $q['question_image'], $q['answers_type'], $q['is_required'], $q['correct_answer']));
	}
	
	$new_question_id = $db->lastInsertId();
	
	$sqlsaq=$db->prepare("SELECT * FROM qz_answers WHERE question_id=? ORDER BY answer_value ASC");
	$sqlsaq->execute(array($question_id));
	while($a=$sqlsaq->fetch()){
		$sqlia = "INSERT INTO qz_answers (answer_id, question_id, answer_description, answer_value) VALUES (?, ?, ?, ?)";
		$sqliae=$db->prepare($sqlia);
	    $sqliae->execute(array(NULL, $new_question_id, $a['answer_description'], $a['answer_value']));
	}
	die("success");
}
?>
