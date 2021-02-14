<?php
$db = null;
try {
     $db = new PDO("mysql:host=localhost;dbname=lig;charset=utf8", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>