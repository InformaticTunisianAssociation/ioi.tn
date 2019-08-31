<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends User_Controller {

	public function index()
	{

	}

    public function show($training_id = null)
    {


        if(!$training_id)
            show_404();

        //LOAD JS/CSS FILES
        //
        //$this->load_css('/assets/ioi/css/me/edit_profile.css');
        //$this->load_js('/assets/ioi/js/me/edit_profile.js');
        //
        //LOAD JS/CSS FILES

        //Extract training from the database

        $this->load->model('training_model');
        $training = $this->training_model->get($training_id);
        if(!$training_id)
            show_404();


        $this->data['content'] = $this->load->view('training/show',array(
            'title' => $training->title,
            'starts_at' => $training->starts_at,
            'ends_at' => $training->ends_at,
            'level' => $training->level,
            'description' => $training->description,
            'location' => $training->location,
            'location_url' => $training->location_url,
            'topic' => $training->topic,
        ),true);
        $this->load->view('base/index',$this->data);
    }

    public function apply()
    {

    }



}
