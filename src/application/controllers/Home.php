<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{

		var_dump($_SESSION);

	    $slider_section = $this->load->view('home/partials/slider_section',array(),true);
	    $service_box = $this->load->view('home/partials/service_box',array(),true);
		$portfolio_section = $this->load->view('home/partials/portfolio_section',array(),true);
		$counter_section = $this->load->view('home/partials/counter_section',array(),true);
		$feature_box = $this->load->view('home/partials/feature_box',array(),true);
		$image_block = $this->load->view('home/partials/image_block',array(),true);
		$team_section = $this->load->view('home/partials/team_section',array(),true);
		$parallax_section = $this->load->view('home/partials/parallax_section',array(),true);
		$testimonial_section = $this->load->view('home/partials/testimonial_section',array(),true);
		$clients_section = $this->load->view('home/partials/clients_section',array(),true);
	
	    $this->data['content'] = $this->load->view('home/index',array(
			'slider_section' => $slider_section,
			'service_box' => $service_box,
			'portfolio_section' => $portfolio_section,
			'counter_section' => $counter_section,
			'feature_box' => $feature_box,
			'image_block' => $image_block,
			'team_section' => $team_section,
			'parallax_section' => $parallax_section,
			'testimonial_section' => $testimonial_section,
			'clients_section' => $clients_section,
			'username' => $this->user->username
		
        ),true);
	    $this->load->view('base/index',$this->data);
	}
}
