<?php

class teamStats {

    private $teams_table = '';
    private $teamStats_table = '';
    private $content_table ='';

    public function __construct() {
        $this->teamStats_table = config::DB_PREFIX . 'komandine_statistika';
        $this->teams_table = config::DB_PREFIX . 'komanda';
        $this->content_table = config::DB_PREFIX. 'rungtynes';
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
                    {$this->teamStats_table}.pataikytos_baudos,
                    {$this->teamStats_table}.mestos_baudos,
                    {$this->teamStats_table}.baudu_taiklumas_procentais,
                    {$this->teamStats_table}.pataikyti_dvitaskiai,
                    {$this->teamStats_table}.mesti_dvitaskiai,
                    {$this->teamStats_table}.dvitaskiu_taiklumas_procentais,
                    {$this->teamStats_table}.mesti_triktaskiai,
                    {$this->teamStats_table}.tritaskiu_taiklumas_procentais,
                    {$this->teamStats_table}.rezultatyvus_perdavimai,
                    {$this->teamStats_table}.atkovoti_kamuoliai,
                    {$this->teamStats_table}.blokai,
                    {$this->teamStats_table}.klaidos,
                    {$this->teamStats_table}.perimti_kamuoliai,
                    {$this->teamStats_table}.isprovokuotos_prazangos,
                    {$this->teams_table}.pavadinimas,
                    {$this->content_table}.kodas
                    FROM {$this->teamStats_table}
                    INNER JOIN {$this->teams_table} ON {$this->teams_table}.id={$this->teamStats_table}.fk_Komandakodas
                    INNER JOIN {$this->content_table} ON {$this->content_table}.kodas={$this->teamStats_table}.fk_Rungtyneskodas
                    {$limitOffsetString}";
        $data = mysql::select($query);
        return $data;
    }

}

?>