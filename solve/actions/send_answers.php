<?
session_start();
include("../../includes/dbconn.php");

if(isset($_POST['user_id']) && isset($_POST['quiz_id']) && isset($_POST['answers'])){
	$user_id = $_POST['user_id'];
	$quiz_id = $_POST['quiz_id'];
	$answers = json_decode(stripslashes($_POST['answers']));
	$answer_date = time();
	
	//user score
	$score = 0;
	$question_counter = 0;
	foreach($answers as $q=>$a){
		//echo $q." => ". $a."\n";
		$question_counter++;
		$question_id = str_replace("q", "", $q);
		$answer_value = $a;
		
		$sqlia = "INSERT INTO qz_user_answers (us_answer_id, user_id, quiz_id, question_id, answer_value, answer_date) VALUES (?, ?, ?, ?, ?, ?)";
		$sqliae=$db->prepare($sqlia);
	    $sqliae->execute(array(NULL, $user_id, $quiz_id, $question_id, $answer_value, $answer_date));
	    
		$sqlsav=$db->prepare("SELECT answers_type, correct_answer FROM qz_questions WHERE question_id=?");
	    $sqlsav->execute(array($question_id));
		$a=$sqlsav->fetch(PDO::FETCH_ASSOC);
		$correct_answer = $a['correct_answer'];
		$answer_type = $a['answers_type'];
		
		if($answer_type==3){
			$sqlsav=$db->prepare("SELECT answer_value FROM qz_answers WHERE question_id=?");
		    $sqlsav->execute(array($question_id));
			$a=$sqlsav->fetch(PDO::FETCH_ASSOC);
			$correct_answer = $a['answer_value'];
			
			$sim = similar_text($correct_answer, $answer_value, $percent);
			
			if($percent >= 50){
				$score++;
			}
		} else {
			if($correct_answer == $answer_value) $score++;
		}
		
		//echo $question_id."\n";
		//echo "User answer: ".$answer_value."\n";
		//echo "Correct answer: ".$correct_answer."\n\n";
	}
	$points_per_question = 100/$question_counter;
	$total_score = $score*$points_per_question;
	
	$sqlis = "INSERT INTO qz_scores (score_id, user_id, quiz_id, score_value) VALUES (?, ?, ?, ?)";
	$sqlise=$db->prepare($sqlis);
	$sqlise->execute(array(NULL, $user_id, $quiz_id, $total_score));
}

?>