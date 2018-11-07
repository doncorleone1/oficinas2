<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('array');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        if ($this->session->userdata('userLogged') == true) {
            header('Location:'. base_url('Main'));
        } else {
            $this->load->view('login');
        }
    }

    public function Login() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('cpfUser', 'CPF', 'required');
        $this->form_validation->set_rules('passwordUser', 'Senha', 'required',
                array('required' => 'You must provide a %s.')
        );

        if ($this->form_validation->run() == FALSE)
        {
            
            $this->load->view('login');
        }
        else
        {
    
            $userLogin = elements(array("cpfUser", "passwordUser"), $this->input->post());
            $userLogin["cpfUser"] = str_replace("-", "", $userLogin["cpfUser"]);
            $userLogin["cpfUser"] = str_replace(".", "", $userLogin["cpfUser"]);

            $this->load->model('usuario_model');
            $resultUser = $this->usuario_model->FindByCPF($userLogin["cpfUser"]);

            $hash = $resultUser['SENHA'];
            $password = $userLogin['passwordUser'];

            $this->load->view('login');
            // In case of the user doesn't exists
            if ($resultUser == null) {
                $dataMessage['messageDialog'] = "CPF não cadastrado";
                $dataMessage['class'] = 'red black-text';
                $this->load->view('dialog', $dataMessage);
            } else {
                if (password_verify($password, $hash)) {
                    $typeUser;
                    switch($resultUser['TIPO']) {
                        case 0:
                            $typeUser = 'customer';
                            break;
                        case 1:
                            $typeUser = 'b2b';
                            break;
                        case 2:
                            $typeUser = 'admin';
                            break;
                    }
                    $this->session->set_userdata('userCPF', $resultUser['CPF']);
                    $this->session->set_userdata('userName', $resultUser['NOME']);
                    $this->session->set_userdata('userSenha', $resultUser['SENHA']);
                    $this->session->set_userdata('userLogged', true);
                    $this->session->set_userdata('userType', $typeUser);
                    header('Location:'. base_url('Main/LoadMain'));
                } else {
                    $dataMessage['messageDialog'] = "Senha inválida";
                    $dataMessage['class'] = 'red black-text';
                    $this->load->view('dialog', $dataMessage);
                }
            }
        }
    }
}
