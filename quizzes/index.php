<?
include("../includes/dbconn.php");
include("../includes/user_checks.php");

$sqlsq=$db->prepare("SELECT qz_quizzes.quiz_id, qz_quizzes.quiz_title, qz_quizzes.quiz_description, qz_quizzes.quiz_creation_date, qz_quizzes.quiz_type,
					 qz_users.user_last_name, qz_users.user_first_name
					 FROM qz_quizzes 
					 LEFT JOIN qz_users ON qz_quizzes.user_id=qz_users.user_id
					 WHERE qz_quizzes.user_id=?
					 ORDER BY qz_quizzes.quiz_id DESC");
$sqlsq->execute(array($_SESSION['user']['id']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>Quizzes - Quizzard</title>
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
				            <th>Tip</th>
				            <th>Data creeării</th>
				            <th>Editare</th>
				        </tr>
				    </thead>
				    <tbody>
				        <?
				        $i = 0;
				        while($q=$sqlsq->fetch()){ 
				        	$i++;
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
					            <td uk-tooltip="title: <?echo $q['quiz_description'];?>; pos: bottom" style="max-width: 400px" class="uk-text-truncate"><?echo $q['quiz_description'];?></td>
					            <td><?echo $quiz_type;?></td>
					            <td><?echo date('H:i - d/m/Y', $q['quiz_creation_date']);?></td>
					            <td><a href="../quiz/?id=<?echo $q['quiz_id'];?>" class="uk-icon-button" uk-icon="album"></a></td>
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
