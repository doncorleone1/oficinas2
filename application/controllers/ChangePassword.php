<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('array');
        $this->load->model('usuario_model');
    }

    public function index() {
        if ($this->session->userdata('userLogged') == true) {
            $this->load->view('changepassword');
        } else {
            header('Location:'. base_url('Login'));
        }
    }

    public function ChangePassword() {
        $userID = $this->input->post("CPF");
        $userPassword = $this->input->post("SENHA");
        $userID = str_replace("-", "", $userID);
        $userID = str_replace(".", "", $userID);
        $this->usuario_model->ChangePassword($userID, $userPassword);
 
        $this->load->view('changepassword');
 
        // Opening the dialog
        $dataMessage['messageDialog'] = "Usuário atualizado com sucesso";
        $dataMessage['class'] = 'red black-text';
        $this->load->view('dialog', $dataMessage);
    }
}
