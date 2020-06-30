<?
include("../includes/dbconn.php");
include("../includes/user_checks.php");

$answered_quizzes = array();

$sqlsq=$db->prepare("SELECT qz_quizzes.quiz_id, qz_quizzes.quiz_title, qz_quizzes.quiz_description, qz_quizzes.quiz_type, qz_users.user_last_name, qz_users.user_first_name,
					 qz_users.user_id 
					 FROM qz_quizzes 
					 LEFT JOIN qz_users ON qz_quizzes.user_id=qz_users.user_id
					 WHERE qz_quizzes.quiz_status=2 AND qz_quizzes.user_id!=?
					 ORDER BY qz_quizzes.quiz_id DESC");
$sqlsq->execute(array($_SESSION['user']['id']));

$sqlsaq=$db->prepare("SELECT quiz_id FROM qz_user_answers WHERE user_id=? GROUP BY quiz_id");
$sqlsaq->execute(array($_SESSION['user']['id']));
while($aq=$sqlsaq->fetch()){
	array_push($answered_quizzes, $aq['quiz_id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>Dashboard - Quizzard</title>
    <?include("../components/css_style.php");?>
</head>

<body>
<div class="uk-background-muted uk-height-viewport">
	<div class="uk-background-norepeat">
		<!-- TOP MENU -->
		<?include("../components/top_menu.php");?>
		
		<div class="uk-child-width-expand@s" uk-grid>
			<div class="uk-width-1-5 uk-margin-top uk-padding">
				
			</div>
			<div class="uk-card uk-card-default uk-card-body uk-width-3-5 uk-margin uk-padding">
				<h3>Quizz list</h3>
				<p>O listă cu quiz-uri bazată pe modulul de căutare, ultimele quiz-uri adăugate pe platformă sau cu quiz-uri related cu altele
					la care user-ul a participat. Descrierea se va încărca dinamic în funcție de tipul quiz-urilor.
				</p>
				<table class="uk-table uk-table-divider">
				    <thead>
				        <tr>
				        	<th>#</th>
				            <th>Titlu</th>
				            <th>Descriere</th>
				            <th>Tip</th>
				            <th>Autor</th>
				            <th>Participă</th>
				            
				        </tr>
				    </thead>
				    <tbody>
				    	<?
				    	$i=0;
				    	while($q=$sqlsq->fetch()){
				    		$i++;
				    		if($i>10) break;
				    		//skip already answered quizzes
				    		if(in_array($q['quiz_id'], $answered_quizzes)){
				    			continue;
				    		}
				    		
				    		switch($q['quiz_type']){
				        		case 1: $quiz_type = 'Chestionar'; break;
								case 2: $quiz_type = 'Sondaj'; break;
								case 3: $quiz_type = 'Studiu de caz'; break;
								default: $quiz_type = 'Unknown';
				        	}
				    		?>
					        <tr>
					        	<td><?echo $i;?></td>
					            <td><?echo $q['quiz_title'];?></td>
					            <td uk-tooltip="title: <?echo $q['quiz_description'];?>; pos: bottom" style="max-width: 300px" class="uk-text-truncate"><?echo $q['quiz_description'];?></td>
					            <td><?echo $quiz_type;?></td>
					            <td><a href="../user/?id=<?echo $q['user_id'];?>" class="uk-link-reset"><?echo $q['user_first_name']." ".$q['user_last_name'];?></a></td>
					            <td><a href="../quiz/?id=<?echo $q['quiz_id'];?>" class="uk-icon-button" uk-icon="file-edit"></a></td>
					        </tr>
				        <? } ?>
				    </tbody>
				    
				</table>
				
				<a href="../new/?id=0" class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-margin-top uk-margin-bottom">Creează un quiz nou</a>
			</div>
			<div class="uk-width-1-5 uk-margin-top uk-padding">
				
			</div>
		 </div>
	</div>
</div>
</body>
<?include("../components/js_scripts.php");?>
</html>
