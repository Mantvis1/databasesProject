<?php

class sponsor {

    private $sponsors_table = '';

    public function __construct() {
        $this->sponsors_table = config::DB_PREFIX . 'remejai';
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
					FROM {$this->sponsors_table}{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function removeSponsor($id) {
        $query = "Delete from {$this->sponsors_table} where id={$id}";
        mysql::query($query);
    }

    public function getById($id) {
        $query = "select * from {$this->sponsors_table} where id={$id}";
        return mysql::select($query)[0];
    }

    public function updateInfo($data) {
        $query = "UPDATE `{$this->sponsors_table}` "
                . "SET "
                . "`pavadinimas` = '{$data['pavadinimas']}',"
                . "`bendra_suma` = {$data['bendra_suma']}"
                . " WHERE `id`={$data['id']}";
        var_dump($query);
        mysql::query($query);
    }

}

?>