<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <title>Sign up - Quizzard</title>
    <?include("../components/css_style.php");?>

</head>
<body>
	<div class="uk-container uk-background-muted uk-width-1-1" uk-height-viewport="expand: true">
		<div class="uk-position-center">
			<div class="uk-grid-collapse uk-child-width-expand@s uk-text-center uk-margin-large-top" uk-grid>
				<div class="uk-width-1-3">
			        <div class="uk-background-primary container-overlay uk-padding-large uk-text-center uk-light uk-height-1-1">
			        	<div class="uk-margin-large-top">
							<h2 class="uk-text-bold">Bine ai revenit!</h2>
							<p class="uk-margin-top uk-text-small">Dacă ai deja un cont, te rugăm sa te autentifici folosind datele tale</p>
							<button type="button" onclick="location.href='../login/';" class="uk-button button-rounded button-transparent uk-margin-large-top">AUTENTIFICARE</button>
						</div>
					</div>
			    </div>
			    <div class="uk-width-2-3">
			        <div class="uk-background-default uk-padding-large uk-text-center uk-height-1-1">
			        	<h2 class="uk-text-bold uk-text-primary">Creează un cont nou</h2>
			        	<div class="uk-margin-small-top">
			        		<a href="" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
							<a href="" class="uk-icon-button  uk-margin-small-right" uk-icon="facebook"></a>
							<a href="" class="uk-icon-button" uk-icon="google-plus"></a>
			        	</div>
			        	<p class="uk-margin-medium-top uk-text-small uk-text-muted">sau folosește adresa ta de email pentru înregistrare:</p>
			        	<div class="uk-width-2-3 uk-align-center">
				        	<form>
							    <div class="uk-margin uk-child-width-expand">
							        <div class="uk-inline">
							            <span class="uk-form-icon" uk-icon="icon: user"></span>
							            <input id="user-name" class="uk-input" type="text" placeholder="Nume de utilizator">
							        </div>
							    </div>
							    <div class="uk-margin uk-child-width-expand">
							        <div class="uk-inline">
							            <span class="uk-form-icon" uk-icon="icon: mail"></span>
							            <input id="user-email" class="uk-input" type="text" placeholder="Adresa de email">
							        </div>
							    </div>
							    <div class="uk-margin uk-child-width-expand">
							        <div class="uk-inline">
							            <span class="uk-form-icon" uk-icon="icon: lock"></span>
							            <input id="user-password" class="uk-input" type="password" placeholder="Parola">
							        </div>
							    </div>
							    
							    <div class="uk-margin uk-child-width-1-1 uk-text-danger">
								    <div id="uk-alert-text"></div>
								</div>
							    <button type="button" onclick="registerUser();" class="uk-button uk-button-primary button-rounded uk-margin-top">ÎNREGISTRARE</button>
							</form>
						</div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</body>

<?include("../components/js_scripts.php");?>
<script type="text/javascript">
function registerUser(){
	//reset form ui
	$("#user-name").removeClass("uk-form-danger");
	$("#user-email").removeClass("uk-form-danger");
	$("#user-password").removeClass("uk-form-danger");
	alertText("");
	
	var user_name = $("#user-name").val();
	var user_email = $("#user-email").val();
	var user_password = $("#user-password").val();
	
	var regEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/
	var regLettersNumbers = /^[a-z0-9]+$/i;
	
	if(!regLettersNumbers.test(user_name) || user_name.length < 5){
		$("#user-name").addClass("uk-form-danger");
		alertText("Numele dvs. poate să conțină doar litere si cifre.");
		return;
	}
	
	if(!regEmail.test(user_email) || user_email.length < 8){
		$("#user-email").addClass("uk-form-danger");
		alertText("Adresa de email are un format incorect.");
		return;
	}
	
	if(!regLettersNumbers.test(user_password) || user_password.length < 6){
		$("#user-password").addClass("uk-form-danger");
		alertText("Parola dvs. poate să conțină doar litere si cifre.");
		return;
	}
	
	$.ajax({
        url:'actions/new_user.php',
        type:'POST',
      	data: {"user_name": user_name, "user_email": user_email, "user_password": user_password},
      	success: function(data) {
        	if(data == "success"){
        		window.location.href = "http://quizzard.epizy.com/dashboard/";
        	} else if(data == "already: user"){
        		$("#user-name").addClass("uk-form-danger");
        		alertText("Numele este deja înregistrat.");
        	} else if(data == "already: email"){
        		$("#user-email").addClass("uk-form-danger");
        		alertText("Adresa de email este deja înregistrată.");
        	} else {
        		alertText(data);
        	}
      	} 
    });
}

function alertText(text){
	$("#uk-alert-text").html(text);
}
</script>
</html>
