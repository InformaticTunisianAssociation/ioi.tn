<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends MY_Controller {

	public function index()
	{
        //We will load all the trainings
        $this->load->model('trainings_model');
        $trainings = $this->trainings_model->get_all();
        $trainings_html = '';
        foreach ($trainings as $training)
        {
            $trainings_html .= $this->load->view('training/partials/training_item',array(
                'title' => $training->title,
                'starts_at' => $training->starts_at,
                'ends_at' => $training->ends_at,
                'level' => $training->level,
                'description' => $training->description,
                'location' => $training->location,
                'location_url' => $training->location_url,
                'topic' => $training->topic,
                'training_id' => $training->id
            ),true);
        }
        $this->data['content'] = $this->load->view('training/index',array(
            'trainings_html' => $trainings_html
        ),true);
        $this->load->view('base/index',$this->data);
	}

    public function show($training_id = null)
    {


        if(!$training_id)
            show_404();

        //LOAD JS/CSS FILES
        //
        $this->load_css('/assets/ioi/css/training/show.css');
        //$this->load_js('/assets/ioi/js/me/edit_profile.js');
        //
        //LOAD JS/CSS FILES

        //Extract training from the database

        $this->load->model('trainings_model');
        $training = $this->trainings_model->get($training_id);
        if(!$training)
            show_404();

        $is_enrolled = false;
        if(isset($this->user->id))
            $is_enrolled = $this->trainings_model->is_enrolled($this->user->id,$training_id);

        $this->data['content'] = $this->load->view('training/show',array(
            'id' => $training->id,
            'title' => $training->title,
            'starts_at' => $training->starts_at,
            'ends_at' => $training->ends_at,
            'level' => $training->level,
            'description' => $training->description,
            'location' => $training->location,
            'location_url' => $training->location_url,
            'topic' => $training->topic,
            'is_enrolled' => $is_enrolled
        ),true);
        $this->load->view('base/index',$this->data);
    }

    public function apply($training_id = null)
    {

        //User must be logged in to access this page
        if(!isset($this->user->id))
            redirect('/login');

        if(!$training_id)
            show_404();
        $this->load->model('trainings_model');

        $training = $this->trainings_model->get($training_id);
        if(!$training)
            show_404();
        //Make sure that the user is not already applied


        if($this->trainings_model->is_enrolled($this->user->id,$training->id))
            redirect("training/show/{$training_id}");

        $this->trainings_model->enroll($this->user->id,$training->id);
        redirect("training/show/{$training_id}");
    }



}
