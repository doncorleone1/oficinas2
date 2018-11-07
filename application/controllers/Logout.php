<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $this->session->set_userdata('userLogged', false);
        $this->session->unset_userdata('userID');
        $this->session->unset_userdata('userEmail');
        $this->session->unset_userdata('userType');
        header('Location:'. base_url('Login'));
    }
}
