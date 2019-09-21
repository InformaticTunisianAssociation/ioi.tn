<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {



    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_model');
        $this->load->model('users_model');
        //$this->output->enable_profiler(TRUE);

        //LOAD JS/CSS FILES
        //
        //The constructor file means we always load its code in all of the pages of this class
        //$this->load_css('/assets/study/css/auth/constructor.css');
        //$this->load_js('/assets/study/js/auth/constructor.js');
        //
        //LOAD JS/CSS FILES

        //$this->lang->load('auth_lang',$this->language);




    }

    public function login()
	{



        //die(password_hash('12345', PASSWORD_DEFAULT));
        //LOAD JS/CSS FILES
        //
        //$this->load_css('/assets/study/css/auth/login.css');
        //$this->load_js('/assets/study/js/auth/login.js');
        //
        //LOAD JS/CSS FILES

        if(isset($this->user->id)) {
            redirect(base_url());
        }

	    $this->data['header'] = $this->load->view('base/header', array(), true);
	    $this->data['footer'] = $this->load->view('base/footer', array(), true);
	    $this->data['content'] = $this->load->view('auth/login',array(

        ),true);

	    if(isset($_SESSION['redirect_url']))
            $this->set_toast(array(
                'message' => 'Please login to continue.',
                'type' => 'warning'
            ));

	    $this->load->view('base/index',$this->data);
	}

    public function register()
    {


        //LOAD JS/CSS FILES
        // 
        $this->load_css('/assets/ioi/css/auth/register.css');
        $this->load_js('/assets/ioi/js/auth/register.js');
        //
        //LOAD JS/CSS FILES
        //$this->load->view('signup/index');

	    $this->data['header'] = $this->load->view('base/header', array(), true);
	    $this->data['footer'] = $this->load->view('base/footer', array(), true);
        $this->data['content'] = $this->load->view('auth/register',array(
            //'site_name' => $this->settings_model->get('site_name')
        ),true);
        $this->load->view('base/index',$this->data);
    }




	public function do_login()
    {
        //The username could either be username or email address
        //$this->output->enable_profiler(TRUE);
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);
        //Todo: do more XSS filtering and initial validation before calling the database



        $user = null;
        if($username && $password)
            $user = $this->users_model->login($username,$password);


        if($user)
        {

            //user does exist so we log him in, we store his info in the session
            //echo 'correct';
            //die();
            $_SESSION['user'] = $user;



            //Get the redirect url
            $redirect_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : base_url();
            redirect($redirect_url);
        }
        else
        {

            $toast = array(
                'toast_text' => 'Wrong username or password, please verify them or call ' . $this->settings_model->get('phone'),
                'toast_type' => 'danger'
            );
            $query_sting = http_build_query($toast);
            redirect("/login?{$query_sting}");
        }

    }

    public function logout()
    {
        $this->do_logout();
        redirect(base_url());
    }

    public function do_logout()
    {

        if(isset($_SESSION['user']))
        {

            unset($_SESSION['user']);
        }
        redirect(base_url());
    }


    public function do_register()
    {
        $this->load->model('contests_model');
        //Todo: add input validation here here (Hint: use input validation library of codeigniter)
        $firstname = $this->input->post('firstname',true);
        $lastname = $this->input->post('lastname',true);
        $username = $this->input->post('username',true);
        $email = $this->input->post('email',true);
        $password = $this->input->post('password',true);
        //$password_confirmation = $this->input->post('password_confirmation',true);
        $phone = $this->input->post('phone',true);
        $date_birth = $this->input->post('date_birth',true);
        $topro = $this->input->post('topro',true);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First name', 'required');
        $this->form_validation->set_rules('lastname', 'Last name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        //$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('phone', 'Phone number', 'required');
        $this->form_validation->set_rules('date_birth', 'Date of birth', 'required'); // Todo: Adds a regular expression



        if($this->form_validation->run() == false)
        {

            echo json_encode(array(
                'error' => validation_errors()
            ));
            return false;
        }



        $user_id = $this->users_model->insert(array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'email' => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'phone' => $phone,
            'date_birth' => $date_birth
        ));
        if(!$user_id)
        {
            echo json_encode(array(
                'error' => 'Error, User could not be added!'
            ));
            return false;
        }

        $user = $this->users_model->get($user_id);
        assert($user);
        //user does exist so we log him in, we store his info in the session
        $_SESSION['user'] = $user;        
        if( (int) $topro == 1) {
            $contest = $this->contests_model->get(1);
            if(!$contest)
                show_404();
            $this->contests_model->enroll($user_id,$contest->id);
        }
        echo json_encode(array(
            'error' => null, // Will only be used on failure
            'redirect_link' => base_url() //will only be used on success
        ));
    }


    //Todo: test the reset password system
    public function do_reset()
    {
        //if user is logged in then get him out of here
        if(isset($this->user->id))
            redirect(base_url());

        $username = $this->input->post('username',true);
        if(!$username)
            $this->error('Username is required!');


        $user = $this->users_model->get_row_where(array(
            'username' => $username
        ));
        if(!$user)
            $user = $this->users_model->get_row_where(array(
                'email' => $username
            ));

        if(!$user)
            $this->error('User does not exist');

        $this->load->helper('email');
        $this->load->library('email');

        $toast = array(
            'toast_text' => 'You are almost done, add more info about yourself here then click update!',
            'toast_type' => 'success'
        );
        $query_sting = http_build_query($toast);

        echo json_encode(array(
            'error' => null, // Will only be used on failure
            'redirect_link' => "/me/edit_info?{$query_sting}" //will only be used on success
        ));
    }



}
