<?
include("../includes/dbconn.php");
include("../includes/user_checks.php");

$sqlsaq=$db->prepare("SELECT  qz_user_answers.quiz_id, qz_quizzes.quiz_title, qz_quizzes.quiz_type, qz_quizzes.quiz_description, qz_user_answers.answer_date,
						qz_users.user_id, qz_users.user_first_name, qz_users.user_last_name
						FROM qz_user_answers 
						LEFT JOIN qz_quizzes ON qz_user_answers.quiz_id=qz_quizzes.quiz_id
						LEFT JOIN qz_users ON qz_quizzes.user_id=qz_users.user_id
						WHERE qz_user_answers.user_id=?
						GROUP BY qz_user_answers.quiz_id DESC");
$sqlsaq->execute(array($_SESSION['user']['id']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>History - Quizzard</title>
    <?include("../components/css_style.php");?>
</head>

<body>
<div class="uk-background-muted uk-height-viewport">
	<div class="uk-background-norepeat">
		<!-- TOP MENU -->
		<?include("../components/top_menu.php");?>
		
		<div class="uk-child-width-expand@s">
			<?include("left_menu.php");?>
			<div class="uk-margin uk-padding uk-background-white">
				<table class="uk-table uk-table-striped uk-table-hover">
				    <thead>
				        <tr>
				            <th>#</th>
				            <th>Titlu</th>
				            <th>Descriere</th>
				            <th>Autor</th>
				            <th>Data participării</th>
				            <th>Scoring</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?
				    	$i=0;
				    	while($aq=$sqlsaq->fetch()){
				    		$i++;
							
							$sqlss=$db->prepare("SELECT score_value FROM qz_scores WHERE quiz_id=? AND user_id=?");
							$sqlss->execute(array($aq['quiz_id'], $_SESSION['user']['id']));
							$us=$sqlss->fetch(PDO::FETCH_ASSOC);
							$score = $us['score_value'];
							if($score == "") $score = 0;
				    		?>
				    		<tr>
					            <td><?echo $i;?></td>
					            <td><?echo $aq['quiz_title'];?></td>
					            <td uk-tooltip="title: <?echo $aq['quiz_description'];?>; pos: bottom" style="max-width: 400px" class="uk-text-truncate"><?echo $aq['quiz_description'];?></td>
					            <td><a href="../user/?id=<?echo $aq['user_id'];?>" class="uk-link-reset"><?echo $aq['user_first_name'].' '.$aq['user_last_name'];?></a></td>
					            <td><?echo date('d M, Y', $aq['answer_date']);?></td>
					            <td><?echo $score;?>/100</td>
					        </tr>
				    	<? } 
				        if($i == 0){ ?>
					        <tr>
					            <td class="uk-text-center uk-text-bold" colspan="6">Nu s-au găsit quizuri create.</td>
					        </tr>
				        <?}?>
				        
				    </tbody>
				</table>
			</div>
		 </div>
	</div>
</div>
</body>
<?include("../components/js_scripts.php");?>
</html>
