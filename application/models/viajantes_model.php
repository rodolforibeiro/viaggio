<?php

class viajantes_model extends CI_Model{

    public function VerificarLogin($entrada, $senha)
    {
    $entrada  = $this->input->post('entrada');
    $password = $this->input->post('password');

	$md5_password = md5($password);
    $this->db->select('
                viajantes.id,
                viajantes.login,
                viajantes.email,
                viajantes.senha')
              ->from('viajantes')
              ->where("(viajantes.email = '$entrada' OR viajantes.login = '$entrada')")
              ->where('senha', $md5_password);
    $query = $this->db->get();
    if($query->num_rows() == 1){
      return $query->result();
    }else{
      return false;
    }
  }

         
}

?>