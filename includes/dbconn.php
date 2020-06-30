<?
$servername = "sql301.epizy.com";
$username = "epiz_25734306";
$password = "lk3gf7qz";

try {
  $db = new PDO("mysql:host=$servername;dbname=epiz_25734306_qz", $username, $password);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>