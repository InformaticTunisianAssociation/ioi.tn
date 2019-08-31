<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contest extends MY_Controller {

	public function index()
	{
        //We will load all the contests
        $this->load->model('contests_model');
        $contests = $this->contests_model->get_all();
        $contests_html = '';
        foreach ($contests as $contest)
        {
            $contests_html .= $this->load->view('contest/partials/contest_item',array(
                'title' => $contest->title,
                'starts_at' => $contest->starts_at,
                'duration' => $contest->duration,
                'nb_problems' => $contest->nb_problems,
                'optimal_score' => $contest->optimal_score,
                'contest_url' => $contest->contest_url,
            ),true);
        }
        $this->data['content'] = $this->load->view('contest/index',array(
            'contests_html' => $contests_html
        ),true);
        $this->load->view('base/index',$this->data);
	}

    public function show($contest_id = null)
    {


        if(!$contest_id)
            show_404();

        //LOAD JS/CSS FILES
        //
        $this->load_css('/assets/ioi/css/contest/show.css');
        //$this->load_js('/assets/ioi/js/me/edit_profile.js');
        //
        //LOAD JS/CSS FILES

        //Extract contest from the database

        $this->load->model('contests_model');
        $contest = $this->contests_model->get($contest_id);
        if(!$contest)
            show_404();

        $is_enrolled = false;
        if(isset($this->user->id))
            $is_enrolled = $this->contests_model->is_enrolled($this->user->id,$contest_id);

        $this->data['content'] = $this->load->view('contest/show',array(
            'id' => $contest->id,
            'title' => $contest->title,
            'starts_at' => $contest->starts_at,
            'duration' => $contest->duration,
            'nb_problems' => $contest->nb_problems,
            'optimal_score' => $contest->optimal_score,
            'contest_url' => $contest->contest_url,
            'is_enrolled' => $is_enrolled
        ),true);
        $this->load->view('base/index',$this->data);
    }

    public function apply($contest_id = null)
    {

        //User must be logged in to access this page
        if(!isset($this->user->id))
            redirect('/login');

        if(!$contest_id)
            show_404();
        $this->load->model('contests_model');

        $contest = $this->contests_model->get($contest_id);
        if(!$contest)
            show_404();
        //Make sure that the user is not already applied


        if($this->contests_model->is_enrolled($this->user->id,$contest->id))
            redirect("contest/show/{$contest_id}");

        $this->contests_model->enroll($this->user->id,$contest->id);
        redirect("contest/show/{$contest_id}");
    }



}
