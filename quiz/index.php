<?
include("../includes/dbconn.php");
include("../includes/user_checks.php");

//in case get parameter is not set correctly
if(!isset($_GET['id']) || $_GET['id']=="" || $_GET['id']==0){
	header("Location: http://quizzard.epizy.com/dashboard/");
}

//select quiz data
$quiz_id = $_GET['id'];
$sqlsq=$db->prepare("SELECT * FROM qz_quizzes WHERE quiz_id=?");
$sqlsq->execute(array($quiz_id));
$row=$sqlsq->fetch(PDO::FETCH_ASSOC);

if($row['user_id'] == ""){
	header("Location: http://quizzard.epizy.com/dashboard/");
}
//check if author of quiz is current user
if($row['user_id'] != $_SESSION['user']['id'] && $quiz_id != 0){
		header("Location: http://quizzard.epizy.com/solve/?id=".$quiz_id);
}

//question count
$sqlsqc=$db->prepare("SELECT COUNT(question_id) FROM qz_questions WHERE quiz_id=?");
$sqlsqc->execute(array($quiz_id));
$qc=$sqlsqc->fetch(PDO::FETCH_ASSOC);
$question_count = $qc['COUNT(question_id)'];

//answers count
$sqlsac=$db->prepare("SELECT COUNT(us_answer_id) FROM qz_user_answers WHERE quiz_id=?");
$sqlsac->execute(array($quiz_id));
$ac=$sqlsac->fetch(PDO::FETCH_ASSOC);
$answers_count = $ac['COUNT(us_answer_id)'];

//participants count
$sqlspc=$db->prepare("SELECT COUNT(DISTINCT(user_id)) FROM qz_user_answers WHERE quiz_id=?");
$sqlspc->execute(array($quiz_id));
$pc=$sqlspc->fetch(PDO::FETCH_ASSOC);
$participants_count = $pc['COUNT(DISTINCT(user_id))'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>Quiz - Quizzard</title>
    <?include("../components/css_style.php");?>
</head>

<body>
<div class="uk-background-muted uk-height-viewport">
	<div class="uk-background-norepeat">
		<!-- TOP MENU -->
		<?include("../components/top_menu.php");?>
		
		<div uk-grid>
			<?include("left_menu.php");?>
			<div class="uk-width-4-5">
			<div class="uk-width-1-1 uk-grid-small uk-grid-match" uk-grid>
				<div class="uk-width-1-1">
					<div class="uk-card uk-card-default uk-card-body uk-padding uk-margin-top uk-padding-remove-top">
						<div class="uk-grid-small uk-child-width-expand@s uk-text-center uk-margin" uk-grid>
						    <div class="uk-padding">
					        	<div class="uk-card uk-card-primary uk-card-body uk-height-small uk-grid-row-collapse uk-padding-remove" uk-grid>
					        		<div class="uk-width-1-1 stats-square-primary-dark">
						        		<a href="#" class="text-white uk-align-left uk-align-center">Răspunsuri totale</a>
						        		<span class="text-white uk-align-right uk-align-center">100%</span>
					        		</div>
					        			
					        		<div class="uk-width-1-1 stats-square-primary uk-text-left uk-padding-remove">
					        			<span class="uk-padding-small" uk-icon="icon: commenting; ratio: 3"></span>
					        			<h1 class="uk-align-right uk-padding-small"><?echo $answers_count;?></h1>
					        		</div>
					        		<div class="uk-width-1-1 stats-square-primary-light">
					        			<a href="#" class="text-white uk-align-left">Vezi mai mult..</a>
					        		</div>
				        		</div>
						    </div>
						    <div class="uk-padding">
					        	<div class="uk-card uk-card-primary uk-card-body uk-height-small uk-grid-row-collapse uk-padding-remove" uk-grid>
					        		<div class="uk-width-1-1 stats-square-primary-dark">
						        		<a href="#" class="text-white uk-align-left uk-align-center">Nr. de întrebări</a>
						        		<span class="text-white uk-align-right uk-align-center"></span>
					        		</div>
					        			
					        		<div class="uk-width-1-1 stats-square-primary uk-text-left uk-padding-remove">
					        			<span class="uk-padding-small" uk-icon="icon: question; ratio: 3"></span>
					        			<h1 class="uk-align-right uk-padding-small"><?echo $question_count;?></h1>
					        		</div>
					        		<div class="uk-width-1-1 stats-square-primary-light">
						        		<a href="../solve/?id=<?echo $quiz_id;?>" class="text-white uk-align-left">Vezi mai mult..</a>
					        		</div>
				        		</div>
						    </div>
						    <div class="uk-padding">
					        	<div class="uk-card uk-card-primary uk-card-body uk-height-small uk-grid-row-collapse uk-padding-remove" uk-grid>
					        		<div class="uk-width-1-1 stats-square-primary-dark">
						        		<a href="#" class="text-white uk-align-left uk-align-center">Participanți</a>
						        		<span class="text-white uk-align-right uk-align-center"></span>
					        		</div>
					        			
					        		<div class="uk-width-1-1 stats-square-primary uk-text-left uk-padding-remove">
					        			<span class="uk-padding-small" uk-icon="icon: users; ratio: 3"></span>
					        			<h1 class="uk-align-right uk-padding-small"><?echo $participants_count;?></h1>
					        		</div>
					        		<div class="uk-width-1-1 stats-square-primary-light">
						        		<a  href="#modal-participants" class="text-white uk-align-left" uk-toggle>Vezi mai mult..</a>
					        		</div>
				        		</div>
						    </div>
						</div>
					</div>
				</div>
				<div class="uk-width-1-3">
					<div class="uk-card uk-card-default">
					    <div class="uk-card-header">
					        <div class="uk-grid-small uk-flex-middle" uk-grid>
					            <div class="uk-width-auto">
					                <span class="uk-margin-small-right uk-text-muted" uk-icon="icon: calendar; ratio: 2"></span>
					            </div>
					            <div class="uk-width-expand">
					                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-muted">Activitate recentă</h3>
					            </div>
					        </div>
					    </div>
					    <div class="uk-card-body uk-padding-remove">
					        <ul class="uk-list uk-list-divider">
					        	<?
					        	$sqlsp=$db->prepare("SELECT qz_user_answers.user_id, qz_users.user_first_name, qz_users.user_last_name, qz_users.user_name, qz_users.user_type,
					        						 qz_user_answers.answer_date
					        						 FROM qz_user_answers 
					        						 LEFT JOIN qz_users ON qz_users.user_id=qz_user_answers.user_id
					        						 WHERE quiz_id=?
					        						 GROUP BY qz_user_answers.user_id
					        						 ORDER BY qz_user_answers.answer_date DESC
					        						 LIMIT 6");
								$sqlsp->execute(array($quiz_id));
					        	while($p=$sqlsp->fetch()){
					        		if($p['user_first_name'] == "" && $p['user_last_name']== ""){
					        			$user_name = $p['user_name'];
					        		} else {
					        			$user_name = $p['user_first_name'].' '.$p['user_last_name'];
					        		}
					        		if($p['user_type'] == 2){
					        			$user_name = 'Guest #'.$p['user_id'];
					        		}
					        		?>
							    <li class="uk-padding-small">
							    	<div class="stats-event-item">
							    		<div>
							    			<p class="uk-margin-remove-bottom"><a class="uk-text-bold uk-text-success" href="../user/?id=<?echo $p['user_id'];?>"><?echo $user_name;?></a> a trimis un raspuns nou.</p>
							    		</div>
							    		<div class="uk-text-muted">
							    			<span class="uk-margin-small-right" uk-icon="icon: clock; ratio: 0.6"></span></span><label class="uk-text-meta"><?echo date('H:i - d M, Y', $p['answer_date']);?></label>
							    		</div>
							    	</div>
							    </li>
							    <?}?>
							</ul>
					    </div>
					    <div class="uk-card-footer">
						    <?if($participants_count == 0) { ?>
						    	<h5>Nu s-a înregistrat nici o activitate recentă.</h5>
						    <?} elseif($participants_count>6){?>
					        	<a class="uk-button uk-button-text" href="#modal-activity" uk-toggle>Vezi mai mult..</a>
					        <?}?>
					    </div>
					</div>
				</div>
				<div class="uk-width-2-3">
					<div class="uk-card uk-card-default">
					    <div class="uk-card-header">
					        <div class="uk-grid-small uk-flex-middle" uk-grid>
					            <div class="uk-width-auto">
					                <span class="uk-margin-small-right uk-text-muted" uk-icon="icon: clock; ratio: 2"></span>
					            </div>
					            <div class="uk-width-expand">
					                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-muted">Cronologie răspunsuri</h3>
					            </div>
					        </div>
					    </div>
					    <div class="uk-card-body">
					        <canvas id="meuGrafico"></canvas>
					    </div>
					</div>
				</div>
				<div class="uk-width-2-3">
					<div class="uk-card uk-card-default">
					    <div class="uk-card-header">
					        <div class="uk-grid-small uk-flex-middle" uk-grid>
					            <div class="uk-width-auto">
					                <span class="uk-margin-small-right uk-text-muted" uk-icon="icon: users; ratio: 2"></span>
					            </div>
					            <div class="uk-width-expand">
					                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-muted">Participanți</h3>
					            </div>
					        </div>
					    </div>
					    <div class="uk-card-body">
					        <table class="uk-table uk-table-hover uk-table-divider">
							    <thead>
							        <tr>
							            <th>#</th>
							            <th>Nume</th>
							            <th>Scor</th>
							            <th class="uk-text-right">Data participării</th>
							        </tr>
							    </thead>
							    <tbody>
							    <?$sqlsp=$db->prepare("SELECT qz_user_answers.user_id, qz_users.user_first_name, qz_users.user_last_name, qz_users.user_name, qz_users.user_type,
					        						 qz_user_answers.answer_date, qz_scores.score_value
					        						 FROM qz_user_answers 
					        						 LEFT JOIN qz_users ON qz_users.user_id=qz_user_answers.user_id
					        						 LEFT JOIN qz_scores ON qz_users.user_id=qz_scores.user_id
					        						 WHERE qz_user_answers.quiz_id=? AND qz_scores.quiz_id=?
					        						 GROUP BY qz_user_answers.user_id
					        						 ORDER BY qz_user_answers.answer_date DESC
					        						 LIMIT 5");
								$sqlsp->execute(array($quiz_id, $quiz_id));
								$i=0;
					        	while($p=$sqlsp->fetch()){
					        		$i++;
					        		if($p['user_first_name'] == "" && $p['user_last_name']== ""){
					        			$user_name = $p['user_name'];
					        		} else {
					        			$user_name = $p['user_first_name'].' '.$p['user_last_name'];
					        		}
					        		if($p['user_type'] == 2){
					        			$user_name = 'Guest #'.$p['user_id'];
					        		}
					        		?>
							        <tr>
							        	<td><?echo $i;?></td>
							            <td><?echo $user_name;?></td>
							            <td><?echo $p['score_value'];?>/100</td>
							            <td class="uk-text-right"><?echo date('d/M/Y - H:i', $p['answer_date']);?></td>
							        </tr>
							        <?}?>
							    </tbody>
							</table>
					    </div>
					    <div class="uk-card-footer">
					        <a href="#modal-participants" class="uk-button uk-button-text" uk-toggle>Vezi mai mult..</a>
					    </div>
					</div>
				</div>
				<div class="uk-width-1-3">
					<div class="uk-card uk-card-default">
					
					</div>
				</div>
				<div class="uk-width-1-1 uk-height-small">
				</div>
				<!--
				<div class="uk-card uk-card-default uk-card-body uk-width-2-4">
					
				</div>
				<div class="uk-card uk-card-default uk-card-body uk-width-1-4">
					
				</div>
				-->
			</div>
			</div>
		 </div>
	</div>
	
	<!-- MODALS -->
	<div id="modal-activity" uk-modal>
	    <div class="uk-modal-dialog">
	        <button class="uk-modal-close-default" type="button" uk-close></button>
	        <div class="uk-modal-header">
	            <div class="uk-grid-small uk-flex-middle" uk-grid>
		            <div class="uk-width-auto">
		                <span class="uk-margin-small-right uk-text-muted" uk-icon="icon: calendar; ratio: 2"></span>
		            </div>
		            <div class="uk-width-expand">
		                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-muted">Istoric activitate</h3>
		            </div>
		        </div>
	        </div>
	        <div class="uk-modal-body uk-padding-remove">
	            <ul class="uk-list uk-list-divider">
		        	<?
		        	$sqlsp=$db->prepare("SELECT qz_user_answers.user_id, qz_users.user_first_name, qz_users.user_last_name, qz_users.user_name, qz_users.user_type,
		        						 qz_user_answers.answer_date
		        						 FROM qz_user_answers 
		        						 LEFT JOIN qz_users ON qz_users.user_id=qz_user_answers.user_id
		        						 WHERE quiz_id=?
		        						 GROUP BY qz_user_answers.user_id
		        						 ORDER BY qz_user_answers.answer_date DESC");
					$sqlsp->execute(array($quiz_id));
		        	while($p=$sqlsp->fetch()){
		        		if($p['user_first_name'] == "" && $p['user_last_name']== ""){
		        			$user_name = $p['user_name'];
		        		} else {
		        			$user_name = $p['user_first_name'].' '.$p['user_last_name'];
		        		}
		        		if($p['user_type'] == 2){
		        			$user_name = 'Guest #'.$p['user_id'];
		        		}
		        		?>
				    <li class="uk-padding-small">
				    	<div class="stats-event-item">
				    		<div>
				    			<p class="uk-margin-remove-bottom"><a class="uk-text-bold uk-text-success" href="../user/?id=<?echo $p['user_id'];?>"><?echo $user_name;?></a> a trimis un raspuns nou.</p>
				    		</div>
				    		<div class="uk-text-muted">
				    			<span class="uk-margin-small-right" uk-icon="icon: clock; ratio: 0.6"></span></span><label class="uk-text-meta"><?echo date('H:i - d M, Y', $p['answer_date']);?></label>
				    		</div>
				    	</div>
				    </li>
				    <?}?>
				</ul>
	        </div>
	        <div class="uk-modal-footer uk-text-right">
	            <button class="uk-button uk-button-default uk-modal-close" type="button">Înapoi</button>
	        </div>
	    </div>
	</div>
	<div id="modal-participants" class="uk-modal-full" uk-modal>
	    <div class="uk-modal-dialog">
	        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
	        <div class="uk-grid-collapse uk-child-width-1-1 uk-flex-middle" uk-grid>
	            <div class="uk-padding-large" uk-height-viewport>
	            	<h4>Participanti</h4>
	                <table class="uk-table uk-table-hover uk-table-divider">
					    <thead>
					        <tr>
					            <th>#</th>
					            <th>Nume și prenume</th>
					            <th>Nume de utilizator</th>
					            <th>Adresa de email</th>
					            <th>Telefon</th>
					            <th>Tip utilizator</th>
					            <th>Scor</th>
					            <th class="uk-text-right">Data participării</th>
					        </tr>
					    </thead>
					    <tbody>
					    <?$sqlsp=$db->prepare("SELECT qz_user_answers.user_id, qz_users.user_first_name, qz_users.user_last_name, qz_users.user_name, qz_users.user_type,
			        						 qz_user_answers.answer_date, qz_users.user_email, qz_users.user_phone, qz_scores.score_value
			        						 FROM qz_user_answers 
			        						 LEFT JOIN qz_users ON qz_users.user_id=qz_user_answers.user_id
			        						 LEFT JOIN qz_scores ON qz_users.user_id=qz_scores.user_id
			        						 WHERE qz_user_answers.quiz_id=? AND qz_scores.quiz_id=?
			        						 GROUP BY qz_user_answers.user_id
			        						 ORDER BY qz_user_answers.answer_date ASC");
						$sqlsp->execute(array($quiz_id, $quiz_id));
						$i=0;
			        	while($p=$sqlsp->fetch()){
			        		$i++;
			        		if($p['user_first_name'] == "" && $p['user_last_name']== ""){
			        			$user_name = $p['user_name'];
			        		} else {
			        			$user_name = $p['user_first_name'].' '.$p['user_last_name'];
			        		}
			        		if($p['user_type'] == 2){
			        			$user_name = 'Guest #'.$p['user_id'];
								$user_type = 'Vizitator';
			        		} else {
			        			$user_type = 'Utilizator';
			        		}
			        		?>
					        <tr uk-toggle="target: #toggle-results-<?echo $p['user_id'];?>; animation:  uk-animation-slide-top, uk-animation-slide-bottom">
					        	<td><?echo $i;?></td>
					            <td><?echo $user_name;?></td>
					            <td><?echo $p['user_name'];?></td>
					            <td><?echo $p['user_email'];?></td>
					            <td><?echo $p['user_phone'];?></td>
					            <td><?echo $user_type;?></td>
					            <td><?echo $p['score_value'];?>/100</td>
					            <td class="uk-text-right"><?echo date('d/m/Y - H:i', $p['answer_date']);?></td>
					            
					        </tr>
					        <tr id="toggle-results-<?echo $p['user_id'];?>" class="uk-card uk-card-default uk-card-body uk-margin-small" hidden>
					        	<td colspan="8">
					        		<table class="uk-table uk-table-divider">
					        			<thead>
					        				<th>Întrebare</th>
					            			<th>Răspuns</th>
					        			</thead>
					        			<tbody>
					        				<?
					        				$sqlsqa=$db->prepare("SELECT qz_user_answers.answer_value, qz_user_answers.question_id, qz_questions.question_text, qz_questions.answers_type
					        									 FROM qz_user_answers
					        									 LEFT JOIN qz_questions ON qz_user_answers.question_id=qz_questions.question_id
					        									 WHERE qz_user_answers.user_id=? AND qz_user_answers.quiz_id=?
					        									 ORDER BY qz_user_answers.question_id ASC");
											$sqlsqa->execute(array($p['user_id'], $quiz_id));
											while($qas=$sqlsqa->fetch()){
												$type = $qas['answers_type'];
												$answer_value = '';
												
												//checkbox answers
												if($type==1){
													$values = explode("_", $qas['answer_value']);
													foreach($values as $v){
														$sqlatext=$db->prepare("SELECT answer_description FROM qz_answers WHERE question_id=? AND answer_value=?");
														$sqlatext->execute(array($qas['question_id'], $v));
														$at=$sqlatext->fetch(PDO::FETCH_ASSOC);
														$answer_value .= $at['answer_description'].'<br>';
													}
												}
												
												//radiobox answer
												if($type==2){
													$sqlatext=$db->prepare("SELECT answer_description FROM qz_answers WHERE question_id=? AND answer_value=?");
													$sqlatext->execute(array($qas['question_id'], $qas['answer_value']));
													$at=$sqlatext->fetch(PDO::FETCH_ASSOC);
													$answer_value = $at['answer_description'];
												}
												
												//text answer
												if($type==3){
													$answer_value = $qas['answer_value'];
												}
												?>
					        				<tr>
					        					<td><?echo $qas['question_text'];?></td>
					        					<td><?echo $answer_value;?></td>
					        				</tr>
					        				<?}?>
					        			</tbody>
					        		</table>
					        	</td>
					        </tr>
					        <?}?>
					    </tbody>
					</table>
	            </div>
	        </div>
	    </div>
	</div>
</div>
</body>
<?include("../components/js_scripts.php");?>
<script src="../backbone/chart/dist/Chart.js"></script>
<script>
$(function(){
	$( ".datepicker" ).datepicker({
		dateFormat: "dd-mm-yy",	
		duration: "fast"
	});
	var yearChartData = [];
	//setYearChart(data);
	getYearStats(1);
});

function getYearStats(id){
	$.ajax({
        url:'actions/get_year_stats.php',
        type:'POST',
      	data: {"quiz_id": id},
      	success: function(data) {
      		var stats = JSON.parse(data);
        	setYearChart(stats);
      	} 	
    });
}

// Type, Data e options
function setYearChart(stats){
	var ctx = document.getElementById('meuGrafico').getContext('2d');
	var chart = new Chart(ctx, {
	    // type é o tipo de grafico que será mostrado, nosso caso é bar de barra ou colunas
	    type: 'bar',
	    // config dos dados que será mostra
	    data: {
	        // seria a linha do tempo
	        labels: ['Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun', 'Iul', 'Aug', 'Sep', 'Oct', 'Noi', 'Dec'],
	        // informacoes que vao compor o grafico
	        datasets: [{
	                //label = titulo ou rotulo que ficara no top do grafico
	                label: 'Anul acesta',
	                // data = são os dados que aqui estao fixos, na sua aplicação deve chegar em um formato especifico "Ex: JSON"
	                data: stats,
	                // config a expessura da borda 
	                borderWidth: 2,
	                // cor da borda
	                borderColor: 'rgb(109, 23, 207)',
	                // cor da barra
	                backgroundColor: 'rgb(146, 68, 234)',
	            }
	            
	        ]
	    },
	    // options = seria o cabeçalho, mas tem diversas customizações
	    options: {
	        /* aqui o display do title é true então vai aparecer
	        title: {
	            display: true,
	            // tamanho da font
	            fontSize: 40,
	            // texto do nosso titulo
	            text: 'Relatório Anual'
	        }
	        */
	    } 
	});
}

function editQuizStatus(id, status){
	$.ajax({
        url:'../new/actions/publish_quiz.php',
        type:'POST',
      	data: {"quiz_id": id, "quiz_status": status},
      	success: function(data) {
      		window.location.reload();
      	} 	
    });
}

function setStartDate(id, date){
	$.ajax({
        url:'actions/edit_start_date.php',
        type:'POST',
      	data: {"quiz_id": id, "quiz_start_date": date},
      	success: function(data) {
      		console.log("QUIZ[" + id + "] start date has been set to " + date + ".")
      	} 	
    });
}

function setEndDate(id, date){
	$.ajax({
        url:'actions/edit_end_date.php',
        type:'POST',
      	data: {"quiz_id": id, "quiz_end_date": date},
      	success: function(data) {
      		console.log("QUIZ[" + id + "] end date has been set to " + date + ".")
      	} 	
    });
}

$("form[name='uploader']").submit(function(e) {
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: "actions/upload_quiz_image.php",
        type: "POST",
        data: formData,
        async: false,
        success: function (data) {
        	switch(data){
        		case "success: data_saved": window.location.reload(); break;
        		case "error: file_format": alert("Fisierul incarcat trebuie sa fie o imagine!");
        		default: console.log(data); break;
        	}
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});
function uploadPhoto(){
    $("form[name='uploader']").trigger('submit');
}
</script>
</html>
