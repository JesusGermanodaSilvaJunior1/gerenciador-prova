<?php
$host =  "localhost";
$db = "presidente_dutra";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db" , $user, $pass);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
