<?php
define("DB_NAME", 'onenetly_home');
define("DB_USER", 'onenetly_home');
define("DB_PASSWORD", 'AmiMotiur27@');
define("DB_HOST", '207.244.240.126');

function getPDOConnection() {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    $username = DB_USER;
    $password = DB_PASSWORD;

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        return null;
    }
}
?>