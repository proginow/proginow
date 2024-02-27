<?php

namespace App\Models;


class Model{
    public $table;

    private $db;

    public function __construct(){
        $this->db = $GLOBALS['db'];
    }

    public function insert($datas){
        return $this->db->insert($this->table,$datas)==1;
    }

    public function select($items='*',$sql=''){
        if(not_empty($sql)) $sql = ' '.$sql;

        return $this->db->select('SELECT '.$items.' FROM '.$this->table.$sql);
    }
    
    public function _select($sql=''){
        return $this->select('*',$sql);
    }
    
    public function exist($sql=''){
        return not_empty($this->select('*','WHERE '.$sql));
    }

    public function update($datas,$where){
        return $this->db->update($this->table,$datas,$where)==1;
    }

    public function delete($where){
        return $this->db->delete($this->table,$where)==1;
    }

    public function __destruct(){
        unset($this->db);
    }
}

?>
