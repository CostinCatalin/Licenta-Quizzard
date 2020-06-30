<?
include("../includes/user_checks.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>Home - Quizzard</title>
    <?include("components/css_style.php");?>
</head>

<body>
<div class="main">
	<div class="top-content uk-background-norepeat uk-background-primary uk-background-cover">
		<!-- TOP MENU -->
		<?include("components/main_top_menu.php");?>
		<div class="uk-margin-large-top uk-margin-large-bottom uk-text-center">
			<h1 class="uk-text-bold uk-text-white">Creează ușor și rapid quizuri folosind Quizzard.</h1>
			<h4 class="uk-text-bold uk-text-white"><span class="uk-text-bold">150+</span> sondaje, chestionare și teste realizate de utilizatorii acestei platforme.<br>Creează sau răspunde și tu acum.</h4>
			
		</div>
		<nav class="uk-navbar-container uk-margin-large-left uk-margin-large-right uk-margin-large-bottom" uk-navbar>
		    <div class="uk-navbar-left">
		        <div class="uk-navbar-item">
		            <form class="uk-search uk-search-navbar">
		                <span class="uk-margin-left" uk-search-icon></span>
		                <input class="uk-search-input uk-margin-left" type="search" placeholder="Căutare..">
		            </form>
		        </div>
		    </div>
		    <div class="uk-navbar-right">
		        <div class="uk-navbar-item">
		            <button class="uk-button uk-button-primary uk-button-large uk-text-bold">Găsește-mi un Quiz</button>
		        </div>
		    </div>
		</nav>
		<div class="uk-height-small"></div>
	</div>
</div>
</body>
<?include("components/js_scripts.php");?>
</html>
