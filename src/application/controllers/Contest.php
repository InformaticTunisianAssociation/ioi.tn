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
            if(!$contest->visible)
                continue;
            //Convert time to a different format(Change duration formatting in the model)
            $hours = floor($contest->duration / 3600);
            $mins = floor($contest->duration / 60 % 60);
            $secs = floor($contest->duration % 60);
            $contest->duration = $timeFormat = sprintf('%02dh %02dm %02ds', $hours, $mins, $secs);

            $contests_html .= $this->load->view('contest/partials/contest_item',array(
                'title' => $contest->title,
                'starts_at' => $contest->starts_at,
                'duration' => $contest->duration,
                'nb_problems' => $contest->nb_problems,
                'optimal_score' => $contest->optimal_score,
                'contest_url' => $contest->contest_url,
                'contest_id' => $contest->id,
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
        $this->load_js('/assets/ioi/js/contest/show.js');
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

        //If contest start date is in the future then don't show the contest link
        if($contest->starts_at > date('Y-m-d H:i:s',time()))
            $contest->contest_url = null;

        //Convert time to a different format (Todo: Change this in the model)
        $hours = floor($contest->duration / 3600);
        $mins = floor($contest->duration / 60 % 60);
        $secs = floor($contest->duration % 60);
        $contest->duration = $timeFormat = sprintf('%02dh %02dm %02ds', $hours, $mins, $secs);

        //Get how many seconds before the contest starts
        $seconds_before_launch = null;
        if($contest->starts_at)
            $seconds_before_launch = strtotime($contest->starts_at) - time();
        if($seconds_before_launch <= 0)
            $seconds_before_launch = null;

        $this->data['content'] = $this->load->view('contest/show',array(
            'id' => $contest->id,
            'title' => $contest->title,
            'description' => $contest->description,
            'starts_at' => $contest->starts_at,
            'duration' => $contest->duration,
            'nb_problems' => $contest->nb_problems,
            'optimal_score' => $contest->optimal_score,
            'contest_url' => $contest->contest_url,
            'is_enrolled' => $is_enrolled,
            'photo_url' => $contest->photo_url,
            'seconds_before_launch' => $seconds_before_launch
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

    public function add() {

        $this->load_css('/assets/ioi/css/contest/show.css');

        $this->load->model('contests_model');


        $this->data['content'] = $this->load->view('contest/add',array(),true);
        $this->load->view('base/index',$this->data);

    }


}
