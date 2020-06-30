<?
include("../../includes/dbconn.php");

$sqlac=$db->prepare("SELECT quiz_id, quiz_start_date, quiz_end_date FROM qz_quizzes WHERE (quiz_status!=5 AND quiz_status!=4) AND (quiz_start_date != '' OR quiz_end_date !='')");
$sqlac->execute();
$current_date = time();

while($q=$sqlac->fetch()){
	$quiz_id = $q['quiz_id'];
	$start_date = $q['quiz_start_date'];
	$end_date = $q['quiz_end_date'];
	
	//if quiz has not started yet, set it as template
	if($start_date > $current_date && $start_date != ''){
		$sqluq = "UPDATE qz_quizzes SET quiz_status=? WHERE quiz_id=?";
		$sqluqe=$db->prepare($sqluq);
	    $sqluqe->execute(array(1, $quiz_id));
		
		echo "Quiz[".$quiz_id."] didn't reach the stard date yet.";
	}
	
	//if quiz end date has passed, set it as closed
	if($end_date < $current_date && $end_date != ''){
		$sqluq = "UPDATE qz_quizzes SET quiz_status=? WHERE quiz_id=?";
		$sqluqe=$db->prepare($sqluq);
	    $sqluqe->execute(array(3, $quiz_id));
		
		echo "Quiz[".$quiz_id."] has passed the end date.";
	}
	
	//if quiz start date has passed and no end date is set, set quiz as published
	if(($start_date <= $current_date && $start_date != '') && $end_date == ''){
		$sqluq = "UPDATE qz_quizzes SET quiz_status=? WHERE quiz_id=?";
		$sqluqe=$db->prepare($sqluq);
	    $sqluqe->execute(array(2, $quiz_id));
		
		echo "Quiz[".$quiz_id."] has passed the start date, and has no end date.";
	}
	
	//if current date is between end and start, set quiz as published
	if($start_date <= $current_date && $start_date != '' && $end_date >= $current_date && $end_date != ''){
		$sqluq = "UPDATE qz_quizzes SET quiz_status=? WHERE quiz_id=?";
		$sqluqe=$db->prepare($sqluq);
	    $sqluqe->execute(array(2, $quiz_id));
		
		echo "Quiz[".$quiz_id."] is between dates, so it has been published.";
	}
	echo"<br>";
}
?>
