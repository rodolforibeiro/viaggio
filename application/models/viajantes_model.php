<?php
class viajantes_model extends CI_Model{
    public function buscaPorEmailSenha($email, $senha){
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);
        $viajante = $this->db->get("viajantes")->row_array();
        return $viajante;
    }
}