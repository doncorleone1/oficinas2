<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('array');
        $this->load->model('servico_model');
    }

    public function index() {
        // Charts
        $relationOfServices = array();
        $typeServices = array(
            array("VALUE" => 1, "LABEL" => "Transferência de Veículo"),
            array("VALUE" => 2, "LABEL" => "Pagamento IPVA"),
            array("VALUE" => 3, "LABEL" => "Pagamento DPVAT"),
            array("VALUE" => 4, "LABEL" => "Pagamento Licenciamento"),
            array("VALUE" => 5, "LABEL" => "Mudança de Cor"),
            array("VALUE" => 6, "LABEL" => "Emplacamento Carro"),
            array("VALUE" => 7, "LABEL" => "Emplacamento Moto"),
            array("VALUE" => 8, "LABEL" => "Alteração de Dados"),
            array("VALUE" => 9, "LABEL" => "2ª Via Recibo"),
            array("VALUE" => 10, "LABEL" => "2ª Via Documento")
        );
        foreach ($typeServices as $actualService) {
            $numberOfServices = $this->servico_model->CountServicesByTipo($actualService["VALUE"]);
            $itemToBeInsert = array('Tipo' => $actualService["LABEL"], 'Quantidade' => $numberOfServices);
            array_push($relationOfServices, $itemToBeInsert);
        }
        $dataCharts['relationServices'] = $relationOfServices;

        $this->load->view('main', $dataCharts);
    }

    public function LoadMain() {
        $typeUser = $this->session->userdata('userType');
        if($typeUser != 'admin') {
            $this->load->model('servico_model');
            $myService =  $this->servico_model->findByCPF($this->session->userdata('userCPF'));
            // if($myService == NULL) {
            //     echo "não existe serviço cadastrado";
            // } else {
                $myNewServices['myService'] = $myService;
                $this->load->view('main', $myNewServices);
            // }
        } else {
            header('Location:'. base_url('AdminConfig'));
        }
    }
}