<?php

class personalStats {

    private $players_table = '';
    private $personalStats_table = '';

    public function __construct() {
        $this->personalStats_table = config::DB_PREFIX . 'sezono_statistika';
        $this->players_table = config::DB_PREFIX . 'zaidejas';
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
                    {$this->personalStats_table}.metai,
                    {$this->personalStats_table}.pataikytos_baudos,
                    {$this->personalStats_table}.mestos_baudos,
                    {$this->personalStats_table}.baudu_taikumas_procentais,
                    {$this->personalStats_table}.pataikyti_dvitaskiai,
                    {$this->personalStats_table}.mest_dvitaskiai,
                    {$this->personalStats_table}.dvitaskiu_taiklumas_procentais,
                    {$this->personalStats_table}.mesti_tritaskiai,
                    {$this->personalStats_table}.tritaskiu_pataikymas_procentais,
                    {$this->personalStats_table}.rezultatyvus_perdavimai,
                    {$this->personalStats_table}.atkovoti_kamuoliai,
                    {$this->personalStats_table}.blokai,
                    {$this->personalStats_table}.klaidos,
                    {$this->personalStats_table}.perimti_kamuoliai,
                    {$this->personalStats_table}.isprovokuotos_prazangos,
                    {$this->personalStats_table}.effektyvumas,
                    {$this->players_table}.vardas,
                    {$this->players_table}.pavarde
                    FROM {$this->personalStats_table}
                    INNER JOIN {$this->players_table}
                    ON {$this->personalStats_table}.fk_Zaidejaskodas={$this->players_table}.kodas
                    {$limitOffsetString}";
        $data = mysql::select($query);
        return $data;
    }

}

?>