<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imovel extends CI_Model
{

    public $endereco;         
    public $numero;            
    public $bairro;            
    public $finalidade;        
    public $cep;              
    public $tipo;

    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = null)
    {
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('imoveis')->where('id_imovel', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }

            return null;
        }

        $query = $this->db->select('*')->from('imoveis')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;
    }

    public function save($imovel)
    {
        $this->db->set($this->_setImovel($imovel))->insert('imoveis');

        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }

        return null;
    }
    

    public function update($imovel)
    {
        $id = $city['id'];

        $this->db->set($this->_setCity($city))->where('id', $id)->update('imoveis');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('imoveis');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    private function _setImovel()
    {
        return array(
            'endereco'          => $imovel['endereco'],
            'numero'            => $imovel['numero'],
            'bairro'            => $imovel['bairro'],
            'finalidade'        => $imovel['finalidade'],
            'cep'               => $imovel['cep'],
            'tipo'              => $imovel['tipo']
        );
    }
}