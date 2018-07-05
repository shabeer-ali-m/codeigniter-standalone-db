<?php

namespace CodeigniterDatabase;

use Evolution\CodeIgniterDB as CI;

/**
 * CodeigniterDatabase
 */
class CodeigniterDatabase
{
    public $db;

    private $map;

    private $table;

    public function __construct($config, $map = array())
    {
        $this->db = &CI\DB($config);
        $this->map = $map;
    }

    public function __call($name, $arguments = "*")
    {
        if(method_exists($this->db,$name)) {
            $callback_function = array($this->db, $name);
            call_user_func_array($callback_function, $arguments);
        }
        else if(isset($this->map[$name])) {
            $map = $this->map[$name];
            $this->db->join($map[1],$map[2],"LEFT");
            $this->db->from($map[0]);
            $this->table = $map[0];
        } else {
            $this->table = $name;
            $this->db->from($name);
        }
        return $this;
    }

    public function getRow()
    {
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getRows()
    {
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete()
    {
        $this->db->delete($this->table);
    }
}
