<?php
try {
  $DB = new PDO('mysql:host=localhost;dbname=PATRICK_DB;charset=utf8','root','');
} catch (Exception $e) {
  die('Error : ' . $e->getMessage());
}
if (!isset($_COOKIE['PATRICK_cookie_consent'])) {
  setcookie("PATRICK_cookie_consent", "yes", time()+24*60*60*365, null, null, false, true);//Cookie consent
}
?>
