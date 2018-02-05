<?php

class Usuarios_model extends CI_Model {
    
     /**

   * Function logarUsuarios

   *

   * Busca usuário e senha na base de dados

   *

   * @param (string) nome a ser pesquisado

   * @return (row_array)

   */ 

    public function logarUsuarios($nome, $senha) {
        $this->db->where("nome", $nome);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("usuario")->row_array();
        return $usuario;
    }
  /**

   * Function getInformacoesUsuario

   *

   * Pega informações do usuário logado

   *

   * @param (string) nome a ser pesquisado

   * @return (array)

   */
    public function getInformacoesUsuario($nome) {

        $condition = "nome =" . "'" . $nome . "'";
        $this->db->select('*');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get("usuario");

        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}
