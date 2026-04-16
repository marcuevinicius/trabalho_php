<?php
$host = "localhost";
$db = "cadastropdt";
$user = "root";
$pass = "";
try {
    
    // conexão pdo
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

    // ativa erros como exceção (melhor prática)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

?>