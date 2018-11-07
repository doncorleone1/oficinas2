<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateDataClient extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('array');
        $this->load->model('usuario_model');
    }

    public function index() {
        if ($this->session->userdata('userLogged') == true) {
            $this->load->view('updatedataclient');
        } else {
            header('Location:'. base_url('Login'));
        }
    }

    public function Update() {
       $userID = $this->input->post("CPF");
       $userName = $this->input->post("NOME");
       $userID = str_replace("-", "", $userID);
       $userID = str_replace(".", "", $userID);
       $this->usuario_model->Update($userID, $userName);

       $this->load->view('updatedataclient');

       // Opening the dialog
       $dataMessage['messageDialog'] = "Usuário atualizado com sucesso";
       $dataMessage['class'] = 'red black-text';
       $this->load->view('dialog', $dataMessage);
    }
}
