<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }

    /**
     * @param $username username is either the username or the email address
     * @param $password
     * @return null|object
     */
    public function login($username,$password)
    {
        assert($username != null);
        assert($password != null);

        //Step 1 : make sure the user exists by retrieve him from the database
        $user = $this->get_row_where(array('username' => $username));
        if(!$user)
            $user = $this->get_row_where(array('email' => $username));
        if(!$user)
            return null;
        //Step 2 : after retrieving the user combine the his salt with the password and hash them and if the result
        //         equals the stored hash then log the user in and return him otherwise return null
        if(password_verify($password, $user->password_hash))
            return $user;

        return null;

    }





}