<?php

class Estabelecimentos_model extends CI_Model{
    
    
   /**

   * Function buscarTodosEstabelecimentos()

   *

   * Busca todos os estabelecimentos cadastrados

   *

   * @return (array)

   */
    
    public function buscarTodosEstabelecimentos(){
        
        return $this->db->get('estabelecimento')->result_array(); 
    }
        
   /**

   * Function salva($estabelecimento)

   *

   * Faz insert no banco de dados do estabelecimento

   *
   * @param (array)

   */
    
    public function salva($estabelecimento){
        $this->db->insert("estabelecimento",$estabelecimento);
    }
    
    
    
}
