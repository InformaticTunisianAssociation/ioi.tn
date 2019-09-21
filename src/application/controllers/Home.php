<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{

        //LOAD JS/CSS FILES
        //
        $this->load_css('/assets/ioi/css/home/index.css');
        $this->load_js('/assets/ioi/js/home/index.js');
        //$this->load_js('/assets/ioi/js/me/edit_profile.js');
        //
        //LOAD JS/CSS FILES

        if(isset($_SESSION['redirect_url']))
            $this->set_toast(array(
                'message' => 'Done',
                'type' => 'warning'
            ));

		$this->load->model('settings_model');
        $this->load->model('contests_model');
        $next_contest = $this->contests_model->get_next_contest();
        //Get how many seconds before the contest starts
        //var_dump($next_contest);
        //die();
        $seconds_before_next_contest = null;
        if($next_contest and $next_contest->starts_at)
            $seconds_before_next_contest = strtotime($next_contest->starts_at) - time();
        if($next_contest and $seconds_before_next_contest <= 0)
            $seconds_before_next_contest = null;
        $next_contest_title = null;
        if($next_contest and $next_contest->title)
        {
            $next_contest_title = $next_contest->title;
        }


	    $slider_section = $this->load->view('home/partials/slider_section',array(
	        'contest_title' =>$next_contest_title,
            'seconds_before_next_contest' => $seconds_before_next_contest
        ),true);
	    $service_box = $this->load->view('home/partials/service_box',array(),true);


	    //Extract the portfolio photos (Will be set manually for now)
        $photos = array(
            (object)array(
                'photo_url' => '/assets/images/portfolio/medals_2019.jpg',
                'redirect_url' => '',
                'title' => 'Medals of TOP 2019',
                'category_id' => 2
            ),
            (object)array(
                'photo_url' => '/assets/images/portfolio/baku1.jpg',
                'redirect_url' => '',
                'title' => 'Last day in Baku',
                'category_id' => 1
            ),
            (object)array(
                'photo_url' => '/assets/images/portfolio/nader1.jpg',
                'redirect_url' => '',
                'title' => 'Nader Jemel, IOI Contestant 2019',
                'category_id' => 1
            ),
            (object)array(
                'photo_url' => '/assets/images/portfolio/ioi2019_1.jpg',
                'redirect_url' => '',
                'title' => 'Tunisian Team IOI 2019',
                'category_id' => 1
            ),

        );
        $portfolio_items_html = '';
        foreach($photos as $photo)
        {
            $portfolio_items_html .= $this->load->view('home/partials/portfolio_item',array(
                'photo_url' => $photo->photo_url,
                'redirect_url' => $photo->redirect_url,
                'title' => $photo->title,
                'category_id' => $photo->category_id
            ),true);
        }

        //Extract categories of photos
        $photos_categories = array(
            (object)array(
                'id' => 1,
                'title' => 'IOI'
            ),
            (object)array(
                'id' => 2,
                'title' => 'TOP'
            ),
            (object)array(
                'id' => 3,
                'title' => 'Trainings'
            ),
        );
        $photo_categories_html = '';
        foreach($photos_categories as $photos_category)
        {
            $photo_categories_html .= $this->load->view('home/partials/portfolio_category_item',array(
                'id' => $photos_category->id,
                'title' => $photos_category->title
            ),true);
        }


		$portfolio_section = $this->load->view('home/partials/portfolio_section',array(
		    'portfolio_items_html' => $portfolio_items_html,
            'photo_categories_html' => $photo_categories_html
        ),true);
		$counter_section = $this->load->view('home/partials/counter_section',array(
			'students' => $this->settings_model->get('students'),
			'participations' => $this->settings_model->get('participations'),
			'projects' => $this->settings_model->get('projects'),
			'medals' => $this->settings_model->get('medals'),
		),true);
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
					
        ),true);
	    $this->load->view('base/index',$this->data);
	}
}
