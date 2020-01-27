<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Model {

    public $nome = "";
    public $phone1 = 0;
    public $phone2 = 0;
    public $cpf = 0;
    public $rg = 0;
    public $nome_mae = "";
    public $email = "";
    public $religiao = "";

    public function __construct(){
        parent::__construct();
    }

    public function get($id = null)
    {   
        //método que verifica se o id não está nulo, se não tiver ele capta pelo id
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('inquilino')->where('id', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }

            return null;
        }
        //método que capta todos os imóveis da tabela
        $query = $this->db->select('*')->from('inquilino')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;
    }

    

}