<?php
// TODO: prepare the database connection
require 'config.php';

class Database
{
        private $pdo;

        public function __construct($dbhost, $dbname, $dbuser, $dbpwd)
        {
                try {
                        $dsn = "mysql:host=$dbhost;dbname=$dbname";
                        $dboptions = array(
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                        );

                        $this->pdo = new PDO($dsn, $dbuser, $dbpwd, $dboptions);
                } catch (PDOException $e) {
                        die("Something went wrong : " . $e->getMessage());
                }
        }

        public function executeQuery($query, $params = array())
        {
                $stmt = $this->pdo->prepare($query);
                $stmt->execute($params);
                return $stmt;
        }
}

?>
