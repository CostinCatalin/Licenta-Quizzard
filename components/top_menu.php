<nav class="uk-navbar-container quiz-top-navbar" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
        	<li class="uk-margin-large-left">
        		<a href="http://quizzard.epizy.com/"><img src="../backbone/img/short-logo.jpg" alt="2020 QUIZZARD LOGO" id="mainLogo"></a>
			</li>
			<li class="uk-margin-top">
				<div class="uk-search-quiz">
	        		<div class="uk-width-1-1">
					    <form class="uk-search uk-search-default" action="GET">
					        <span uk-search-icon></span>
					        <input class="uk-search-input" type="search" placeholder="Caută pe Quizzard">
					    </form>
					</div>
				</div>
			</li>
        </ul>
    </div>
    <div class="uk-navbar-center">
    	<ul class="uk-navbar-nav uk-padding-remove">
    		<!--
    		<li class="quiz-top-menu-item uk-height-expand"><a href="http://quizzard.epizy.com/dashboard/"><span class="uk-margin-small-right uk-padding-small-to" uk-icon="icon: home; ratio: 2"></span></a></li>
            <li class="quiz-top-menu-item"><a href="http://quizzard.epizy.com/quizzes/"><span class="uk-margin-small-right" uk-icon="icon: question; ratio: 1.5"></span></a></li>
            <li class="quiz-top-menu-item"><a href="http://quizzard.epizy.com/history/"><span class="uk-margin-small-right" uk-icon="icon: comments; ratio: 1.5"></span></a></li>
         	-->
         	<a href="http://quizzard.epizy.com/dashboard/" class="uk-button uk-button-primary button-user button-rounded-sm uk-text-bold uk-button-small uk-margin-right" type="button">Pagina principală</a>
         	<a href="http://quizzard.epizy.com/quizzes/" class="uk-button uk-button-primary button-user button-rounded-sm uk-text-bold uk-button-small" type="button">Quizzurile mele</a>
         	<a href="http://quizzard.epizy.com/history/" class="uk-button uk-button-primary button-user button-rounded-sm uk-text-bold uk-button-small uk-margin-left" type="button">Istoric participări</a>
         
         </ul>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            
            <li class="uk-margin-large-right">
            	<a href="#">
					<button class="uk-button uk-button-primary button-user button-rounded uk-button-small" type="button" uk-icon="triangle-down">
						<?if($_SESSION['user']['type'] == 1){
							echo $_SESSION['user']['name'];
						} else {
							echo "GUEST #".$_SESSION['user']['id'];
						}?>
					</button>
				    <div uk-dropdown class="uk-padding-remove">
				        <ul class="uk-nav uk-dropdown-nav uk-padding-small">
				            <?if($_SESSION['user']['type'] == 2){?>
				            	<li class="uk-active"><a href="http://quizzard.epizy.com/register/">Înregistrare</a></li>
				            <?}?>
					            <li class="uk-active"><a href="http://quizzard.epizy.com/user/?id=<?echo $_SESSION['user']['id'];?>">Profil</a></li>
					            <li class="uk-active"><a href="http://quizzard.epizy.com/logout/">Deconectare</a></li>
				        </ul>
				    </div>
            	</a>
            </li>
        </ul>
    </div>
</nav>