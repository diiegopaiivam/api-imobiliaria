<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

class Pessoas extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('pessoa');
    }

    public function index_get()
    {
        $pessoa = $this->pessoa->get();

        shuffle($pessoa); //Mistura a ordem dos imóveis existentes

        if (!is_null($pessoa)) {
            $this->response(array('response' => $pessoa), 200);
        } else {
            $this->response(array('error' => 'Não existe imóveis cadastrados'), 404);
        }
    }

    public function index_post(){
       
        $pessoa = $this->input->post();
        $salvar = $this->db->insert('inquilino',$pessoa);
        // $imoveis = $this->imovel->save($this->post('imovel'));

        if (!is_null($salvar)) {
            $this->response(array('Pessoa cadastrada com sucesso!!!' => $pessoa), 201);
        } else {
            $this->response(array('error', 'Não foi possível salvar...'), 400);
        }

    }
}