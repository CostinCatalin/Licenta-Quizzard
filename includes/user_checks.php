<?
date_default_timezone_set('Europe/Helsinki');
session_start();

if(!isset($_SESSION['user']['id'])){
	header("Location: http://quizzard.epizy.com/login/");
}
?>
