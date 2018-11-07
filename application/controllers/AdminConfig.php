<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminConfig extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('array');
        $this->load->helper('url');
        $this->load->model('usuario_model');
        $this->load->model('servico_model');
    }

    public function retrieveAdminConfigView() {
        $dataAdminConfig['products'] = "";
        $dataAdminConfig['users'] = $this->usuario_model->FindAll('NOME', 'asc');
        $dataAdminConfig['services'] = $this->servico_model->FindAll('REFERENCIA', 'asc');
        $dataAdminConfig['userLogged'] = $this->session->userdata('userLogged');
        $dataAdminConfig['userType'] = $this->session->userdata('userType');

        $this->load->view('adminconfig', $dataAdminConfig);
    }

    public function index() {
        if ($this->session->userdata('userLogged') == true && $this->session->userdata('userType') == 'admin') {
            $this->retrieveAdminConfigView();
        } else {
            header('Location:'. base_url('Login'));
        }
    }

    public function InsertUser() {
        $userToRegister = elements(array('CPF', 'SENHA', 'NOME'), $this->input->post());

        $this->load->model('usuario_model');

        // Formatting the CPF
        $userToRegister["CPF"] = str_replace("-", "", $userToRegister["CPF"]);
        $userToRegister["CPF"] = str_replace(".", "", $userToRegister["CPF"]);

        // hashing password
        $userToRegister["SENHA"] = password_hash($userToRegister["SENHA"], PASSWORD_BCRYPT);

        // Finding the user based on the CPF
        $resultUser = $this->usuario_model->FindByCPF($userToRegister['CPF']);

        $this->retrieveAdminConfigView();

        if ($resultUser == null) {
            $this->usuario_model->Insert($userToRegister);
            // Opening the dialog of success

            $dataMessage['messageDialog'] = "Usuário cadastrado com sucesso";
            $dataMessage['class'] = 'green black-text';
            $this->load->view('dialog', $dataMessage);
        } else {
            // Opening the dialog of error
            $dataMessage['messageDialog'] = "Usuário já existente, informe outro CPF.";
            $dataMessage['class'] = 'red black-text';
            $this->load->view('dialog', $dataMessage);
        }
    }

    public function DeleteUser() {
        // Deleting a specific user
        $postDeleteUser = $this->input->post();
        $this->usuario_model->Remove($postDeleteUser['CPF']);

        $this->retrieveAdminConfigView();

        // Opening the dialog
        $dataMessage['messageDialog'] = "Usuário removido com sucesso";
        $dataMessage['class'] = 'red black-text';
        $this->load->view('dialog', $dataMessage);
    }

    public function UpdateUser() {
        // Updating a specific user
       $userID = $this->input->post("CPF");
       $userName = $this->input->post("NOME");
       $userID = str_replace("-", "", $userID);
       $userID = str_replace(".", "", $userID);
       $this->usuario_model->Update($userID, $userName);

       $this->retrieveAdminConfigView();

       // Opening the dialog
       $dataMessage['messageDialog'] = "Usuário atualizado com sucesso";
       $dataMessage['class'] = 'red black-text';
       $this->load->view('dialog', $dataMessage);
    }

    public function InsertService() {
        $serviceToRegister = array(
            'TIPO' => $this->input->post("TIPO"),
            'STATUS' => 1,
            'CLIENTE_CPF' => $this->input->post("CLIENTE_CPF"),
            'REFERENCIA' => $this->input->post("REFERENCIA"));
        $this->load->model('servico_model');
        $this->servico_model->Insert($serviceToRegister);
        $this->retrieveAdminConfigView();

        // Opening the dialog of success
        $dataMessage['messageDialog'] = "Serviço cadastrado com sucesso";
        $dataMessage['class'] = 'green black-text';
        $this->load->view('dialog', $dataMessage);
    }

    public function DeleteService() {
        // Deleting a specific service
        $serviceID = $this->input->post("serviceIdRemove");
        $this->servico_model->Remove($serviceID);

        $this->retrieveAdminConfigView();

        // Opening the dialog
        $dataMessage['messageDialog'] = "Serviço removido com sucesso";
        $dataMessage['class'] = 'red black-text';
        $this->load->view('dialog', $dataMessage);
    }

    public function UpdateService() {
        // Updating a specific user
       $userID = $this->input->post("CPF");
       $serviceStatus = $this->input->post("STATUS");
       $this->servico_model->Update($userID, $serviceStatus);

       $this->retrieveAdminConfigView();

       // Opening the dialog
       $dataMessage['messageDialog'] = "Serviço atualizado com sucesso";
       $dataMessage['class'] = 'green black-text';
       $this->load->view('dialog', $dataMessage);
    }
}
