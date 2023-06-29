<?php
// TODO: prepare the database connection

class Database
{
        private $pdo;
        private $dbhost;
        private $dbname;
        private $dbuser;
        private $dbpwd;

        public function __construct($dbhost, $dbname, $dbuser, $dbpwd)
        {
                $this->dbhost = $dbhost;
                $this->dbname = $dbname;
                $this->dbuser = $dbuser;
                $this->dbpwd = $dbpwd;

                $dsn = "mysql:host=$dbhost;dbname=$dbname";
                $dboptions = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );

                try {
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

$db = new Database('localhost', 'article', 'root', '' );

?>