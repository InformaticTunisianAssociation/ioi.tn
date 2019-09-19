<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scores extends Manager_Controller {

    public function add()
    {
        $this->load->model('contestants_model');
        
        if($this->input->post())
        {
            $contest_id  = $this->input->post('contest_id');
            $user_id  = $this->input->post('user_id');
            $score  = $this->input->post('score');
            $medal  = $this->input->post('medal');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('contest_id', 'Contest ID', 'required');
            $this->form_validation->set_rules('user_id', 'User ID', 'required');
            $this->form_validation->set_rules('score', 'Score', 'required|numeric');
            $this->form_validation->set_rules('medal', 'Medal', '');

            if($this->form_validation->run()) {

                $r = array(
                    'contest_id' => $contest_id,
                    'user_id' => $user_id,
                    'score' => $score,
                    'medal' => $medal,
                );

                $contestants = $this->contestants_model->insert($r);
                assert($contestants);
                redirect('/scores/add');
        
            }


        }
        $this->data['content'] = $this->load->view('scores/add',array(

        ),true);
        $this->load->view('base/index',$this->data);

    }

}