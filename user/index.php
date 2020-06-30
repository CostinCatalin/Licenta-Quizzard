<?
include("../includes/dbconn.php");
include("../includes/user_checks.php");

//select user data
$user_id = $_GET['id'];
$sqls=$db->prepare("SELECT * FROM qz_users WHERE user_id=?");
$sqls->execute(array($user_id));
$row=$sqls->fetch(PDO::FETCH_ASSOC);

//check if user exists
if($row['user_id'] == ""){
	header("Location: http://quizzard.epizy.com/dashboard/");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>Profile - Quizzard</title>
    <?include("../components/css_style.php");?>
</head>

<body>
<div class="main">
	<div class="top-content uk-background-norepeat uk-background-primary uk-background-cover">
		<!-- TOP MENU -->
		<?include("../components/main_top_menu.php");?>
		<div class="uk-height-large"></div>
		<div class="uk-height-small"></div>
	</div>
	
</div>
<div class="uk-overlay uk-position-top uk-margin-large-top">
	
	<div class="uk-flex-center uk-text-center uk-width-1-1 uk-margin-large" uk-grid>
	    <div class="uk-width-4-5">
	        <div class="uk-card uk-card-default uk-card-body uk-card-hover">
	        	
		        	<div class="uk-width-1-1 uk-margin" uk-grid>
		        		<div class="uk-width-2-3 uk-text-center">
		        			<img src="../backbone/profile_pics/<? if($row['user_profile_img'] != "") echo $row['user_profile_img']; else echo "user.jpg"; ?>" alt="Profile picture" class="profile-image">
		        			<?if($row['user_id'] == $_SESSION['user']['id']){?>
								<form name="uploader" enctype="multipart/form-data">
									<div class="js-upload uk-placeholder uk-text-center">
								    <span uk-icon="icon: cloud-upload"></span>
								    <span class="uk-text-middle">Încarcă imaginea trăgând-o aici sau </span>
										<div uk-form-custom>
									    	<input id="fileSelect" class="file-upload__input" type="file" name="photo" onchange="uploadPhoto();" />
									    	<input name="user-id" type="hidden" value="<?echo $user_id;?>">
									    	<span class="uk-link">selectează una.</span>
									    </div>
									    
									</div>
									<progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>
							  	</form>
		        			<?}?>
		        		</div>
		        		
		        		<div class="uk-width-1-3 uk-text-left">
		        			<?if($row['user_id'] != $_SESSION['user']['id']){?>
		        			<p class="uk-margin-small uk-margin-top font-monospace">Bună tuturor, mă numesc</p>
		        			<h1 class="uk-margin-small uk-text-bold"><?echo $row['user_first_name'].' '.$row['user_last_name'];?></h1>
		        			<div>
		        				<h4 class="uk-text-bold"><?echo $row['user_occupation'];?></h4>
		        			</div>
		        			<div class="uk-margin-medium-bottom">
		        				<p>
		        					<?echo $row['user_description'];?>
		        				</p>
		        			</div>
		        			
		        			<div class="uk-width-1-1 uk-margin-small-bottom">
	        					<span class="uk-text-primary uk-margin-small-right" uk-icon="user"></span> 
	        					<?
	        					if($row['user_name'] != ""){
	        						echo $row['user_name'];
								}
								else {
									echo "Nesetat";
								}
	        					?>
	        				</div>
	        				<div class="uk-width-1-1 uk-margin-small-bottom">
	        					<span class="uk-text-primary uk-margin-small-right" uk-icon="calendar"></span><??>
	        					<?
	        					if($row['user_born_date'] != ""){
	        						echo date('d M, Y', $row['user_born_date']);
								}
								else {
									echo "Nesetat";
								}
	        					?>
	        				</div>
	        				<div class="uk-width-1-1 uk-margin-small-bottom">
	        					<span class="uk-text-primary uk-margin-small-right" uk-icon="phone"></span> 
	        					<?
	        					if($row['user_phone'] != ""){
	        						echo "+(40) ".$row['user_phone'];
								}
								else {
									echo "Nesetat";
								}
	        					?>
	        				</div>
	        				<div class="uk-width-1-1 uk-margin-small-bottom">
	        					<span class="uk-text-primary uk-margin-small-right" uk-icon="mail"></span>
	        					<?
	        					if($row['user_email'] != ""){
	        						echo $row['user_email'];
								}
								else {
									echo "Nesetat";
								}
	        					?>
	        				</div>
	        				<div class="uk-width-1-1 uk-margin-small-bottom">
	        					<span class="uk-text-primary uk-margin-small-right" uk-icon="home"></span>
	        					<?
	        					if($row['user_country'] != ""){
	        						echo $row['user_country'];
								}
								else {
									echo "Nesetat";
								}
	        					?>,  
	        					<?
	        					if($row['user_county'] != ""){
	        						echo $row['user_county'];
								}
								else {
									echo "Nesetat";
								}
	        					?>, 
	        					<?
	        					if($row['user_city'] != ""){
	        						echo $row['user_city'];
								}
								else {
									echo "Nesetat";
								}
	        					?>
	        				</div>
	        				<? }  else {?>
		        			<div class="uk-grid-small" uk-grid>
			        			<div class="uk-width-1-2">
							        <input id="user_first_name" class="uk-input uk-form-large uk-text-bold" type="text" placeholder="Prenume" value="<?echo $row['user_first_name'];?>">
							    </div>
							    <div class="uk-width-1-2">
							        <input id="user_last_name" class="uk-input uk-form-large uk-text-bold" type="text" placeholder="Nume" value="<?echo $row['user_last_name'];?>">
							    </div>
						    </div>
						    <div class="uk-margin">
						    	<input id="user_occupation" class="uk-input uk-text-bold" type="text" placeholder="Ocupație" value="<?echo $row['user_occupation'];?>">
						    </div>
						    <div class="uk-margin">
					            <textarea id="user_description" class="uk-textarea" rows="8" placeholder="Descriere"><?echo $row['user_description'];?></textarea>
					        </div>
					        
					        <div class="uk-margin">
						        <div class="uk-inline uk-width-1-1">
						            <span class="uk-form-icon" uk-icon="icon: user"></span>
						            <input class="uk-input" id="user_name" value="<?echo $row['user_name'];?>" type="text" disabled>
						        </div>
						    </div>
						    <div class="uk-margin">
						        <div class="uk-inline uk-width-1-1">
				    				<label class="datepicker-box" for="datepicker"> Data nașterii
				    				<input type="text" id="user_born_date" value="<?echo date('d-M-Y', $row['user_born_date']);?>" class="datepicker uk-margin-small-top"></label>
				    			</div>
						    </div>
						    <div class="uk-margin">
						        <div class="uk-inline uk-width-1-1">
						            <span class="uk-form-icon" uk-icon="icon: phone"></span>
						            <input id="user_phone" placeholder="Nr. de telefon" class="uk-input" value="<?echo $row['user_phone'];?>" type="text">
						        </div>
						    </div>
						    <div class="uk-margin">
						        <div class="uk-inline uk-width-1-1">
						            <span class="uk-form-icon" uk-icon="icon: mail"></span>
						            <input id="user_email" placeholder="Adresa de email" class="uk-input" value="<?echo $row['user_email'];?>" type="text">
						        </div>
						    </div>
						    <div class="uk-margin">
						        <div class="uk-inline uk-width-1-1">
						            <span class="uk-form-icon" uk-icon="icon: home"></span>
						            <input id="user_country" placeholder="Tara de origine" class="uk-input" value="<?echo $row['user_country'];?>" type="text">
						        </div>
						    </div>
						    <div class="uk-margin">
						        <div class="uk-inline uk-width-1-1">
						            <span class="uk-form-icon" uk-icon="icon: home"></span>
						            <input id="user_county" placeholder="Judet/Regiune" class="uk-input" value="<?echo $row['user_county'];?>" type="text">
						        </div>
						    </div>
						    <div class="uk-margin">
						        <div class="uk-inline uk-width-1-1">
						            <span class="uk-form-icon" uk-icon="icon: home"></span>
						            <input id="user_city" placeholder="Orasul natal" class="uk-input" value="<?echo $row['user_city'];?>" type="text">
						        </div>
						    </div>
						    <div class="uk-margin">
						    	<a id="edit-profile-btn" class="uk-button uk-button-primary uk-margin-top">Salveaza</a>
						    </div>
						    <? } ?>
		        		</div>
		        	</div>
	        </div>
	    </div>
	</div>
</div>
</body>
<?include("../components/js_scripts.php");?>
</html>
<script>
$( function() {
	$( ".datepicker" ).datepicker({
		dateFormat: "d-M-yy",	
		duration: "fast"
	});
});


$('body').on('click', '#edit-profile-btn', function(e){
	var user_id = $("#user_id").val();
	var user_name = $("#user_name").val();
	var user_first_name = $("#user_first_name").val();
	var user_last_name = $("#user_last_name").val();
	var user_description = $("#user_description").val();
	var user_occupation = $("#user_occupation").val();
	var user_born_date = $("#user_born_date").val();
	var user_phone = $("#user_phone").val();
	var user_email = $("#user_email").val();
	var user_country = $("#user_country").val();
	var user_county = $("#user_county").val();
	var user_city = $("#user_city").val();
	
    $.ajax({
        url: 'actions/edit_profile.php',
        type: 'POST',
        data: {"user_name": user_name, "user_first_name": user_first_name, "user_last_name": user_last_name, "user_description": user_description, "user_occupation": user_occupation,
        		"user_born_date": user_born_date, "user_phone": user_phone, "user_email": user_email, "user_country": user_country, "user_county": user_county, "user_city": user_city,
        		"user_id": user_id},
        success: function (data) {
           window.location.reload();
        }
    });
});
$("form[name='uploader']").submit(function(e) {
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: "actions/upload_profile_pic.php",
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

var bar = document.getElementById('js-progressbar');
UIkit.upload('.js-upload', {

    url: '',
    multiple: true,

    beforeSend: function () {
        //console.log('beforeSend', arguments);
    },
    beforeAll: function () {
        //console.log('beforeAll', arguments);
    },
    load: function () {
        //console.log('load', arguments);
    },
    error: function () {
        //console.log('error', arguments);
    },
    complete: function () {
        //console.log('complete', arguments);
    },

    loadStart: function (e) {
        //console.log('loadStart', arguments);

        bar.removeAttribute('hidden');
        bar.max = e.total;
        bar.value = e.loaded;
    },

    progress: function (e) {
        //console.log('progress', arguments);

        bar.max = e.total;
        bar.value = e.loaded;
    },

    loadEnd: function (e) {
        //console.log('loadEnd', arguments);

        bar.max = e.total;
        bar.value = e.loaded;
    },

    completeAll: function () {
        //console.log('completeAll', arguments);

        setTimeout(function () {
            bar.setAttribute('hidden', 'hidden');
        }, 700);
    }

});

function uploadPhoto(){
    $("form[name='uploader']").trigger('submit');
}
</script>
