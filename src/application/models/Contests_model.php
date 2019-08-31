<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contests_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'contests';
    }

    public function enroll($user_id,$contest_id)
    {
        $this->insert(array(
            'user_id' => $user_id,
            'contest_id' => $contest_id
        ),'contestants');
    }

    public function is_enrolled($user_id,$contest_id)
    {
        $enrollment = $this->get_row_where(array(
            'user_id' => $user_id,
            'contest_id' => $contest_id
        ),'contestants');
        if($enrollment)
            return true;
        else
            return false;
    }

    public function get_where($params, $table = null)
    {
        $this->db->select('contestants.*, contests.title');
        $this->db->join('contests','contests.id = contestants.contest_id','inner');
        $this->db->where($params);
        return $this->db->get('contestants')->result();
    }

}