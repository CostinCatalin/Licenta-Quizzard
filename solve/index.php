<?
include("../includes/dbconn.php");
include("../includes/user_checks.php");
session_start();

if(!isset($_GET['id']) || $_GET['id']==""){
	header("Location: http://quizzard.epizy.com/dashboard/");
}

//select quiz data
$quiz_id = $_GET['id'];
$sqls=$db->prepare("SELECT * FROM qz_quizzes WHERE quiz_id=?");
$sqls->execute(array($quiz_id));
$row=$sqls->fetch(PDO::FETCH_ASSOC);

//check is user has answered quiz
$sqlsa=$db->prepare("SELECT us_answer_id FROM qz_user_answers WHERE quiz_id=? AND user_id=?");
$sqlsa->execute(array($quiz_id, $_SESSION['user']['id']));
$answer=$sqlsa->fetch(PDO::FETCH_ASSOC);
if($answer['us_answer_id'] != NULL || $answer['us_answer_id'] != ""){
	header("Location: http://quizzard.epizy.com/dashboard/");
}

//select questions
$sqlsq=$db->prepare("SELECT * FROM qz_questions WHERE quiz_id=? ORDER BY question_id ASC");
$sqlsq->execute(array($quiz_id));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>Solve - Quizzard</title>
    <?include("../components/css_style.php");?>
</head>

<body>
<div class="uk-background-muted uk-height-viewport">
	<div class="uk-background-norepeat">
		<!-- TOP MENU -->
		<?include("../components/top_menu.php");?>
		
		<div class="uk-padding uk-flex-center uk-width-1-1" uk-grid>
			<div class="uk-width-2-3">
				<div class="uk-panel">
		        	<div class="uk-card uk-card-default uk-width-1-1">
					    <div class="uk-card-header">
					        <div class="uk-grid-small uk-flex-middle" uk-grid>
					            <div class="uk-width-auto">
					                <span uk-icon="icon: question; ratio: 3"></span>
					            </div>
					            <div class="uk-width-expand">
					                <h3 class="uk-card-title uk-margin-remove-bottom"><?echo $row['quiz_title'];?></h3>
					                <p class="uk-text-meta uk-margin-remove-top"><time><?echo date('M d, Y', $row['quiz_creation_date']);?></time></p>
					            </div>
					        </div>
					    </div>
					    <div class="uk-card-body">
					        <?if($row['quiz_image'] == ""){?>
					        <div class="uk-margin">
					            <p><?echo $row['quiz_description'];?></p>
					        </div>
					        <?} else {?>
					        <div class="uk-margin">
					        	<div class="uk-inline img-container">
						            <img class="img-to-fit" src="../backbone/quiz_pics/<?echo $row['quiz_image'];?>" alt="" style="img{display: block; width:auto height:auto}">
						            <div class="uk-overlay uk-overlay-default uk-position-bottom uk-padding">
						                <p><?echo $row['quiz_description'];?></p>
						            </div>
						        </div>
					        </div>
					        <?}?>
					    </div>
					</div>
		        </div>
			</div>  
			
			<!-- QUESTIONS CONTENT -->
			<div class="uk-width-2-3" id="questions-content-panel">
	            <div class="uk-panel">
	            	<div class="uk-card uk-card-default uk-width-1-1">
					    <div class="uk-card-header">
					        <div class="uk-grid-small uk-flex-middle" uk-grid>
					            <div class="uk-width-auto">
					                <span uk-icon="icon: plus-circle; ratio: 3"></span>
					            </div>
					            <div class="uk-width-expand">
					                <h3 class="uk-card-title uk-margin-remove-bottom">Întrebări și răspunsuri</h3>
					                <p class="uk-text-meta uk-margin-remove-top"><time><?echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname'];?></time></p>
					            </div>
					        </div>
					    </div>
					</div>
	            </div>
	            <?
	            $qnr=0;
	            while($q=$sqlsq->fetch()){
	            	$qnr++;
					
	            ?>
					<div class="uk-panel uk-margin-top" id="question-panel-<?echo $qnr;?>">
		            	<div class="uk-card uk-card-default uk-width-1-1">
						    <div class="uk-card-body">
						    	<div class="uk-grid-small" uk-grid>
							        <div class="uk-width-1-1">
							            <h4><?echo $q['question_text'];?></h4>
							        </div>
								    	<?
								    	$sqlsaq=$db->prepare("SELECT * FROM qz_answers WHERE question_id=? ORDER BY answer_id ASC");
										$sqlsaq->execute(array($q['question_id']));
										?>
								    	<div class="uk-form-controls">
								            <?if($q['answers_type'] == 2){?>
								            	<? while($a=$sqlsaq->fetch()){?>
									            	<label class="radio-label">
														<input class="uk-radio" value="<?echo $a['answer_value'];?>" type="radio" name="question_<?echo $q['question_id'];?>"> 
														 <?echo $a['answer_description'];?>
														<br>
													</label> 
												<? }?>
								            <?} elseif($q['answers_type'] == 1){?>
								            	<? while($a=$sqlsaq->fetch()){?>
								            		<label class="radio-label">
														<input class="uk-checkbox" value="<? echo $a['answer_value'];?>" type="checkbox" name="question_<?echo $q['question_id'];?>"> 
														 <?echo $a['answer_description'];?>
														<br>
													</label>
												<? } ?>
								            <?} elseif($q['answers_type'] == 3){ ?>
								            	<input class="uk-input uk-form-width-large" type="text" placeholder="Răspuns" name="question_<?echo $q['question_id'];?>">
								            <?}?>
								        </div>
						        </div>
						    </div>
						</div>
		            </div>
				<? } ?>
				<div class="uk-margin uk-width-1-1">
		            
			        <?//check if author of quiz is current user
					if($row['user_id'] != $_SESSION['user']['id']){?>
						<button id="send-answers-btn" type="button" onclick="sendAnswers('<?echo $_SESSION['user']['id'];?>', '<?echo $row['quiz_id'];?>')" class="uk-button uk-button-primary">Trimite răspunsurile</button>
	        		<?} else {?>
	        			<a href="../quiz/?id=<?echo $quiz_id;?>" class="uk-button uk-button-danger" type="button">Anulează</a>
	        		<? } ?>
		        </div>
	            
			</div>
		</div>
	</div>
</div>
</body>
<?include("../components/js_scripts.php");?>
<script type="text/javascript">
function sendAnswers(user_id, quiz_id){
	 $('#send-answers-btn').prop('disabled', true);
	 
	var formData = new FormData();
	var questionsArray = [];
	var answersArray = {};
	formData.append("user_id", user_id);
	formData.append("quiz_id", quiz_id);
	
	$("input[name^=question_").each(function() {
		var q = $(this);
		var questionType = q.attr("type");
		var questionName = q.attr("name");
		var questionId = questionName.split("_")[1];
		
		questionsArray[questionId] = questionType;
	});
	
	questionsArray.forEach(function(item, index) {
		if(item == "radio"){
			item = $("input[name=question_"+ index +"]:checked").val();
		} else if(item == "text"){
			item = $("input[name=question_"+ index +"]").val();
			item = item.trim();
		}
		 else if(item == "checkbox"){
			item = '';
			$("input:checkbox[name=question_"+ index +"]:checked").each(function() {
				item += $(this).val() + "_";
			});
			item = item.substring(0, item.length - 1);
		}
		
		if(item == null || item == "") item = 0;
		index = "q"+index;
		answersArray[index] = item;
	});
	var answersString = JSON.stringify(answersArray);
	formData.append("answers", answersString);
	$.ajax({
        url:'actions/send_answers.php',
        type:'POST',
      	data: formData,
      	cache: false,
        contentType: false,
        processData: false,
      	success: function(data) {
      		window.location.href="http://quizzard.epizy.com/history/"
      	} 	
    });
}
</script>
</html>
