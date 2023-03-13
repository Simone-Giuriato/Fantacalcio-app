<?php
class League{
    protected $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function createLeague($name, $user_id)
    {
        $sql = "INSERT INTO fantacalcio.league (name, id_trustee, status)
                VALUES ('" . $name . "', " . $user_id . ", 0); ";

        $result = $this->conn->query($sql);
        return $result;
    }
    function getArchiveLeague()
    {
        $sql = "SELECT id, name, id_trustee
        FROM league
        WHERE status=0
        order by name asc;";

        return $sql;
    }

    function checkTrustee($id)
    {
        $sql = "SELECT id_trustee
        FROM league
        where id_trustee = " . $id . " and status=0; ";
        return $sql;
    }
    function getLeagueByTrustee($id_trustee)
    {
        $sql = "SELECT id, name, id_trustee
        FROM league
        where id_trustee = '" . $id_trustee . "' AND status=0;";
        return $sql;
    }
    function getArchiveLeagueMoreDetails()
    {
        $sql = "SELECT l.id, l.name, u.nickname as 'id_trustee'
        FROM league l
        inner join user u on u.id=l.id_trustee
        WHERE status=0
        order by name asc;";
        return $sql;
    }

}
?>