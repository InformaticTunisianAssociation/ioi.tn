<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{

	    $slider_section = $this->load->view('home/partials/slider_section',array(),true);

	    $this->data['content'] = $this->load->view('home/index',array(
	        'slider_section' => $slider_section
        ),true);
	    $this->load->view('base/index',$this->data);
	}
}
