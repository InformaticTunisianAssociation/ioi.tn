<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U extends MY_Controller {

	public function index($user_id)
	{

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
		$this->load->model('participants_model');
		$this->load->model('contestants_model');
		$user = $this->users_model->get($user_id);
		$participants = $this->participants_model->get_where(array('user_id' => $user_id));
		$contestants = $this->contestants_model->get_where(array('user_id' => $user_id));

		//$rank = $this->db->select('', False);
		
		$data = array(
			'firstname' => $user->firstname,
			'lastname' => $user->lastname,
			'franceioi' => $user->franceioi,
			'codeforces' => $user->codeforces,
			'photo' => $user->photo_url,
			'participants' => $participants,
			'constestants' => $contestants
		);

        $this->data['content'] = $this->load->view('me/user', $data,true);
        $this->load->view('base/index',$this->data);
	}
}
