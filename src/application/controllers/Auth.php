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
        //$this->load_css('/assets/study/css/auth/register.css');
        //$this->load_js('/assets/study/js/auth/register.js');
        //
        //LOAD JS/CSS FILES
        //$this->load->view('signup/index');

        $this->data['header'] = null;
        $this->data['footer'] = null;
        $this->data['content'] = $this->load->view('auth/register',array(
            'site_name' => $this->settings_model->get('site_name')
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
            redirect('/');
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
        //Todo: add input validation here here (Hint: use input validation library of codeigniter)
        $firstname = $this->input->post('firstname',true);
        $lastname = $this->input->post('lastname',true);
        $username = $this->input->post('username',true);
        $email = $this->input->post('email',true);
        $password = $this->input->post('password',true);
        $password_confirmation = $this->input->post('password_confirmation',true);
        $phone = $this->input->post('phone',true);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First name', 'required');
        $this->form_validation->set_rules('lastname', 'Last name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('phone', 'Phone number', 'required');

        if($this->form_validation->run() == false)
        {
            echo json_encode(array(
                'retulst' => 'failure',
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
            'phone' => $phone
        ));
        if(!$user_id)
        {
            echo json_encode(array(
                'retulst' => 'failure',
                'error' => 'Error, verify your input and that user!'
            ));
            return false;
        }

        $user = $this->users_model->get($user_id);
        assert($user);
        //user does exist so we log him in, we store his info in the session
        $_SESSION['user'] = $user;
        echo json_encode(array(
            'result' => 'success', //Could be success or failure
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

        $email_config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_port' => '2525',
            'smtp_user' => 'apikey',
            'smtp_pass' => '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',
            'charset' => 'utf8',
            'mailtype' => 'html',
            'wordwrap' => TRUE
        );

        $this->email->initialize($email_config);
        $this->email->from('no_reply@vipay.tn', 'Study.tn');
        $this->email->to($user->email);
        //Generate a random reset code and associate it to the user
        $reset_code = uniqid();

        $this->users_model->update(array(
            'id' => $user->id,
            'password_reset_code' => $reset_code,
        ));

        $reset_link = base_url("auth/change_password?" . http_build_query(array(
                'reset_code' => $reset_code,
                'user_id' => $user->id
            )));
        $message = $this->load->view('auth/email_reset_1',array(
            'reset_link' => $reset_link
        ),true);


        $this->email->subject('Study.tn Account password reset');
        $this->email->message($message);
        $this->email->send();



        echo json_encode(array(
            'error' => null,
            'result' => "We sent an email to your inbox!",
            'reset_link' => $reset_link
        ));
    }



    public function reset()
    {

        //LOAD JS/CSS FILES
        //
        $this->load_css('/assets/study/css/auth/reset.css');
        $this->load_js('/assets/study/js/auth/reset.js');
        //
        //LOAD JS/CSS FILES

        //if user is logged in then get him out of here
        if(isset($this->user->id))
            redirect(base_url());


        $this->data['header'] = '';
        $this->data['footer'] = '';
        $this->data['content'] = $this->load->view('auth/reset',array(
            'site_name' => $this->settings_model->get('site_name')
        ),true);
        $this->load->view('base/index',$this->data);
    }

    //This displays the page to change your password
    public function change_password()
    {

        //LOAD JS/CSS FILES
        //
        $this->load_css('/assets/study/css/auth/change_password.css');
        $this->load_js('/assets/study/js/auth/change_password.js');
        //
        //LOAD JS/CSS FILES

        $user_id = $this->input->get('user_id',true);
        $reset_code = $this->input->get('reset_code',true);
        if(!$user_id || !$reset_code)
            redirect(base_url());

        $user = $this->users_model->get($user_id);
        if(!$user)
            redirect(base_url());

        if($user->password_reset_code != $reset_code)
            redirect(base_url());

        $this->data['header'] = '';
        $this->data['footer'] = '';
        $this->data['content'] = $this->load->view('auth/change_password',array(
            'user_id' => $user_id,
            'reset_code' => $reset_code
        ),true);
        $this->load->view('base/index',$this->data);
    }

    //This do the change of your password

    public function do_change_password()
    {
        $user_id = $this->input->post('user_id',true);
        $reset_code = $this->input->post('reset_code',true);
        if(!$user_id || !$reset_code)
            $this->error('User id and reset codes are required!');

        $user = $this->users_model->get($user_id);
        if(!$user)
            $this->error('User does not exist!');



        $password = $this->input->post('password',true);
        $password_confirmation = $this->input->post('password_confirmation');

        if(!$user->password_reset_code)
            $this->error('You need to reset your password first!');

        if($user->password_reset_code != $reset_code)
            $this->error('Link you used is not valid, please <a href="/auth/reset">reset your account again!</a>');

        if($password != $password_confirmation)
            $this->error('Passwords do not match!');

        //At this point, we can safely change the password

        $this->users_model->update(array(
            'id' => $user_id,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'password_reset_code' => uniqid() //This to prevent user from resetting twice with the same link
        ));

        echo json_encode(array(
            'error' => null,
            'result' => 'Password has been updated, <a href="/login">Login now with your new password!</a>',
        ));

    }
}
