<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'settings';
    }

    /**
     * @param $name  setting name in the database
     * @param $table
     * @return string
     */
    public function get($name, $table = null)
    {
        assert($name != null);
        return $this->get_row_where(array(
            'name' => $name
        ))->value;
    }
}