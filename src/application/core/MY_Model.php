<?php
defined('BASEPATH') OR exit('No direct script access allowed');
abstract class MY_Model extends CI_Model
{
    //Must be defined by child class
    protected $table = '';


    protected $primary_key = 'id';


    /**
     * @param $id
     * @return null | object
     */
    public function get($id,$table = null)
    {
        assert($id);
        if(!$table)
            $table = $this->table;
        $query = $this->db->get_where($table,array($this->primary_key => $id));
        if($query->num_rows() > 0)
            return $query->row(); // Returns the first row as an object
        return null;
    }

    public function get_all($table = null)
    {
        if(!$table)
            $table = $this->table;
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_where($params, $table = null)
    {
        if(!$table)
            $table = $this->table;
        $query = $this->db->get_where($table,$params);
        return $query->result();
    }

    public function get_row_where($params,$table = null)
    {
        $rows = $this->get_where($params,$table);
        foreach($rows as $row)
            return $row;
    }

    public function insert($record,$table = null)
    {
        if(!$table)
            $table = $this->table;
        $query = $this->db->insert($table,$record);
        if($this->db->affected_rows() != 1)
            return null;
        return $this->db->insert_id();
    }

    public function update(array $record,$table = null)
    {
        if(!$table)
            $table = $this->table;
        $this->db->where($this->primary_key,$record['id']);
        unset($record['id']);
        $query = $this->db->update($table,$record);
    }

    public function delete(array $record, $table = null)
    {
        if(!$table)
            $table = $this->table;
        $this->db->delete($table,$record);
        return true;
    }
}