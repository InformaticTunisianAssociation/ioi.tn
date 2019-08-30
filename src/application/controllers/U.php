<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U extends MY_Controller {




	public function index($user_id)
	{
		$this->load->model('users_model');

		$user = $this->users_model->get($user_id);
		echo $user->role;
	}
}
