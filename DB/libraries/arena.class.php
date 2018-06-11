<?php

class arena {

    private $arenas_table = '';
    private $zaidzia_table ='';

    public function __construct() {
        $this->arenas_table = config::DB_PREFIX . 'arena';
        $this->zaidzia_table = config::DB_PREFIX. 'zaidzia';
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
					FROM {$this->arenas_table}{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function addNewArena($data) {
        $query = "INSERT INTO `{$this->arenas_table}`(`id`, `pavadinimas`, `talpa`) VALUES ('{$data['id']}','{$data['pavadinimas']}','{$data['talpa']}')";
        $res = mysql::query($query);
    }

    public function removeFromArena($id) {
        $query = "Delete from {$this->arenas_table} where id={$id}";
        mysql::query($query);
    }

    public function updateArenasInfo($data) {
        $query = "UPDATE `{$this->arenas_table}` "
                . "SET "
                . "`pavadinimas` = '{$data['pavadinimas']}',"
                . "`talpa` = {$data['talpa']}"
                . " WHERE `id`={$data['id']}";
        mysql::query($query);
    }

    public function getArenaById($id) {
        $query = "SELECT * FROM {$this->arenas_table} WHERE id={$id}";
        $rez = mysql::select($query);
        return $rez[0];
    }
    
    public function arenasCount($id){
        $query ="SELECT COUNT({$this->zaidzia_table}.fk_Arenaid) as count FROM {$this->zaidzia_table} WHERE {$this->zaidzia_table}.fk_Arenaid = {$id}";
        $rez = mysql::select($query);
        return $rez[0]['count'];
    }
    
    public function idCount($id){
        $query = "SELECT COUNT({$this->arenas_table}.id) as cnt FROM {$this->arenas_table} WHERE id = {$id}";
        $rez = mysql::select($query);
        return $rez[0]['cnt'];
    }
    
    public function elementCount(){
        $query = "SELECT COUNT(id) as count FROM {$this->arenas_table}";
        $rez = mysql::select($query);
        return $rez[0]['count'];
    }
}

?>