<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <title>Sign in - Quizzard</title>
    <?include("../components/css_style.php");?>

</head>

<body>
	<div class="uk-container uk-background-muted uk-width-1-1" uk-height-viewport="expand: true">
		<div class="uk-position-center">
			
			<div class="uk-grid-collapse uk-child-width-expand@s uk-text-center uk-margin-large-top" uk-grid>
				
			    <div class="uk-width-2-3">
			        <div class="uk-background-default uk-padding-large uk-text-center uk-height-1-1">
			        	<h2 class="uk-text-bold uk-text-primary">Autentifică-te în Quizzard</h2>
			        	<div class="uk-margin-small-top">
			        		<a href="" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
							<a href="" class="uk-icon-button  uk-margin-small-right" uk-icon="facebook"></a>
							<a href="" class="uk-icon-button" uk-icon="google-plus"></a>
			        	</div>
			        	<p class="uk-margin-medium-top uk-text-small uk-text-muted">sau folosește adresa ta de email:</p>
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
							            <span class="uk-form-icon" uk-icon="icon: lock"></span>
							            <input id="user-password" class="uk-input" type="password" placeholder="Parola">
							        </div>
							    </div>
							    <ul class="uk-list uk-link-text">
								    <li><a class="uk-text-bold" href="#">Ți-ai uitat parola?</a></li>
								</ul>
								
								<div class="uk-margin uk-child-width-1-1 uk-text-danger">
								    <div id="uk-alert-text"></div>
								</div>
							    <button type="button" onclick="loginUser();" class="uk-button uk-button-primary button-rounded uk-margin-top">AUTENTIFICARE</button>
							</form>
						</div>
			        </div>
			    </div>
			    <div class="uk-width-1-3">
			        <div class="uk-background-primary container-overlay uk-padding-large uk-text-center uk-light uk-height-1-1">
			        	<div class="uk-margin-large-top">
							<h2 class="uk-text-bold">Bun venit, prietene!</h2>
							<p class="uk-margin-top uk-text-small">Folosește datele tale pentru acces complet la platforma noastră</p>
							<button type="button" onclick="location.href='../register/';" class="uk-button button-rounded button-transparent uk-margin-large-top">ÎNREGISTRARE</button>
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>
</body>
<?include("../components/js_scripts.php");?>
<script type="text/javascript">
function loginUser(){
	//reset form ui
	$("#user-name").removeClass("uk-form-danger");
	$("#user-password").removeClass("uk-form-danger");
	alertText("");
	
	var user_name = $("#user-name").val();
	var user_password = $("#user-password").val();
	
	var regLettersNumbers = /^[a-z0-9]+$/i;
	
	if(!regLettersNumbers.test(user_name) || user_name.length < 5){
		$("#user-name").addClass("uk-form-danger");
		alertText("Numele dvs. poate să conțină doar litere si cifre.");
		return;
	}
	
	if(!regLettersNumbers.test(user_password) || user_password.length < 6){
		$("#user-password").addClass("uk-form-danger");
		alertText("Parola dvs. poate să conțină doar litere si cifre.");
		return;
	}
	
	$.ajax({
        url:'actions/login_user.php',
        type:'POST',
      	data: {"user_name": user_name, "user_password": user_password},
      	success: function(data) {
        	if(data == "login: success"){
        		window.location.href = "http://quizzard.epizy.com/dashboard/";
        	} else if(data == "login: wrong"){
        		$("#user-name").addClass("uk-form-danger");
        		$("#user-password").addClass("uk-form-danger");
        		alertText("Numele sau parola greșită.");
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
