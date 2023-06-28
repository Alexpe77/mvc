<?php
// TODO: prepare the database connection
        $dbHost = 'localhost';
        $dbName = 'becode';
        $dbUser = 'root';
        $dbPwd = '';

try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPwd);
        
        $stmt = $pdo->query('SELECT id, title, description, publish_date FROM article');
        $rawArticles = $stmt->fetchAll(PDO::FETCH_ASSOC , PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully.";
} catch (PDOException $e) {
        echo "Something went wrong : " . $e->getMessage();
        exit();
}
?>