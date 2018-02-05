<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Controller {

    public function index() {
        $this->load->view('login/index');
    }

    public function autenticar() {
        $this->load->model("usuarios_model");
        $nome = $this->input->post("nome");
        $senha = $this->input->post("senha");
        $usuario = $this->usuarios_model->logarUsuarios($nome, $senha);
        if ($usuario) {
            $this->load->model("usuarios_model");
            //busca informações do usuário
            $result = $this->usuarios_model->getInformacoesUsuario($nome);
            //armazena dados na sessao
            $_SESSION["logado"] = TRUE;
            $_SESSION["user"] = $result[0]['nome'];
            $_SESSION["email"] = $result[0]['email'];
            $_SESSION["idusuario"] = $result[0]['idUsuario'];
            $this->session->set_flashdata("success", "Logado com sucesso");
            redirect("index.php/Base/Index");
            
        } else {
            $this->session->set_flashdata("danger", "Usuário ou senha inválidos!");
            
        }
        redirect();
    }

    public function logout() {
        $this->session->unset_userdata("usuario_logado");
        $this->session->flashdata("sucess", "Deslogado com sucesso!");
        session_destroy();
        redirect();
    }

}
