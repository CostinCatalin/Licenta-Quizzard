<?
include("../includes/dbconn.php");
include("../includes/user_checks.php");
session_start();

if(!isset($_GET['id']) || $_GET['id']==""){
	header("Location: http://quizzard.epizy.com/new/?id=0");
}

//create new quiz
if($_GET['id'] == 0){
	$sqliq = "INSERT INTO qz_quizzes (quiz_id, user_id, quiz_type, quiz_status, quiz_creation_date) VALUES (?, ?, ?, ?, ?)";
	$sqliqe=$db->prepare($sqliq);
    $sqliqe->execute(array(NULL, $_SESSION['user']['id'], 1, 1, time()));
	
	$quiz_id = $db->lastInsertId();
	header("Location: http://quizzard.epizy.com/new/?id=".$quiz_id); //redirect to edit the new created quiz
}

//select quiz data
$quiz_id = $_GET['id'];
$sqls=$db->prepare("SELECT * FROM qz_quizzes WHERE quiz_id=?");
$sqls->execute(array($quiz_id));
$row=$sqls->fetch(PDO::FETCH_ASSOC);

//check if author of quiz is current user
if($row['user_id'] != $_SESSION['user']['id'] && $quiz_id != 0){
	header("Location: http://quizzard.epizy.com/solve/?id=".$quiz_id);
}

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

    <title>New - Quizzard</title>
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
					                <h3 class="uk-card-title uk-margin-remove-bottom">Quiz nou</h3>
					                <p class="uk-text-meta uk-margin-remove-top"><time><?echo date("M d, Y");?></time></p>
					            </div>
					        </div>
					    </div>
					    <div class="uk-card-body">
					        <div class="uk-margin">
					            <input onchange="editTitle(<?echo $quiz_id;?>, this.value)" class="uk-input uk-form-width-large uk-form-large uk-width-1-1" type="text" placeholder="Titlu" value="<?echo $row['quiz_title'];?>">
					        </div>
					        <?if($row['quiz_image'] == ""){?>
					        <div class="uk-margin">
					            <textarea onchange="editDescription(<?echo $quiz_id;?>, this.value)"class="uk-textarea" rows="10" placeholder="Descriere"><?echo $row['quiz_description'];?></textarea>
					        </div>
					        <?} else {?>
					        <div class="uk-margin">
					        	<div class="uk-inline img-container">
						            <img class="img-to-fit" src="../backbone/quiz_pics/<?echo $row['quiz_image'];?>" alt="" style="img{display: block; width:auto height:auto}">
						            <div class="uk-overlay uk-overlay-default uk-position-bottom uk-padding-remove">
						                <textarea onchange="editDescription(<?echo $quiz_id;?>, this.value)"class="uk-textarea uk-form-blank uk-textarea-vertical" rows="10" placeholder="Descriere"><?echo $row['quiz_description'];?></textarea>
						            </div>
						        </div>
					        </div>
					        <?}?>
					        <div class="uk-margin">
						        <label class="uk-form-label" for="select-quiz-type"></label>
						        <div class="uk-form-controls">
						            <select class="uk-select" id="select-quiz-type" onchange="editQuizType(<?echo $quiz_id;?>, this)">
						                <option value="1" <?if($row['quiz_type'] == 1) echo " selected";?>>Chestionar</option>
						                <option value="2" <?if($row['quiz_type'] == 2) echo " selected";?>>Sondaj</option>
						                <option value="3" <?if($row['quiz_type'] == 3) echo " selected";?>>Studiu de caz</option>
						            </select>
						        </div>
						    </div>
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
					                <p class="uk-text-meta uk-margin-remove-top"><time>Panou de control</time></p>
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
						    	<div uk-grid>
							        <div class="uk-width-1-2">
							            <input id="question-text-<?echo $qnr;?>" onchange="editQuestion('<?echo $q['question_id'];?>', this.value)" value="<?echo $q['question_text'];?>"  class="uk-input uk-form-width-large uk-width-1-1" type="text" placeholder="Întrebare">
							        </div>
							        <div class="uk-width-1-2">
								        <label class="uk-form-label" for="question-select-panel-<?echo $qnr;?>"></label>
								        <div class="uk-form-controls" id="question-select-panel-<?echo $qnr;?>">
								            <select class="uk-select question-select" onchange="changeQuestionType('<?echo $q['question_id'];?>', '<?echo $qnr;?>', this);" id="answers-type-<?echo $qnr;?>">
								                <option <?if($q['answers_type'] == "3") echo "selected";?>  value="text" >Răspuns text</option>
								                <option <?if($q['answers_type'] == "2") echo "selected";?>  value="radiobox">Un singur răspuns</option>
								                <option <?if($q['answers_type'] == "1") echo "selected";?>  value="checkbox">Răspunsuri multiple</option>
								            </select>
								        </div>
								    </div>
								    <div>
								    	<?
								    	$sqlsaq=$db->prepare("SELECT * FROM qz_answers WHERE question_id=? ORDER BY answer_id ASC");
										$sqlsaq->execute(array($q['question_id']));
										?>
								    	<div class="uk-form-controls" id="answer-list-<?echo $qnr;?>">
								            <?if($q['answers_type'] == 2){?>
								            	<? while($a=$sqlsaq->fetch()){?>
									            	<label class="uk-margin-small-top" id="answer-label-<?echo $qnr;?>-<?echo $a['answer_value'];?>">
														<input class="uk-radio uk-margin-small-top uk-margin-small-right" value="<?echo $a['answer_value'];?>" type="radio" name="question_<?echo $qnr;?>"> 
														<div class="uk-inline uk-margin-small-top">
															<a class="uk-form-icon uk-form-icon-flip" onclick="removeAnswer('<?echo $a['answer_id'];?>', '<?echo $qnr;?>','<?echo $a['answer_value'];?>')" uk-icon="icon: close"></a>
															<input id="answer-text-q<?echo $qnr;?>-a<?echo $a['answer_value'];?>" onchange="editAnswer('<?echo $a['answer_id'];?>', this.value)" value="<?echo $a['answer_description'];?>" class="uk-input uk-form-blank uk-form-width-large" type="text" placeholder="Răspuns">
														</div>
														<br>
													</label> 
												<? }?>
								            <?} elseif($q['answers_type'] == 1){?>
								            	<? while($a=$sqlsaq->fetch()){?>
								            		<label id="answer-label-<?echo $qnr;?>-<?echo $a['answer_id'];?>">
														<input class="uk-checkbox uk-margin-small-top uk-margin-small-right" value="<? echo $a['answer_value'];?>" type="checkbox" name="question_<?echo $qnr;?>">
														<div class="uk-inline uk-margin-small-top">
															<a class="uk-form-icon uk-form-icon-flip" onclick="removeAnswer('<? echo $a['answer_id'];?>', '<? echo $qnr;?>','<? echo $a['answer_id'];?>')" uk-icon="icon: close"></a>
															<input id="answer-text-q<?echo $qnr;?>-a<?echo $a['answer_id'];?>" class="uk-input uk-form-blank uk-form-width-large" value="<?echo $a['answer_description'];?>" onchange="editAnswer('<? echo $a['answer_id'];?>', this.value)" type="text" placeholder="Răspuns">
														</div>
														<br>
													</label>
												<? } ?>
								            <?}?>
								        </div>
								    </div>
								    <div class="uk-width-1-1">
								    	<a <?if($q['answers_type'] == "3"){?> style="display: none;" <? } ?> id="add-answer-to-question-<?echo $qnr;?>" onclick="addAnswer('<?echo $q['question_id'];?>', '<?echo $qnr;?>')" class="uk-button uk-button-text">Adaugă răspuns</a>
							        </div>
						        </div>
						    </div>
						    <div class="uk-card-footer">
						    	<div class="uk-clearfix">
								    <div class="uk-float-right">
								       	<a onclick="duplicateQuestion('<?echo $q['question_id'];?>');" uk-icon="copy"  uk-tooltip="title: Duplicați întrebarea; pos: top"></a>
								       	<a onclick="removeQuestion('<?echo $q['question_id'];?>', '<?echo $qnr;?>');"  uk-icon="trash" uk-tooltip="title: Ștergeți întrebarea; pos: top"  class="uk-margin-left"></a>
								    </div>
								    <div class="uk-float-left">
								    	<a onclick="previewQuestion('<?echo $q['question_id'];?>', '<?echo $qnr;?>')" class="uk-button uk-button-text">Alege răspunsul corect</a>
								    </div>
								</div>
						    </div>
						</div>
		            </div>
				<? } ?>
	            
			</div>
			
			<div class="uk-width-2-3">
				<div class="uk-clearfix">
				    <div class="uk-float-right">
				    	<a href="../quizzes/" class="uk-button uk-button-danger"  uk-tooltip="title: Toate modificările vor fi șterse.; pos: top">Anulează</a>
				    </div>
				    <div class="uk-float-left">
				       	<a onclick="publishQuiz('<?echo $row['quiz_id'];?>', 2)" class="uk-button uk-button-primary" uk-tooltip="title: Quizul va fi disponibil pentru toată lumea.; pos: top">Publică</a>
				       	<a onclick="publishQuiz('<?echo $row['quiz_id'];?>', 1)" class="uk-button uk-button-secondary" uk-tooltip="title: Modificările vor fi salvate automat. La acționarea butonului Quiz-ul nu va mai fi public, ci salvat ca schiță.; pos: top">Salvează ca schiță</a>
				    	<a href="../solve/?id=<?echo $row['quiz_id'];?>" class="uk-button uk-button-default" uk-tooltip="title: Previzualizarea quizului, in formatul utilizatorului.; pos: top">Previzualizează</a>
				    </div>
				</div>
			</div>
		</div>
		
		<!-- This is the modal -->
		<div id="question-modal-preview" uk-modal>
		    <div class="uk-modal-dialog uk-modal-body">
		        <h2 class="uk-modal-title" id="question-preview-title">Headline</h2>
		        <div id="question-preview-body">
		        	
		        </div>
		        <div class="uk-text-right">
		            <button class="uk-button uk-button-default uk-modal-close" type="button">Anulează</button>
		            <button class="uk-button uk-button-primary" id="save-correct-answer" type="button">Salvează</button>
		        </div>
		    </div>
		</div>
		
	</div>
</div>
<button id="addQuestionBtn" uk-tooltip="title: Adaugă o întrebare nouă; pos: left" onclick="addQuestion('<? echo $quiz_id;?>')" class="uk-icon-button" uk-icon="plus" ratio="2" ></button>
</body>
<?include("../components/js_scripts.php");?>
<script type="text/javascript" src="questions.js"></script>
<script>
$( document ).ready(function() {
    //$("#addQuestionBtn").css("display", "block");
});

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</html>
