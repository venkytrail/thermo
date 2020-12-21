<?php
    class Remotets
    {
        private $conn;
        private $table='remotets';
        public $id;
        public $m_id;
        public $powermode;
        public $info;
        public $dtemp;
        public $stemp;
        public $sstime;
        public function __construct($db)
        {
            $this->conn=$db;
        }
        public function adinfo()
        {
            $query = 'SELECT m.mode as powermode, r.id, r.m_id, r.info, r.dtemp, r.stemp, r.sstime FROM '.$this->table.' r 
            LEFT JOIN mode as m ON r.m_id = m.id'; 
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function dinfo()
        {
            $query = 'SELECT m.mode as powermode, r.id, r.m_id, r.info, r.dtemp, r.stemp, r.sstime FROM '.$this->table.' r 
            LEFT JOIN mode as m ON r.m_id = m.id WHERE r.id=? LIMIT 0,1'; 
            $stmt = $this->conn->prepare($query);
            $stmt->bindparam(1, $this->id);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $this->id=$row['id'];
            $this->m_id=$row['m_id'];
            $this->powermode=$row['powermode'];
            $this->info=$row['info'];
            $this->dtemp=$row['dtemp'];
            $this->stemp=$row['stemp'];
            $this->sstime=$row['sstime'];
            return $stmt;
        }

        public function create()
        {
            $query='INSERT INTO ' . $this->table . ' SET m_id = :m_id, info = :info, dtemp = :dtemp, stemp = :stemp, sstime = :sstime ';
            $stmt = $this->conn->prepare($query);
            $this->m_id = htmlspecialchars(strip_tags($this->m_id));
            $this->info = htmlspecialchars(strip_tags($this->info));
            $this->dtemp = htmlspecialchars(strip_tags($this->dtemp));
            $this->stemp = htmlspecialchars(strip_tags($this->stemp));
            $this->sstime = htmlspecialchars(strip_tags($this->sstime));
            $stmt->bindParam(':m_id', $this->m_id);
            $stmt->bindParam(':info', $this->info);
            $stmt->bindParam(':dtemp', $this->dtemp);
            $stmt->bindParam(':stemp', $this->stemp);
            $stmt->bindParam(':sstime', $this->sstime);
            if($stmt->execute())
            {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        public function update()
        {
            $query='UPDATE ' . $this->table . ' SET m_id = :m_id, info = :info, dtemp = :dtemp, stemp = :stemp, sstime = :sstime WHERE id= :id ';
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->m_id = htmlspecialchars(strip_tags($this->m_id));
            $this->info = htmlspecialchars(strip_tags($this->info));
            $this->dtemp = htmlspecialchars(strip_tags($this->dtemp));
            $this->stemp = htmlspecialchars(strip_tags($this->stemp));
            $this->sstime = htmlspecialchars(strip_tags($this->sstime));
            $stmt->bindParam(':m_id', $this->m_id);
            $stmt->bindParam(':info', $this->info);
            $stmt->bindParam(':dtemp', $this->dtemp);
            $stmt->bindParam(':stemp', $this->stemp);
            $stmt->bindParam(':sstime', $this->sstime);
            $stmt->bindParam(':id', $this->id);
            
            if($stmt->execute())
            {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        public function delete()
        {
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id '; 
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);
            if($stmt->execute())
            {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        

    }

?>