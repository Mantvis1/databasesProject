<?php

class player {

    private $players_table = '';
    private $teams_table = '';
    private $personalStats_table = '';

    public function __construct() {
        $this->teams_table = config::DB_PREFIX . 'komanda';
        $this->players_table = config::DB_PREFIX . 'zaidejas';
        $this->personalStats_table = config::DB_PREFIX . 'sezono_statistika';
    }

    public function getBrandList($limit = null, $offset = null) {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }
        /* SELECT zaidejas.vardas, zaidejas.pavarde, k1.pavadinimas as pav, k2.pavadinimas as pav2 from zaidejas 
          INNER JOIN komanda k1 on zaidejas.fk_Komandakodas = k1.id
          INNER JOIN komanda k2 on zaidejas.fk_Komandakodas1 = k2.id; */
        $query = "  SELECT
        {$this->players_table}.kodas,
        {$this->players_table}.vardas,
        {$this->players_table}.pavarde,
        {$this->players_table}.amzius,
        {$this->players_table}.numeris,
        {$this->players_table}.pozicija,
        k1.pavadinimas as priklauso,
        k2.pavadinimas as zaidzia
        FROM {$this->players_table}
        INNER JOIN {$this->teams_table} k1 ON {$this->players_table}.fk_Komandakodas = k1.id
        INNER JOIN   {$this->teams_table} k2 ON {$this->players_table}.fk_Komandakodas1 = k2.id 
        Order By kodas desc
	{$limitOffsetString}";
        $data = mysql::select($query);
        return $data;
    }

    public function getAllTeams() {
        $query = "SELECT "
                . "{$this->teams_table}.pavadinimas"
                . "FROM"
                . "{$this->teams_table}";
        $rez = mysql::select($query);
        return rez;
    }

    public function insertNewPlayer($data) {
        $query = "INSERT INTO `{$this->players_table}"
                . "`(`"
                . "kodas`,"
                . " `vardas`,"
                . " `pavarde`,"
                . " `amzius`,"
                . " `numeris`,"
                . " `pozicija`,"
                . " `fk_Komandakodas`"
                . ", `fk_Komandakodas1`"
                . ")"
                . " VALUES "
                . "("
                . "{$data['kodas']},"
                . "'{$data['vardas']}',"
                . "'{$data['pavarde']}',"
                . "{$data['amzius']},"
                . "{$data['numeris']},"
                . "{$data['pozicija']},"
                . "{$data['fk_Komandakodas']},"
                . "{$data['fk_Komandakodas1']}"
                . ")";
        mysql::query($query);
    }

    public function checkIfPlayerIdExists($id) {
        $query = "select count({$this->players_table}.kodas) as count from {$this->players_table} where kodas = {$id}";
        $rez = mysql::select($query);
        return $rez[0]['count'];
    }

    public function checkIfPlayerExistAsPrivateKey($id) {
        $query = "SELECT COUNT(fk_Zaidejaskodas) as count FROM {$this->personalStats_table} WHERE fk_Zaidejaskodas = {$id}";
        $rez = mysql::select($query);
        return $rez[0]['count'];
    }

    public function deletePlayer($id) {
        $query = "DELETE FROM {$this->players_table} WHERE kodas = {$id}";
        mysql::query($query);
    }

    public function getPlayerById($id) {
        $query = "SELECT * FROM {$this->players_table} where kodas = {$id}";
        $rez = mysql::select($query);
        return $rez[0];
    }

    public function updatePlayersInfo($data) {
        $query = "UPDATE {$this->players_table} SET"
                . " `vardas`='{$data['vardas']}',"
                . "`pavarde`='{$data['pavarde']}',"
                . "`amzius`='{$data['amzius']}',"
                . "`numeris`='{$data['numeris']}',"
                . "`pozicija`='{$data['pozicija']}',"
                . "`fk_Komandakodas`='{$data['fk_Komandakodas']}',"
                . "`fk_Komandakodas1`='{$data['fk_Komandakodas1']}'"
                . " WHERE kodas = '{$data['kodas']}'";
        mysql::query($query);
    }

    public function getPlayerFromTeam($teamID) {
        $query = "SELECT vardas, pavarde, numeris FROM {$this->players_table} WHERE fk_Komandakodas = {$teamID}";
        $rez = mysql::select($query);
        return $rez;
    }

    public function getAllPlayersWithStatstic($id) {
        $query = "
    SELECT
        zaidejas.vardas,
        zaidejas.pavarde,
        sezono_statistika.metai,
        (
            sezono_statistika.pataikytos_baudos + 2 * sezono_statistika.pataikyti_dvitaskiai + 3 * sezono_statistika.pataikyti_tritaskiai
        ) AS pelnytiTaskai,
        (
            sezono_statistika.pataikytos_baudos + (
            sezono_statistika.mestos_baudos - sezono_statistika.pataikytos_baudos
        ) + sezono_statistika.pataikyti_dvitaskiai * 2 +(
            sezono_statistika.mest_dvitaskiai - sezono_statistika.pataikyti_dvitaskiai
        ) + sezono_statistika.pataikyti_tritaskiai * 3 +(
            sezono_statistika.mesti_tritaskiai - sezono_statistika.pataikyti_tritaskiai
        ) + sezono_statistika.rezultatyvus_perdavimai + sezono_statistika.atkovoti_kamuoliai + sezono_statistika.blokai - sezono_statistika.klaidos + sezono_statistika.perimti_kamuoliai + sezono_statistika.isprovokuotos_prazangos
        ) AS eff
    FROM
        komanda
    INNER JOIN zaidejas ON zaidejas.fk_Komandakodas = komanda.id
    RIGHT JOIN sezono_statistika ON sezono_statistika.fk_Zaidejaskodas = zaidejas.kodas
    WHERE komanda.id = {$id}
    ORDER BY sezono_statistika.metai";
    $rez = mysql::select($query);
    return $rez;
    }

}
