<?
session_start();
include("../../includes/dbconn.php");

if(isset($_SESSION['user']['id']) && isset($_POST['quiz_id'])){
	$times  = array();
	$quiz_id = $_POST['quiz_id'];
	$response = '[';
	
	//generate start/end of each month
	for($month = 1; $month <= 12; $month++) {
	    $first_minute = mktime(0, 0, 0, $month, 1);
	    $last_minute = mktime(23, 59, 59, $month, date('t', $first_minute));
	    
		$sqls=$db->prepare("SELECT COUNT(us_answer_id) FROM qz_user_answers WHERE quiz_id=? AND(answer_date>=? AND answer_date<=?) GROUP BY user_id");
		$sqls->execute(array($quiz_id, $first_minute, $last_minute));
		$row=$sqls->fetch(PDO::FETCH_ASSOC);
		
		if($row['COUNT(us_answer_id)']==NULL){
			$response .= '0, ';
		} else {
			$response .= $row['COUNT(us_answer_id)'].', ';
		}
		
	}
	$response = substr($response, 0, -2);
	$response .= ']';
	die($response);
}
?>
