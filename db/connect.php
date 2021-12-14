<?php
//----------------------------------------try ile xeta yoxlama ve yazdirma---------------------------------------------
try {
  $db = new PDO('mysql:host=localhost;dbname=register_data', 'root', 'root');
} catch (PDOException $error) {
  echo $error->getMessage();
}
?>


