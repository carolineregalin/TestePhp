<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estabelecimentos extends CI_Controller {

    public function index() {
        $this->load->model('estabelecimentos_model');
        $data['estabelecimento'] = $this->estabelecimentos_model->buscarTodosEstabelecimentos();
        $this->load->view('estabelecimentos/index', $data);
    }

    public function novo() {
        $estabelecimento = array(
            "nome" => $this->input->post("nome"),
            "cep" => $this->input->post("cep"),
            "cidade" => $this->input->post("cidade"),
            "uf" => $this->input->post("uf"),
            "endereco" => $this->input->post("endereco"),
            "bairro" => $this->input->post("bairro"),
            "idusuarioestabelecimento" => $_SESSION["idusuario"]
        );
        $this->load->model("estabelecimentos_model");
        $this->estabelecimentos_model->salva($estabelecimento);
        redirect("index.php/estabelecimentos");
    }

}
