<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['question_id']) && isset($_POST{'question_type'})){
	$question_id = $_POST['question_id'];
	$question_type = $_POST['question_type'];
	$type = 0;
	
	switch($question_type){
		case "radiobox": $type = 2; break;
		case "checkbox": $type = 1; break; 
		case "text": $type = 3; break;
		default: $type = 0 ;
	}
	$sqluq = "UPDATE qz_questions SET answers_type=? WHERE question_id=?";
	$sqluqe=$db->prepare($sqluq);
    $sqluqe->execute(array($type, $question_id));
	
	//Sterg raspunsurile daca se schimba tipul
	$sqlra = "DELETE FROM qz_answers WHERE question_id=?";
	$sqlrae=$db->prepare($sqlra);
    $sqlrae->execute(array($question_id));
	
	die("success");
}
?>
