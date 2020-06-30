<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['question_id'])){
	$question_id = $_POST['question_id'];
	$answer_type = $_POST['answer_type'];
	
	$sqls = "SELECT MAX(answer_value) FROM qz_answers WHERE question_id = ?";
	$sqlse=$db->prepare($sqls);
	$sqlse->execute(array($question_id));
	$row=$sqlse->fetch(PDO::FETCH_ASSOC);
	$value = $row['MAX(answer_value)']+1;
	
	if(isset($_POST['answer_value'])){
		$value = $_POST['answer_value'];
	}
	$sqlia = "INSERT INTO qz_answers (answer_id, question_id, answer_description, answer_value) VALUES (?, ?, ?, ?)";
	$sqliae=$db->prepare($sqlia);
    $sqliae->execute(array(NULL, $question_id, "", $value));
	
	$answer_id = $db->lastInsertId();
	
	$response->id = $answer_id;
	$response->value = $value;
	
	$jsonResponse = json_encode($response);
	die($jsonResponse);
}
?>
