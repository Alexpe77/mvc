<?php
// TODO: prepare the database connection

class Database
{
        private $dbhost;
        private $dbname;
        private $dbuser;
        private $dbpwd;

        public function __construct(string $dbhost = 'localhost', string $dbname = 'becode', string $dbuser = 'root', string $dbpwd = '')
        {
                $this->dbhost = $dbhost;
                $this->dbname = $dbname;
                $this->dbuser = $dbuser;
                $this->dbpwd = $dbpwd;
        }

        public function getConnection() {

                try {
                        $connect = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpwd);
                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        return $connect;
                    
                } catch (PDOException $e) {
                        die("Connection failed : " . $e->getMessage());
                }
        
        }
}

?>