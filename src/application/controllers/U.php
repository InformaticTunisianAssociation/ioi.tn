<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U extends MY_Controller {

	public function index($user_id)
	{
		$this->load->model('users_model');
		$this->load->model('participants_model');
		$this->load->model('contestants_model');
		$user = $this->users_model->get($user_id);
		$participants = $this->participants_model->get_where(array('user_id' => $user_id));
		$contestants = $this->contestants_model->get_where(array('user_id' => $user_id));

		$data = array(
			'firstname' => $user->firstname,
			'lastname' => $user->lastname,
			'franceioi' => $user->franceioi,
			'codeforces' => $user->codeforces,
			'photo' => $user->photo_url,
			'participants' => $participants,
			'constestants' => $contestants
		);
		$this->load->view('user', $data);
		//echo ;
	}
}
