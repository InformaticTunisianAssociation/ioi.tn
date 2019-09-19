<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scores extends Manager_Controller {

    public function update()
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

                //We will update the contestant info
                $new_score = array(
                    'contest_id' => $contest_id,
                    'user_id' => $user_id,
                    'score' => $score,
                    'medal' => $medal,
                );

                //$contestants = $this->contestants_model->insert($r);
                $return  = $this->contests_model->update_score($new_score);
                assert($return);
                redirect('/scores/update');
        
            }


        }
        $this->data['content'] = $this->load->view('scores/update',array(

        ),true);
        $this->load->view('base/index',$this->data);

    }

}