<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class MY_Controller
 * @property users_model $users_model
 * @property settings_model $settings_model
 */
class MY_Controller extends CI_Controller
{
    protected $is_ajax = false;
    protected $user = null;
    protected $data = array(); //This array will be sent to the main base themes to give them parameters
    protected $language = 'french';


    public function __construct()
    {
        parent::__construct();
        //LOAD SETTINGS MODEL
        $this->load->model('settings_model');
        //LOAD SETTINGS MODEL


        //$this->output->enable_profiler(TRUE);
        //If user is logged in retrieve his profile from the session
        if(isset($_SESSION['user']))
            $this->user = $_SESSION['user'];




        //Load header and footer
        $this->data['header'] = $this->load->view('base/header',array(
            'username' => isset($this->user->id) ? $this->user->username : null
        ),true);
        $this->data['footer'] = $this->load->view('base/footer',array(),true);



        //Load js and css
        $this->init_js_files(); // Files are loaded in the function
        $this->init_css_files(); // Files are loaded in the function
        $this->init_meta_tags(); //Tags are loaded in the function

        //If we have a search query (q) in the search bar add it to the keyword variable so we consider it during the filtering.
        //The keyword will be placed in the views/index.php under the attribute keyword inside the search input field

        //Init toasts
        $this->data['toast'] = null;

        //Assign the user to the data variable
        $this->data['user'] = $this->user;


        //LOAD HEADER
        /*
        $this->data['header'] = $this->load->view('base/header',array(
            'user_id' => $this->user ? $this->user->id : null,
            'user_username' => $this->user ? $this->user->username : null,
            //If we have a search query (q) in the search bar add it to the keyword variable so we consider it during the filtering.
            //The keyword will be placed in the views/base/header.php under the attribute 'keyword' inside the search input field
            'keyword' => $this->input->post('q'),
            'user_role' => isset($this->user->id) ? $this->user->role : null,
            'user_agent_mobile' => $this->agent->is_mobile()
        ),true); */
        //LOAD HEADER | END

        //LOAD FOOTER
        /*
        $this->data['footer'] = $this->load->view('base/footer',array(
            'site_name' => $this->settings_model->get('site_name'),
            'facebook' => $this->settings_model->get('facebook'),
            'instagram' => $this->settings_model->get('instagram'),
            'youtube' => $this->settings_model->get('youtube'),
            'linkedin' => $this->settings_model->get('linkedin'),
            'email' => $this->settings_model->get('email'),
            'phone' => $this->settings_model->get('phone'),
            //'logged_in' => isset($this->user->id)

        ),true);*/
        //LOAD FOOTER | END
    }











    /**
     * @param $msg
     * @param array|null $params [ajax:boolean,redirect_link:string]
     * Returns an error and stops execution,
     * @return false
     */
    protected function error($msg,array $params = null)
    {
        $ajax = true;
        $redirect_link = null;
        if(isset($params))
        {
            if(isset($params['ajax']))
                $ajax = $params['ajax'];
            if(isset($params['redirect_link']))
                $redirect_link = $params['redirect_link'];
        }

        if(!$ajax)
        {
            //Todo: Define an error in the flash data session
            if($redirect_link)
                redirect($redirect_link);

        }

        $response = array(
            'error' => $msg,
            'result' => 'failure' // Will be deprecated soon
        );
        if($redirect_link)
            $response['redirect_link'] = $redirect_link;

        die(json_encode($response));

    }

    /**
     * @param $msg
     * @param array|null $params [ajax:boolean,redirect_link:string]
     * Returns a success and stops execution
     * @return true
     */
    protected function success($msg = null,array $params = null)
    {
        $ajax = true;
        $redirect_link = null;
        if(isset($params))
        {
            if(isset($params['ajax']))
                $ajax = $params['ajax'];
            if(isset($params['redirect_link']))
                $redirect_link = $params['redirect_link'];
        }

        if(!$ajax)
        {
            //Todo: Define a success in the flash data session
            if($redirect_link)
                redirect($redirect_link);

        }

        $response = array(
            'error' => null,
            'result' => $msg ? $msg : "success"
        );
        if($redirect_link)
            $response['redirect_link'] = $redirect_link;

        die(json_encode($response));
    }

    public function change_language()
    {
        $language = $this->input->post('language',true);
        if(!$language)
            $this->error('Language cannot be omitted');
        if($language != 'french' and $language != 'english')
            $this->error('Language is not supported!');
        //If user is signed in, change his language preferences
        if(isset($this->user->id))
        {
            $this->load->model('users_model');
            $this->users_model->update(array(
                'id' => $this->user->id,
                'language' => $language
            ));
            $this->user->language = $language;
            $_SESSION['user'] = $this->user;
        }
        $_SESSION['language'] = $language;
        $this->success('Language changed');
    }

    protected function load_js($url)
    {
        if(!isset($this->data['js']))
            $this->data['js'] = array();
        //Append the url to the js array
        $this->data['js'] []= $url;
    }

    protected  function load_css($url)
    {
        if(!isset($this->data['css']))
            $this->data['css'] = array();
        //Append the url to the js array
        $this->data['css'] []= $url;
    }

    protected function load_meta($name,$value)
    {
        if(!isset($this->data['meta']))
            $this->data['meta'] = array();
        //Append the meta to the meta array
        $this->data['meta'] []= array(
            'name' => $name,
            'value' => $value
        );
    }

    protected function load_structured_data($name,$value)
    {
        if(!isset($this->data['structured_data']))
            $this->data['structured_data'] = array();
        //Append the meta to the meta array
        $this->data['structured_data'][$name] = $value;
    }

    protected function set_toast($toast)
    {
        $type = 'default';
        if(isset($toast['type']))
            $type = $toast['type'];
        $toast['type'] = $type;
        assert(isset($toast['message']));
        $this->data['toast'] = $toast;
    }

    private function init_css_files()
    {
        $urls = array(
            '/assets/css/bootstrap.min.css',
            '/assets/css/style.css',
            '/assets/css/responsive.css',
            '/assets/css/font-awesome.min.css',
            '/assets/css/animate.css',
            '/assets/css/prettyPhoto.css',
            '/assets/css/owl.carousel.css',
            '/assets/css/owl.theme.css',
            '/assets/css/flexslider.css',
            '/assets/css/cd-hero.css',
            '/assets/css/presets/preset3.css',

        );
        foreach ($urls as $url)
            $this->load_css($url);
    }
    private function init_js_files()
    {
        $urls = array(
            '/assets/js/jquery.js',
            '/assets/js/bootstrap.min.js',
            '/assets/js/style-switcher.js',
            '/assets/js/owl.carousel.js',
            '/assets/js/jquery.prettyPhoto.js',
            '/assets/js/jquery.flexslider.js',
            '/assets/js/cd-hero.js',
            '/assets/js/isotope.js',
            '/assets/js/ini.isotope.js',
            '/assets/js/wow.min.js',
            '/assets/js/smoothscroll.js',
            '/assets/js/jquery.easing.1.3.js',
            '/assets/js/jquery.counterup.min.js',
            '/assets/js/waypoints.min.js',
            '/assets/js/custom.js',


        );
        foreach ($urls as $url)
            $this->load_js($url);
    }

    private function init_meta_tags()
    {
        $metas = array(
            //array('name' => 'author', 'value' => 'Nidhal Abidi'),
            //array('name' => 'description', 'value' => lang('base footer primary')),
            array('name' => 'viewport', 'value' => "width=device-width, initial-scale=1, shrink-to-fit=no"),
        );
        foreach($metas as $meta)
            $this->load_meta($meta['name'],$meta['value']);
    }



}


class User_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->user)
        {
            //We save the page uri
            $this->load->helper('url');
            $_SESSION['redirect_url'] = uri_string();
            $this->error("You are not logged in please login first!",array(
                'ajax' => $this->is_ajax,
                'redirect_link' => base_url('login')
            ));
        }

    }
}

class Manager_Controller extends User_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->user->role != 'admin' and $this->user->role != 'manager')
        {
            $this->error("You are not instructor, you cannot access this page!",array(
                'redirect_link' => base_url(),
                'ajax' => $this->is_ajax
            ));
        }
        $this->data['header'] = null;
        /*$this->data['footer'] = $this->load->view('instructor/footer',array(
            'site_name' => $this->settings_model->get('site_name'),

        ),true);*/
    }
}

class Admin_Controller extends Manager_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->user->role != 'admin')
        {
            $this->error("You are not admin, you cannot access this page!",array(
                'ajax' => $this->is_ajax,
                'redirect_link' => base_url()
            ));
        }



    }
}


