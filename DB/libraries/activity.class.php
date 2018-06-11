<?php

class activity {

    private $activities_table = '';

    public function __construct() {
        $this->activities_table = config::DB_PREFIX . 'veikla';
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
					FROM {$this->activities_table}{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function getAllActivities() {
        $query = "Select * FROM {$this->activities_table}";
        mysql::select($query);
    }

    public function getActivityById($id_veikla) {
        $query = "SELECT * FROM {$this->activities_table} WHERE id_Veikla={$id_veikla}";
        $rez = mysql::select($query);
        return $rez[0];
    }

    public function updateActivityInfo($data) {
        $query = "UPDATE `{$this->activities_table}` "
                . "SET "
                . "`rusis` = '{$data['rusis']}'"
                . " WHERE `id_Veikla`={$data['id_Veikla']}";
        mysql::query($query);
    }

    public function remove($id) {
        $query = "Delete from {$this->activities_table} where id_Veikla={$id}";
        mysql::query($query);
    }

}
