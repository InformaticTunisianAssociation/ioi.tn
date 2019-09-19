<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U extends MY_Controller {

	public function index($username)
	{
        $this->load->model('trainings_model');
        $this->load->model('contests_model');
        $this->load->model('contestants_model');

		//LOAD JS/CSS FILES
        //
        //$this->load_css('/assets/ioi/css/auth/register.css');
        //$this->load_js('/assets/ioi/js/auth/register.js');
        //
        //LOAD JS/CSS FILES
        //$this->load->view('signup/index');

	    $this->data['header'] = $this->load->view('base/header', array(), true);
		$this->data['footer'] = $this->load->view('base/footer', array(), true);
		
		$this->load->model('users_model');

		$this->load->model('contestants_model');
		$user = $this->users_model->get_row_where(array(
		    'username' => $username
        ));


		//$participants = $this->participants_model->get_where(array('user_id' => $user->id));
		$participations = $this->trainings_model->get_where(array(
            'participants.user_id' => $user->id
        ));

        //$contestants = $this->contestants_model->get_where(array('user_id' => $user->id));
        $competitions = $this->contests_model->get_where(array(
            'contestants.user_id' => $user->id
        ));


        $competitions_html = '';
        foreach ($competitions as $competition)
        {
            $rank = 1;
            $compt_info = $this->contestants_model->get_row_where(array(
                'contest_id' => $competition->contest_id,
                'user_id' => $user->id
            ));

            $score = $compt_info->score;
            $medal = $compt_info->medal;

            $participants = $this->contestants_model->get_where(array(
                'contest_id' => $competition->contest_id
            ));

            foreach($participants as $participant) {
                if($participant->score > $score) {
                    $rank++;
                }
            }
    
            $competitions_html .= $this->load->view('u/partials/competition_item',array(
                'title' => $competition->title,
                'score' => $score,
                'rank' => $rank,
                'medal' => $medal,

            ),true);
        }


		$participations_html = '';
		foreach ($participations as $participation)
        {
            $participations_html .= $this->load->view('u/partials/participation_item',array(
                'title' => $participation->title,
                'starts_at' => $participation->starts_at,
                'location' => $participation->location,
                'role' => $participation->role,

            ),true);
        }


		
		$data = array(
			'firstname' => $user->firstname,
			'lastname' => $user->lastname,
			'franceioi' => $user->franceioi,
			'codeforces' => $user->codeforces,
			'photo_url' => $user->photo_url,
			'participations_html' => $participations_html,
			'competitions_html' => $competitions_html,
            'logged_in' => isset($this->user->id),
            'logged_in_user_id' => isset($this->user->id) ? $this->user->id : null,
            'user_id' => $user->id
		);

        $this->data['content'] = $this->load->view('u/index', $data,true);
        $this->load->view('base/index',$this->data);
	}
}
