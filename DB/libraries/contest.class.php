<?php

class contest {

    private $contest_table = '';
    private $team_table = '';
    private $teamStatics_table = '';

    public function __construct() {
        $this->contest_table = config::DB_PREFIX . 'rungtynes';
        $this->team_table = config::DB_PREFIX . 'komanda';
        $this->teamStatics_table = config::DB_PREFIX . 'komandine_statistika';
    }

    public function getBrandList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT"
                . " {$this->contest_table}.kodas,"
                . " k1.pavadinimas as pav1,"
                . " {$this->contest_table}.rezultatas1,"
                . " k2.pavadinimas as pav2,"
                . " {$this->contest_table}.rezultatas2"
                . " FROM {$this->contest_table} "
                . "INNER JOIN {$this->team_table} k1 ON {$this->contest_table}.fk_Komandaid = k1.id "
                . "INNER JOIN {$this->team_table} k2 ON {$this->contest_table}.fk_Komandaid1 = k2.id "
                . "Order by kodas desc"
                . " {$limitOffsetString}";
        $data = mysql::select($query);
        return $data;
    }

    public function addNew($data) {
        $query = "INSERT INTO `{$this->contest_table}`"
                . "(`kodas`, `rezultatas1`, `rezultatas2`, `fk_Komandaid`, `fk_Komandaid1`)"
                . " VALUES ("
                . "{$data['kodas']},"
                . "{$data['rezultatas1']},"
                . "{$data['rezultatas2']},"
                . "{$data['fk_Komandaid']},"
                . "{$data['fk_Komandaid1']})";
        mysql::query($query);
    }

    public function isIdExists($id) {
        $query = "select count(kodas) as cnt from {$this->contest_table} where kodas={$id}";
        $rez = mysql::select($query);
        return $rez[0]['cnt'];
    }

    public function countOfForgeinkeys($id) {
        $query = "SELECT COUNT({$this->teamStatics_table}.fk_Rungtyneskodas) as cnt"
                . " FROM `{$this->teamStatics_table}` "
                . "WHERE {$this->teamStatics_table}.fk_Rungtyneskodas = {$id}";
        $rez = mysql::select($query);
        return $rez[0]['cnt'];
    }

    public function remove($id) {
        $query = "DELETE FROM {$this->contest_table} WHERE kodas={$id}";
        mysql::query($query);
    }

    public function update($data) {
        $query = "UPDATE `{$this->contest_table}` SET "
                . "`rezultatas1`={$data['rezultatas1']},"
                . "`rezultatas2`={$data['rezultatas2']},"
                . "`fk_Komandaid`={$data['fk_Komandaid']},"
                . "`fk_Komandaid1`={$data['fk_Komandaid1']}"
                . " WHERE kodas = {$data['kodas']}";
        mysql::query($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM `{$this->contest_table}` WHERE kodas = {$id}";
        $rez = mysql::select($query);
        return $rez[0];
    }

}
