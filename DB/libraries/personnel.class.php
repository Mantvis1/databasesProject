<?php

class personnel {

    private $personnel_table = '';
    private $activity_table = '';
    private $team_table = '';

    public function __construct() {
        $this->activities_table = config::DB_PREFIX . 'veikla';
        $this->personnel_table = config::DB_PREFIX . 'personalas';
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

        $query = "  SELECT {$this->personnel_table}.kodas,
                {$this->personnel_table}.vardas,
                {$this->personnel_table}.pavarde,
                {$this->activities_table}.rusis,
                {$this->team_table}.pavadinimas
		FROM {$this->personnel_table}
                INNER JOIN {$this->activities_table} ON {$this->personnel_table}.paskirtis = {$this->activities_table}.id_Veikla
                INNER JOIN {$this->team_table} ON {$this->team_table}.id = {$this->personnel_table}.fk_Komandakodas 
                ORDER BY {$this->personnel_table}.kodas
                {$limitOffsetString}";
        $data = mysql::select($query);
        return $data;
    }

    public function addNew($data) {
        $query = "INSERT INTO "
                . "`{$this->personnel_table}`"
                . "(`kodas`,"
                . " `vardas`,"
                . " `pavarde`,"
                . " `paskirtis`,"
                . " `fk_Komandakodas`"
                . ") "
                . "VALUES "
                . "({$data['kodas']},"
                . "'{$data['vardas']}',"
                . "'{$data['pavarde']}',"
                . "{$data['paskirtis']},"
                . "{$data['fk_Komandakodas']}"
                . ")";
        mysql::query($query);
        var_dump($query);
    }

    public function getPersonnelById($id) {
        $query = "select * from {$this->personnel_table} where kodas = {$id}";
        $rez = mysql::select($query);
        var_dump($query);
        return $rez[0];
    }

    public function update($data) {
        $query = "UPDATE `personalas` 
            SET 
            `vardas`='{$data['vardas']}',"
                . "`pavarde`='{$data['pavarde']}',"
                . "`paskirtis`={$data['paskirtis']},"
                . "`fk_Komandakodas`={$data['fk_Komandakodas']} "
                . "WHERE kodas = {$data['kodas']}";
        mysql::query($query);
    }
    
    public function remove($id){
        $query = "DELETE FROM {$this->personnel_table} WHERE kodas={$id}";
        mysql::query($query);
    }
    
    public function isIdExists($id){
        $query ="SELECT COUNT(kodas) as cnt FROM {$this->personnel_table} WHERE kodas={$id}";
        $rez = mysql::select($query);
        return $rez[0]['cnt'];
    }
    
    public function getPersonelListWithActivities($id){
        $query ="SELECT personalas.vardas, personalas.pavarde, veikla.rusis
    FROM personalas
    INNER join komanda ON personalas.fk_Komandakodas = komanda.id
    INNER JOIN veikla ON personalas.paskirtis = veikla.id_Veikla WHERE komanda.id ={$id}";
        $rez = mysql::select($query);
        return $rez;
    }

}
