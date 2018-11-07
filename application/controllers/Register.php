<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('array');
    }

    public function index() {
        if ($this->session->userdata('userLogged') == true) {
            header('Location:'. base_url('Main'));
        } else {
            $this->load->view('register');
        }
    }

    public function NewUser() {
        $userToRegister = elements(array('CPF', 'SENHA', 'NOME'), $this->input->post());
        $this->load->model('usuario_model');
        $resultUser = $this->usuario_model->FindByCPF($userToRegister['CPF']);

        $userToRegister["SENHA"] = password_hash($userToRegister["SENHA"], PASSWORD_BCRYPT);

        // Formatting the CPF
        $userToRegister["CPF"] = str_replace("-", "", $userToRegister["CPF"]);
        $userToRegister["CPF"] = str_replace(".", "", $userToRegister["CPF"]);

        $this->load->view('register');
        if ($resultUser == null) {
          $this->usuario_model->Insert($userToRegister);
          // Opening the dialog of success
          header('Location:'. base_url('Login'));
          $dataMessage['messageDialog'] = "Usuário cadastrado com sucesso";
          $dataMessage['class'] = 'green black-text';
          $this->load->view('dialog', $dataMessage);
        } else {
          // Opening the dialog of error
          $dataMessage['messageDialog'] = "Usuário já existente, informe outro e-mail.";
          $dataMessage['class'] = 'red black-text';
          $this->load->view('dialog', $dataMessage);
        }
    }
}
