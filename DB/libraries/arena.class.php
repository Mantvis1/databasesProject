<?php
class arena{
    private $arenas_table = '';
    
    public function __construct() {
        $this->arenas_table = config::DB_NAME.'arena';
    }
    
    public function getArenasByID($id){
        $query = "SELECT * FROM `{$this->arenas_table}` WHERE `id`='{$id}'";
        $data = mysql::select($query);
        return $data[0];
    }
    
    public function  getAllArenas(){
        $query = "select * from `{$this->arenas_table}`";
        $data = mysql::select($query);
        return data;
    }
}
?>