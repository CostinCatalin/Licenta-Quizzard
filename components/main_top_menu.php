<nav class="uk-navbar-container main-navbar" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
        	<li class="uk-margin-large-left uk-margin-large-right">
        		<a href="http://quizzard.epizy.com/"><img src="../backbone/img/logo_invert.jpg" alt="2020 QUIZZARD LOGO" id="mainLogo"></a>
			</li>
            <li><a href="http://quizzard.epizy.com/dashboard/">Pagina principală</a></li>
            <li><a href="http://quizzard.epizy.com/quizzes/">Quizzurile mele</a></li>
            <li><a href="http://quizzard.epizy.com/history/">Istoric participări</a></li>
        </ul>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
        	<?if(!isset($_SESSION['user']['id'])){?>
            <li><a href="http://quizzard.epizy.com/login/">Autentificare</a></li>
            <li class="uk-margin-large-right">
            	<a href="http://quizzard.epizy.com/login/guest.php">
					<button class="uk-button uk-button-primary button-user button-rounded uk-button-small" type="button">Continuă ca vizitator</button>
            	</a>
            </li>
            <? }  else {?>
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
				            <li class="uk-active"><a href="http://quizzard.epizy.com/user/?id=<?echo $_SESSION['user']['id'];?>">Profil</a></li>
				            <li class="uk-active"><a href="http://quizzard.epizy.com/logout/">Deconectare</a></li>
				        </ul>
				    </div>
            	</a>
        	</li>
            <? } ?>
            
        </ul>
    </div>
</nav>