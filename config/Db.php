<?php
    class Db
    {
        private $host ="localhost";
        private $un="root";
        private $pwd="";
        private $db="thermo_db";
        private $conn;
        public function con()
        {
            try
            {
                $this->conn=new PDO('mysql:host='.$this->host.';dbname='.$this->db,$this->un,$this->pwd);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $msg="DB Connected";
            }catch(PDOException $e)
            {
            echo 'Connection Failed'.$e->getMessage();
            }
            return $this->conn;
        }
    }
?>