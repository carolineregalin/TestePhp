<?php

class Estabelecimentos_model extends CI_Model {

    var $table = "estabelecimento";

    /**

     * Function buscarTodosEstabelecimentos()

     *

     * Busca todos os estabelecimentos cadastrados

     *

     * @return (array)

     */
    function buscarTodosEstabelecimentos($sort = '1', $order = 'desc', $limit = null, $offset = null) {
        $this->db->order_by($sort, $order);
        if ($limit)
            $this->db->limit($limit, $offset);

        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    /**

     * Function salva($estabelecimento)

     *

     * Faz insert no banco de dados do estabelecimento

     *
     * @param (array)

     */
    public function salva($estabelecimento) {

        if (!isset($estabelecimento))
            $status = false;
        $status = $this->db->insert($this->table, $estabelecimento);
        
        // Checa o status da operação gravando a mensagem na seção
        if (!$status) {
            $this->session->set_flashdata('error', 'Não foi possível inserir o estabelecimento.');
        } else {
            $this->session->set_flashdata('success', 'Estabelecimento inserido com sucesso.');
        }
    }

}
