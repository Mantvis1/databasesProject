<?php

class history {

    private $history_table = '';
    private $team_table = '';

    public function __construct() {
        $this->history_table = config::DB_PREFIX . 'istorija';
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
        $query = "  SELECT 
                {$this->history_table}.id,
                   {$this->history_table}.metai,
                   {$this->history_table}.uzimta_vieta,
                    {$this->history_table}.varzybu_kiekis,
                    {$this->team_table}.pavadinimas
                    FROM {$this->history_table} 
                    inner join {$this->team_table}
                    on {$this->history_table}.fk_Komandakodas={$this->team_table}.id order by {$this->history_table}.id {$limitOffsetString} ";
        $data = mysql::select($query);
        return $data;
    }

    public function insertNew($data) {
        $query = "INSERT INTO `{$this->history_table}`"
                . "("
                . "`id`,"
                . " `metai`,"
                . " `uzimta_vieta`,"
                . " `varzybu_kiekis`,"
                . " `fk_Komandakodas`"
                . ") VALUES ("
                . "{$data['id']},"
                . "{$data['metai']},"
                . "{$data['uzimta_vieta']},"
                . "{$data['varzybu_kiekis']},"
                . "{$data['fk_Komandakodas']}"
                . ")";
        mysql::query($query);
    }

}
