<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contest_management extends Manager_Controller {

    public function index()
    {
        //We will load all the contests
        $this->load->model('contests_model');
        $contests = $this->contests_model->get_all();
        $contests_html = '';
        foreach ($contests as $contest)
        {
            $contests_html .= $this->load->view('contest_management/partials/contest_item',array(
                'title' => $contest->title,
                'starts_at' => $contest->starts_at,
                'duration' => $contest->duration,
                'nb_problems' => $contest->nb_problems,
                'optimal_score' => $contest->optimal_score,
                'contest_url' => $contest->contest_url,
                'contest_id' => $contest->id
            ),true);
        }
        $this->data['content'] = $this->load->view('contest_management/index',array(
            'contests_html' => $contests_html
        ),true);
        $this->load->view('base/index',$this->data);
        
    }

    public function add()
    {
        $this->load->model('contests_model');
        
        if($this->input->post())
        {
            $title  = $this->input->post('title');
            $duration  = $this->input->post('duration');
            $nb_problems  = $this->input->post('nb_problems');
            $optimal_score  = $this->input->post('optimal_score');
            $starts_at  = $this->input->post('starts_at');
            $contest_url  = $this->input->post('contest_url');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('duration', 'Duration', 'required|numeric');
            $this->form_validation->set_rules('nb_problems', 'Nb Problems', 'required|numeric');
            $this->form_validation->set_rules('optimal_score', 'Optimal Score', 'required|numeric');
            $this->form_validation->set_rules('starts_at', 'Starts At', 'required');
            $this->form_validation->set_rules('contest_url', 'Contest URL', 'required');

            if($this->form_validation->run()) {

                $r = array(
                    'title' => $title,
                    'duration' => $duration,
                    'nb_problems' => $nb_problems,
                    'optimal_score' => $optimal_score,
                    'starts_at' => $starts_at,
                    'contest_url' => $contest_url
                );

                $contest = $this->contests_model->insert($r);
                assert($contest);
                redirect('/contest_management');
        
            }


        }
        $this->data['content'] = $this->load->view('contest_management/add',array(

        ),true);
        $this->load->view('base/index',$this->data);

    }


    public function edit($id) {
        $this->load->model('contests_model');
        
        if($this->input->post())
        {
            $title  = $this->input->post('title');
            $duration  = $this->input->post('duration');
            $nb_problems  = $this->input->post('nb_problems');
            $optimal_score  = $this->input->post('optimal_score');
            $starts_at  = $this->input->post('starts_at');
            $contest_url  = $this->input->post('contest_url');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('duration', 'Duration', 'required|numeric');
            $this->form_validation->set_rules('nb_problems', 'Nb Problems', 'required|numeric');
            $this->form_validation->set_rules('optimal_score', 'Optimal Score', 'required|numeric');
            $this->form_validation->set_rules('starts_at', 'Starts At', 'required');
            $this->form_validation->set_rules('contest_url', 'Contest URL');

            if($this->form_validation->run()) {

                $r = array(
                    'id' => $id,
                    'title' => $title,
                    'duration' => $duration,
                    'nb_problems' => $nb_problems,
                    'optimal_score' => $optimal_score,
                    'starts_at' => $starts_at,
                    'contest_url' => $contest_url
                );

                $contest = $this->contests_model->update($r);
                assert($contest);
                redirect('/contest_management');
        
            }


        }
        $contest = $this->contests_model->get($id);
        $this->data['content'] = $this->load->view('contest_management/edit',array(
            'id' => $contest->id,
            'title' => $contest->title,
            'starts_at' => $contest->starts_at,
            'duration' => $contest->duration,
            'nb_problems' => $contest->nb_problems,
            'optimal_score' => $contest->optimal_score,
            'contest_url' => $contest->contest_url,

        ),true);
        $this->load->view('base/index',$this->data);

    }

    public function delete($id) {
        $this->load->model('contests_model');
        $contest = $this->contests_model->delete(array('id' => $id));
        redirect('/contest_management');

    }
}