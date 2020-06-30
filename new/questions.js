/*
 * ANSWERS TYPE => [text, radiobox, checkbox]
 */

//Just an example
/*
var questionsArray = [{
  "id": 1,
  "text": "Care este marca ta preferata de masini?",
  "answer_type": "radiobox",
  "answers": [ "Ford", "BMW", "Fiat" ]
}, {
  "id": 2,
  "text": "Ce iti place sa mananci dimineata?",
  "answer_type": "checkbox",
  "answers": [ "Banane", "Portocale", "Mere" ]
}, {
  "id": 3,
  "text": "Cum o cheama pe mama ta?",
  "answer_type": "text",
  "answers": ["ex.: Ana"]
}];

var questionsPanel = $("#questions-content-panel");


$( document ).ready(function() {
    for (var i = 0; i < questionsArray.length; i++) {
		//console.log(questionsArray[i]);
		addQuestionToDom(questionsArray[i]);
	}
});
*/
var questionsPanel = $("#questions-content-panel");
var questionCount = 0;

$( document ).ready(function() {
	//$("div[id^=question-panel-").each(function() {
	//}
    
});
function addQuestion(quiz_id){
	$.ajax({
        url:'actions/add_question.php',
        type:'POST',
      	data: {"quiz_id": quiz_id},
      	success: function(data) {
        	addQuestionToDom(data);
      	} 
    });
}
function addQuestionToDom(questionId){
	domId =  $("div[id^=question-panel-").length+1;
	questionsPanel.append(
		'<div class="uk-panel uk-margin-top" id="question-panel-'+ domId +'">' +
        	'<div class="uk-card uk-card-default uk-width-1-1">' +
			    '<div class="uk-card-body">' +
			    	'<div uk-grid>' +
				        '<div class="uk-width-1-2">' +
				            '<input id="question-text-'+ domId +'" onchange="editQuestion('+ questionId +', this.value)" class="uk-input uk-form-width-large uk-width-1-1" type="text" value="" placeholder="Întrebare">' +
				        '</div>' +
				        '<div class="uk-width-1-2">' +
					        '<label class="uk-form-label" for="form-stacked-select"></label>' +
					        '<div class="uk-form-controls" id="question-select-panel-'+ domId +'">' +
					            	'<select class="uk-select question-select" onchange="changeQuestionType('+ questionId +', '+ domId +', this);" id="answers-type-' + domId + '">' +
					                	'<option selected value="text">Răspuns text</option>' +
					                	'<option value="radiobox">Un singur răspuns</option>' +
					                	'<option value="checkbox">Răspunsuri multiple</option>' +
					            	'</select>' +
					        '</div>' +
					    '</div>' +
					    '<div>'  +
					    	'<div class="uk-form-controls" id="answer-list-'+ domId +'">' +
					            
					        '</div>' +
					    '</div>' +
					    '<div class="uk-width-1-1">' +
					        '<a id="add-answer-to-question-'+ domId +'" onclick="addAnswer('+ questionId +', '+ domId +');" class="uk-button uk-button-text">Adaugă răspuns</a>' +
				        '</div>' +
			        '</div>' +
			    '</div>' +
			    '<div class="uk-card-footer">' +
			    	'<div class="uk-clearfix">' +
					    '<div class="uk-float-right">' +
					       	'<a onclick="duplicateQuestion('+ questionId +')"  uk-icon="copy"  uk-tooltip="title: Duplicați întrebarea; pos: top"></a>' +
					       	'<a onclick="removeQuestion('+ questionId +', '+ domId +')"  uk-icon="trash" uk-tooltip="title: Ștergeți întrebarea; pos: top"  class="uk-margin-left"></a>' +
					    '</div>' +
					    '<div class="uk-float-left">' +
					    	'<a onclick="previewQuestion('+ questionId +', '+ domId +')" class="uk-button uk-button-text">Alege răspunsul corect</a>' +
					    '</div>' +
					'</div>' +
			    '</div>' +
			'</div>' +
        '</div>'
	);
	$("#add-answer-to-question-"+domId).hide();
	$("html, body").animate({ scrollTop: $(document).height() }, 500);
	questionCount++;
}



function changeQuestionType(id, domId, elem){
	type = elem.value;
	$.ajax({
        url:'actions/edit_question_type.php',
        type:'POST',
      	data: {"question_id": id, "question_type": type},
      	success: function(data) {
      		if(data == "success"){
      			//clear answer section
      			$("#answer-list-"+domId).empty();
      			
      			console.log("Updated Question[" + id + "] successfully.");
      			if(elem.value == "text"){
					$("#add-answer-to-question-"+domId).hide();
				} else {
					$("#add-answer-to-question-"+domId).show();
				}
      		} else {
      			console.log("Error while updating Question[" + id + "]");
      		}
        	
      	} 	
    });
}

function addAnswer(question_id, domId){
	$.ajax({
        url:'actions/add_answer.php',
        type:'POST',
      	data: {"question_id": question_id},
      	success: function(data) {
      		var answer = JSON.parse(data);
        	addAnswerToDom(answer.id, domId, answer.value);
      	} 	
    });
}
function addAnswerToDom(answerId, domId, value){
	var answerList = $("#answer-list-"+domId);
	var answerType = $( "#answers-type-"+domId).val();
	var answerValue = value;
	
	if(answerType == "radiobox"){
		answerList.append(
			'<label class="uk-margin-small-top" id="answer-label-'+domId+'-'+answerValue+'">' +
			'<input class="uk-radio uk-margin-small-top uk-margin-small-right" value="' + answerValue +'" type="radio" name="question_'+ domId +'">' +  
			'<div class="uk-inline uk-margin-small-top">' +
			'<a class="uk-form-icon uk-form-icon-flip" onclick="removeAnswer('+ answerId +', '+ domId +',' + answerValue +')" uk-icon="icon: close"></a>' +
			'<input id="answer-text-q' + domId +'-a' + answerValue + '" onchange="editAnswer('+ answerId +', this.value)" class="uk-input uk-form-blank uk-form-width-large" type="text" placeholder="Răspuns">' +
			'</div><br></label>' 
		);
		
	} else if(answerType == "checkbox"){
		answerList.append(
			'<label id="answer-label-'+domId+'-'+answerId+'">' +
			'<input class="uk-checkbox uk-margin-small-top uk-margin-small-right" value="' + answerValue +'" name="question_'+ domId +'" type="checkbox">' +
			'<div class="uk-inline uk-margin-small-top">' +
			'<a class="uk-form-icon uk-form-icon-flip" onclick="removeAnswer('+ answerId +', '+ domId +',' + answerId +')" uk-icon="icon: close"></a>' +
			'<input id="answer-text-q' + domId +'-a' + answerId + '" class="uk-input uk-form-blank uk-form-width-large" onchange="editAnswer('+ answerId +', this.value)" type="text" placeholder="Răspuns">' +
			'</div><br></label>' 
		);
	}
}

function editAnswer(id, value){
	$.ajax({
        url:'actions/edit_answer.php',
        type:'POST',
      	data: {"answer_id": id, "answer_description": value},
      	success: function(data) {
      		if(data == "success"){
      			console.log("Answer[" + id + "] successfully modified.");
      		} else {
      			console.log("Error while updating Answer[" + id + "]");
      		}
        	
      	} 	
    });
}

function editQuestion(id, value){
	$.ajax({
        url:'actions/edit_question.php',
        type:'POST',
      	data: {"question_id": id, "question_description": value},
      	success: function(data) {
      		if(data == "success"){
      			console.log("Question[" + id + "] successfully modified.");
      		} else {
      			console.log("Error while updating Question[" + id + "]");
      		}
        	
      	} 	
    });
}

function removeQuestion(id, domId){
	$.ajax({
        url:'actions/remove_question.php',
        type:'POST',
      	data: {"question_id": id},
      	success: function(data) {
      		if(data == "success"){
      			$("#question-panel-"+domId).remove();
      		} else {
      			console.log("Error while removing Question[" + id + "]");
      		}
        	
      	} 	
    });
    
}

function removeAnswer(id, domId, value){
	$.ajax({
        url:'actions/remove_answer.php',
        type:'POST',
      	data: {"answer_id": id},
      	success: function(data) {
      		if(data == "success"){
      			$("#answer-label-"+domId+"-"+value).hide();
      			console.log("Answer[" + id + "] successfully removed.");
      		} else {
      			console.log("Error while removing Answer[" + id + "]");
      		}
      	} 	
    });
}

function duplicateQuestion(id){
	$.ajax({
        url:'actions/duplicate_question.php',
        type:'POST',
      	data: {"question_id": id},
      	success: function(data) {
      		if(data == "success"){
      			location.reload();
      		} else {
      			console.log(data);
      		}
      	} 	
    });
}

function previewQuestion(questionId, domId){
	var modalView = $("#question-modal-preview");
	var questionText = $("#question-text-"+domId).val();
	var answerType = $( "#answers-type-"+domId).val();
	var modalBody = $("#question-preview-body");
	
	$("#save-correct-answer").off("click"); //clear save event
	modalBody.empty(); //clear body
	
	
	$.ajax({
        url:'actions/get_answer.php',
        type:'POST',
      	data: {"question_id": questionId, "answer_type": answerType},
      	success: function(data) {
      		var answer = JSON.parse(data);
      		console.log(answer);
      		
      		if(answerType == "text"){
      			if(answer.value == null) answer.value = ""; 
				modalBody.append(
					'<div class="uk-margin">' +
						'<input class="uk-input uk-form-success uk-form-width-large" value="' + answer.value +'" type="text" placeholder="Răspunsul corect" id="question-text-answer-'+ domId +'">' +
					'</div>'
				);
			} else if(answerType == "radiobox"){
				var radios = '';
				//for each answer of this question
				$("input[name=question_"+ domId +"]").each(function() {
					var checked = '';
					if(this.value == answer.value){
						checked = 'checked';
					}
					
					radios +=  '<label class="radio-label"><input class="uk-radio" ' + checked + ' value="' + this.value + '" type="radio" name="question-answer-'+ domId +'"> ' + $("#answer-text-q"+domId+"-a"+this.value).val() +'</label><br>';
				});
				
				modalBody.append(
					'<div class="uk-margin">' +
		       			'<div class="uk-form-controls">' +
							radios +
						'</div>' +
					'</div>'
				);
				
			} else if(answerType == "checkbox"){
				var correctAnswers =  answer.value.split("_");
				var checks = '';
				//for each answer of this question
				$("input[name=question_"+ domId +"]").each(function() {
					parent_id = $(this).parent().attr('id');
					answer_id = parent_id.split("-")[3];
					
					var checked = '';
					if(correctAnswers.includes(this.value)){
						checked = 'checked';
					}
					checks +=  '<label class="radio-label"><input ' + checked +' class="uk-checkbox" value="' + this.value + '" type="checkbox" name="question-answer-'+ domId +'"> ' + $("#answer-text-q"+domId+"-a"+answer_id).val() +'</label><br>';
				});
				
				modalBody.append(
					'<div class="uk-margin">' +
		       			'<div class="uk-form-controls">' +
							checks +
						'</div>' +
					'</div>'
				);
			}
      	} 	
    });
	
	
	//add save event
	$("#save-correct-answer").click(function() { 
		saveCorrectAnswer(questionId, domId, answerType);
	});
	
	$("#question-preview-title").html(questionText);
	UIkit.modal(modalView).show();
}

function saveCorrectAnswer(id, domId, answerType){
	switch(answerType){
		case "text":
			value = $("#question-text-answer-"+domId).val();
			
			//add a new correct answer
			$.ajax({
		        url:'actions/add_answer.php',
		        type:'POST',
		      	data: {"question_id": id, "answer_value": value},
		      	success: function(data) {
		      		var answer = JSON.parse(data);
		        	editCorrectAnswer(id, answer.id, answerType);
		      	} 	
		    });
		    break;
		case "radiobox":
			value = $("input[name=question-answer-"+ domId +"]:checked").val();
			editCorrectAnswer(id, value, answerType);
			break;
		case "checkbox":
			value = '';
			$("input:checkbox[name=question-answer-"+ domId +"]:checked").each(function() {
				value += $(this).val() + "_";
			});
			
			value = value.substring(0, value.length - 1);
			editCorrectAnswer(id, value, answerType);
			break;
		default: 
			console.log("Error in answer type");
			break;
	}
}

function editCorrectAnswer(questionId, answerId, answerType){
	$.ajax({
        url:'actions/edit_correct_answer.php',
        type:'POST',
      	data: {"question_id": questionId, "answer_id": answerId, "question_type": answerType},
      	success: function(data) {
      		if(data == "success"){
      			console.log("Successfully changed correct Answer["+answerId+"] for Question["+questionId+"]");
      			UIkit.modal($("#question-modal-preview")).hide();
      		} else {
      			console.log(data);
      		}
      	} 	
    });
}

function editTitle(id, value){
	$.ajax({
        url:'actions/edit_title.php',
        type:'POST',
      	data: {"quiz_id": id, "quiz_title": value},
      	success: function(data) {
      		if(data != "success"){
      			console.log(data);
      		}
      	} 	
    });
}

function editDescription(id, value){
	$.ajax({
        url:'actions/edit_description.php',
        type:'POST',
      	data: {"quiz_id": id, "quiz_description": value},
      	success: function(data) {
      		if(data != "success"){
      			console.log(data);
      		}
      	} 	
    });
}

function editQuizType(id, elem){
	var type = elem.value;
	$.ajax({
        url:'actions/edit_quiz_type.php',
        type:'POST',
      	data: {"quiz_id": id, "quiz_type": type},
      	success: function(data) {
      		if(data != "success"){
      			console.log(data);
      		}
      	} 	
    });
}

function publishQuiz(id, status){
	$.ajax({
        url:'actions/publish_quiz.php',
        type:'POST',
      	data: {"quiz_id": id, "quiz_status": status},
      	success: function(data) {
      		window.location.reload();
      	} 	
    });
}
