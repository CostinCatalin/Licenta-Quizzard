<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['question_id']) && isset($_POST['answer_id']) && isset($_POST{'question_type'})){
	$question_id = $_POST['question_id'];
	$question_type = $_POST['question_type'];
	$answer_id = $_POST['answer_id'];
	
	if($question_type == "text"){
		//Sterg raspunsul corect adaugat daca intrebarea este de tip text
		$sqlra = "DELETE FROM qz_answers WHERE question_id=? and answer_id!=?";
		$sqlrae=$db->prepare($sqlra);
	    $sqlrae->execute(array($question_id, $answer_id));
		$answer = $answer_id;
	}
	elseif($question_type == "radiobox"){
		$answer = $answer_id;
	}
	elseif($question_type == "checkbox"){
		$answer = $answer_id;
	}
	
	$sqluq = "UPDATE qz_questions SET correct_answer=? WHERE question_id=?";
	$sqluqe=$db->prepare($sqluq);
    $sqluqe->execute(array($answer, $question_id));
	die("success");
}
?>
