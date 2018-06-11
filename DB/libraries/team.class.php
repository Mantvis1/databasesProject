<?php

class team {

    private $team_table = '';

    public function __construct() {
        $this->team_table = config::DB_PREFIX . 'komanda';
    }

    public function getBrandList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT *
					FROM {$this->team_table}{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function removeTeam($id) {
        $query = "Delete from {$this->team_table} where id={$id}";
        mysql::query($query);
    }

    public function getTeamById($id) {
        $query = "SELECT * FROM {$this->team_table} WHERE id={$id}";
        $rez = mysql::select($query);
        return $rez[0];
    }

    public function updateTeam($data) {
        $query = "UPDATE `{$this->team_table}` "
                . "SET "
                . "`pavadinimas` = '{$data['pavadinimas']}',"
                . "`biudzetas` = {$data['biudzetas']}"
                . " WHERE `id`={$data['id']}";
        mysql::query($query);
    }
   
    public function getTeams($id){
        $query = "SELECT pavadinimas FROM {$this->team_table} WHERE id ={$id}";
        $rez = mysql::select($query);
        return $rez[0];
    }
}

?>