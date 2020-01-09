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
    // captar todos os imóveis pelo id, caso o usuario passe o mesmo, caso não passe ele pega todos os imóveis
    public function get($id = null)
    {   
        //método que verifica se o id não está nulo, se não tiver ele capta pelo id
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('imoveis')->where('id_imovel', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }

            return null;
        }
        //método que capta todos os imóveis da tabela
        $query = $this->db->select('*')->from('imoveis')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;
    }

    //método que capta os imóveis pela finalidade
    public function getImovelFinalidade ($finalidade = null){
        $query = $this->db->select('*')->from('imoveis')->where('finalidade', $finalidade)->get();
        if ($query->num_rows() > 0){
            return $query->result_array();
        }

        return null;
    }

    //Método que capta os imóvels pelo bairro
    public function getImovelBairro($bairro = null){
        $query = $this->db->select('*')->from('imoveis')->where('bairro', $bairro)->get();
        
        if ($query->num_rows() > 0){
            return $query->result_array();
        }

        return null;
    }

    public function getImovelCaracteristicas($id){

        $this->db->select('*');
        $this->db->from('imoveis');
        $this->db->join('caracteristicas', 'imoveis.id_imovel = caracteristicas.id_imovel');
        $query = $this->db->get();

        
 
        if ($query->num_rows() > 0){
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
    

    public function update($id)
    {

        $this->db->set($this->_setImovel($imovel))->where('id', $id)->update('imoveis');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    public function delete($id)
    {
        $this->db->where('id_imovel', $id)->delete('imoveis');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    private function _setImovel($imovel)
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