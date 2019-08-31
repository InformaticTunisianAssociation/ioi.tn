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

}