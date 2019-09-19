<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training_management extends Manager_Controller {

    public function index()
    {
        //We will load all the trainings
        $this->load->model('trainings_model');
        $trainings = $this->trainings_model->get_all();
        $trainings_html = '';
        foreach ($trainings as $training)
        {
            $trainings_html .= $this->load->view('training_management/partials/training_item',array(
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
        $this->data['content'] = $this->load->view('training_management/index',array(
            'trainings_html' => $trainings_html
        ),true);
        $this->load->view('base/index',$this->data);
        
    }

    public function add()
    {
        $this->load->model('trainings_model');
        
        if($this->input->post())
        {
            $title  = $this->input->post('title');
            $ends_at  = $this->input->post('ends_at');
            $level  = $this->input->post('level');
            $location  = $this->input->post('location_url');
            $location_url  = $this->input->post('location_url');
            $starts_at  = $this->input->post('starts_at');
            $topic  = $this->input->post('topic');
            $description  = $this->input->post('description');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('ends_at', 'Ends At', 'required');
            $this->form_validation->set_rules('level', 'level', 'required');
            $this->form_validation->set_rules('topic', 'Topic', 'required');
            $this->form_validation->set_rules('starts_at', 'Starts At', 'required');
            $this->form_validation->set_rules('location_url', 'Location URL', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            if($this->form_validation->run()) {

                $r = array(
                    'title' => $title,
                    'ends_at' => $ends_at,
                    'level' => $level,
                    'location' => $location,
                    'location_url' => $location_url,
                    'starts_at' => $starts_at,
                    'topic' => $topic,
                    'description' => $description
                );

                $training = $this->trainings_model->insert($r);
                assert($training);
                redirect('/training_management');
        
            }


        }
        $this->data['content'] = $this->load->view('training_management/add',array(

        ),true);
        $this->load->view('base/index',$this->data);

    }


    public function edit($id) {
        $this->load->model('trainings_model');
        
        if($this->input->post())
        {
            $title  = $this->input->post('title');
            $ends_at  = $this->input->post('ends_at');
            $level  = $this->input->post('level');
            $location  = $this->input->post('location_url');
            $location_url  = $this->input->post('location_url');
            $starts_at  = $this->input->post('starts_at');
            $topic  = $this->input->post('topic');
            $description  = $this->input->post('description');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('ends_at', 'Ends At', 'required');
            $this->form_validation->set_rules('level', 'level', 'required');
            $this->form_validation->set_rules('topic', 'Topic', 'required');
            $this->form_validation->set_rules('starts_at', 'Starts At', 'required');
            $this->form_validation->set_rules('location_url', 'Location URL', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            if($this->form_validation->run()) {

                $r = array(
                    'id' => $id,
                    'title' => $title,
                    'ends_at' => $ends_at,
                    'level' => $level,
                    'location' => $location,
                    'location_url' => $location_url,
                    'starts_at' => $starts_at,
                    'topic' => $topic,
                    'description' => $description
                );

                $training = $this->trainings_model->update($r);
                assert($training);
                redirect('/training_management');
        
            }


        }
        $training = $this->trainings_model->get($id);
        $this->data['content'] = $this->load->view('training_management/edit',array(
            'id' => $training->id,
            'title' => $training->title,
            'ends_at' => $training->ends_at,
            'level' => $training->level,
            'location' => $training->location,
            'location_url' => $training->location_url,
            'starts_at' => $training->starts_at,
            'topic' => $training->topic,
            'description' => $training->description

        ),true);
        $this->load->view('base/index',$this->data);

    }

    public function delete($id) {
        $this->load->model('trainings_model');
        $training = $this->trainings_model->delete(array('id' => $id));
        redirect('/training_management');

    }
}