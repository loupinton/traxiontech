<?php

defined('BASEPATH') or exit('No direct script access allowed');



class MyCI_model extends CI_Model
{
    public function login()
    {
        $data = new stdClass();
        $data->username = "admin";
        $data->password = "password1";
        return $data;
    }
    public function get_all_salesrep()
    {
        return $this->session->userdata('all_salesrep');
    }
}





/* End of file Timesheet_model.php */

/* Location: ./application/models/Timesheet_model.php */
