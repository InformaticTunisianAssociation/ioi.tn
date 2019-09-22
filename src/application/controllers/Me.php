<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Me extends User_Controller {

    public function edit_info()
    {

        $this->load->helper('form');

        //LOAD JS/CSS FILES
        //
        $this->load_css('/assets/ioi/css/me/edit_profile.css');
        $this->load_js('/assets/ioi/js/me/edit_profile.js');
        //
        //LOAD JS/CSS FILES

        //If there is post input date then we simply update
        if($this->input->post())
        {
            $firstname	            =  $this->input->post('firstname',true);
            $lastname	            =  $this->input->post('lastname',true);
            $date_birth	            =  $this->input->post('date_birth',true);
            $franceioi	            =  $this->input->post('franceioi',true);
            $codeforces             =  $this->input->post('codeforces',true);
            $phone                  =  $this->input->post('phone',true);
            $school_name            =  $this->input->post('school_name',true);
            $grade                  =  $this->input->post('grade',true);
            $city                   =  $this->input->post('city',true);
            $state                  =  $this->input->post('state',true);
            $knowledge_level        =  $this->input->post('knowledge_level',true);
            $user_old_password	    =  $this->input->post('old_password',true);
            $user_password	        =  $this->input->post('password',true);
            $user_confirm_password	=  $this->input->post('confirm_password',true);

            $params = array(
                //'firstname' => $firstname,
                //'lastname' => $lastname,
                'date_birth' => $date_birth,
                'franceioi' => $franceioi,
                'codeforces' => $codeforces,
                'phone' => $phone,
                'school_name' => $school_name,
                'grade' => $grade,
                'city' => $city,
                'state' => $state,
                'knowledge_level' => $knowledge_level,
                'user_password' => $user_password, // Will be used in the form validation function and them removed since this object will also be sent to the database (and we only store hashes in the database, not plain text passwords.
                'user_old_password' => $user_old_password ,
                'user_confirm_password' => $user_confirm_password
            );


            //Todo:Validate data

            $this->load->library('form_validation');
            $this->form_validation->set_data($params);

            //$this->form_validation->set_rules('firstname', 'First name', 'required');
            //$this->form_validation->set_rules('lastname', 'Last name', 'required');
            $this->form_validation->set_rules('date_birth', 'Date of birth', 'required');
            $this->form_validation->set_rules('franceioi', 'France IOI', '');
            $this->form_validation->set_rules('codeforces', 'CodeForces', '');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('knowledge_level', 'Knowledge Level', '');
            $this->form_validation->set_rules('school_name', 'School Name', '');
            $this->form_validation->set_rules('grade', 'Grade', '');
            $this->form_validation->set_rules('city', 'City', '');
            $this->form_validation->set_rules('state', 'State', '');


            if($user_old_password or $user_password or $user_confirm_password)
            {
                $this->form_validation->set_rules('user_old_password', 'Current Password', 'callback__valid_password',array(
                    '_valid_password' => 'Your current password is not correct!'
                ));
                $this->form_validation->set_rules('user_password', 'New password', 'min_length[8]');
                $this->form_validation->set_rules('user_confirm_password', 'Confirm new password', 'matches[user_password]');
                $params['has_password'] = true;
            }

            if($this->form_validation->run() == false)
            {
                $toast = array(
                    'toast_text' => trim(preg_replace('/\s+/',' ',validation_errors(" ","<br>"))),
                    'toast_type' => 'danger'
                );
                $query_sting = http_build_query($toast);

                redirect("/me/edit_info?{$query_sting}");

            }

                //$this->error(validation_errors());

            //Now we assume that the data is valid and we simply copy the password if it is given to its appropriate field
            if(isset($params['has_password']) and $params['has_password'] == true)
            {
                $params['password_hash'] = password_hash($params['user_password'], PASSWORD_DEFAULT);
                unset($params['has_password']);
            }
            unset($params['user_password']);
            unset($params['user_old_password']);
            unset($params['user_confirm_password']);

            //Take the photo url if given

            $config['upload_path']          = APPPATH . '../assets/uploads/profile_photos/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;
            $config['file_name']            = $this->get_random_user_profile_photo_name($this->user->username);

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('profile_photo'))
            {
                $data = $this->upload->data();
                $params['photo_url'] = '/assets/uploads/profile_photos/' . $data['file_name'];
            }


            //Take the photo url if given | END


            //Take the passport scan photo url if given

            $config['upload_path']          = APPPATH . '../assets/uploads/scan_photos/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;
            $config['file_name']            = $this->get_random_scan_photo_name($this->user->username);

            $this->upload->initialize($config);

            if ($this->upload->do_upload('passport_photo'))
            {
                $data = $this->upload->data();
                $params['passport_scan_url'] = '/assets/uploads/scan_photos/' . $data['file_name'];

            }



            //Take the passport scan photo url if given | END


            //Add the id of the current user to the array (This is critical or we will update all users data!)
            $params['id'] = $this->user->id;
            assert($params['id']);
            $this->load->model('users_model');
            $this->users_model->update($params);
            $_SESSION['user'] = $this->users_model->get($params['id']);
            $toast = array(
                'toast_text' => 'Great, You have updated your profile, you can now apply in contests <a href="/contest">here</a>',
                'toast_type' => 'success'
            );
            $query_sting = http_build_query($toast);
            redirect(current_url() . '?' . $query_sting);
        }
        $this->data['content'] = $this->load->view('me/edit_profile',array(
            'firstname' => $this->user->firstname,
            'lastname' => $this->user->lastname,
            'email' => $this->user->email,
            'username' => $this->user->username,
            'date_birth' => $this->user->date_birth,
            'phone' => $this->user->phone,
            'codeforces' => $this->user->codeforces,
            'franceioi' => $this->user->franceioi,
            'school_name' => $this->user->school_name,
            'knowledge_level' => $this->user->knowledge_level,
            'city' => $this->user->city,
            'state' => $this->user->state,
            'grade' => $this->user->grade,
            'profile_photo' => $this->user->photo_url,
            'passport_scan_photo' => $this->user->passport_scan_url

        ),true);
        $this->load->view('base/index',$this->data);
    }

    private function get_random_user_profile_photo_name($username)
    {
        //This function generates a random name for the user images
        $file_name = null;
        do
        {
            $file_name =  $username . "_" . sha1(microtime()) . '.jpg';
        }while(file_exists(APPPATH .  '../assets/uploads/profile_photos/'.$file_name));
        //echo $file_name;
        return  $file_name;

    }

    private function get_random_scan_photo_name($username)
    {
        //This function generates a random name for the user images
        $file_name = null;
        do
        {
            $file_name =  $username . "_" . sha1(microtime()) . '.jpg';
        }while(file_exists(APPPATH .  '../assets/uploads/scan_photos/'.$file_name));
        //echo $file_name;
        return  $file_name;

    }

}
