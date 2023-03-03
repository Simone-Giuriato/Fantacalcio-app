<?php
class Player{
    protected $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    
}
?>