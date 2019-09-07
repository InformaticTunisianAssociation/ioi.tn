<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trainings_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'trainings';
    }

    public function enroll($user_id,$training_id)
    {
        $this->insert(array(
            'user_id' => $user_id,
            'training_id' => $training_id,
        ),'participants');
    }

    public function is_enrolled($user_id,$training_id)
    {
        $enrollment = $this->get_row_where(array(
            'user_id' => $user_id,
            'training_id' => $training_id
        ),'participants');
        if($enrollment)
            return true;
        else
            return false;
    }

    public function get_where($params, $table = null)
    {
        $this->db->select('participants.*, trainings.title, trainings.starts_at, trainings.location');
        $this->db->join('trainings','trainings.id = participants.training_id','inner');
        $this->db->where($params);
        return $this->db->get('participants')->result();
    }

}