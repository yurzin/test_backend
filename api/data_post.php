<?php
    $host = '127.0.0.1:3306';
    $user = 'root';
    $password = 'root';
    $db_name = 'test';

    $pdo = new PDO("mysql:host=$host; dbname=$db_name; charset=utf8", $user, $password);
    
    $pdo->exec("SET CHARACTER SET utf8");

      $filename = $_FILES["csv"]["tmp_name"];

      $file = fopen($filename , "r");
      while(($file_open = fgetcsv($file, 10000, ";")) !== FALSE) {
        $text = mb_strimwidth($file_open[0], 0, 200, '...');
        $contacts = mb_strimwidth($file_open[1], 0, 80, '...');
        $stmt = $pdo->prepare("INSERT INTO adverts (text, contacts) VALUES (:text, :contacts)");
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':contacts', $contacts);    
        $stmt->execute();
      }
  fclose($file);    
?>