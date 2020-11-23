<?php
$host = '127.0.0.1:3306';
$user = 'root';
$password = 'root';
$db_name = 'test';

$pdo = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8", $user, $password);

$query = "SELECT id, date, text, contacts FROM adverts";

$result = $pdo->query($query);
$data = $result->FetchAll(PDO::FETCH_ASSOC);

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
die();

?>  

// $query = "CREATE TABLE `test`.`adverts` (
//                 `id` INT NOT NULL AUTO_INCREMENT,
//                 `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//                 `text` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
//                 `contacts` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
//                 PRIMARY KEY (`id`))";
// $pdo->query($query);