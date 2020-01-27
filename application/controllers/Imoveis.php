<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class Imoveis extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('imovel');
    }

    
    public function index_get()
    {
        $imoveis = $this->imovel->get();

        shuffle($imoveis); //Mistura a ordem dos imóveis existentes

        if (!is_null($imoveis)) {
            $this->response(array('response' => $imoveis), 200);
        } else {
            $this->response(array('error' => 'Não existe imóveis cadastrados'), 404);
        }
    }

    //seleciona imóvel pelo ID
    public function find_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $imoveis = $this->imovel->get($id);

        if (!is_null($imoveis)) {
            $this->response(array('response' => $imoveis), 200);
        } else {
            $this->response(array('error' => 'Imóvel não encontrado'), 404);
        }
    }
    //seleciona imóvel pela finalidade
    public function finalidade_get($finalidade){
        if(!$finalidade){
            $this->response(null, 404);
        }

        $imoveis = $this->imovel->getImovelFinalidade($finalidade);

        if(!is_null($imoveis)){
            $this->response(array('response' => $imoveis), 200);
        } else {
            $this->response(array('error' => 'Imóvel não encontrado'), 404);
        }
    }

    //seleciona os imóvels pelo bairro
    public function bairro_get($bairro){
        if (!$bairro){
            $this->response('Digite o nome do bairro', 404);
        }

        str_replace('_', ' ', $bairro);
        
        $imoveis = $this->imovel->getImovelBairro($bairro);

        if(!is_null($imoveis)){
            $this->response(array('response' => $imoveis), 200);
        } else {
            $this->response(array('error' => 'Nenhum imóvel foi encontrado'), 404);
        }
    }

    //seleciona os imóveis com as caracteristicas

    public function imoveiscarac_get($id){

        if(!$id){
            $this->response(null, 404);
        }

        $imoveis = $this->imovel->get($id);
        $caracteristica = $this->imovel->getImovelCaracteristicas($id);
        $detalhes = $this->imovel->getImovelDetalhes($id);

        if(!is_null($imoveis)){
            $this->response(array('Imovel' => $imoveis, 'caracteristicas' => $caracteristica, 'detalhes' => $detalhes), 200);
        } else {
            $this->response(array('error' => 'Nenhuma caracteristica foi encontrado'), 404);
        }
    }

    public function caracteristica_get($id){
        if (!$id){
            $this->response(null, 404);
        }
     
        $imoveis = $this->imovel->getImovelCaracteristicas($id);

        if(!is_null($imoveis)){
            $this->response(array('response' => $imoveis), 200);
        } else {
            $this->response(array('error' => 'Nenhuma caracteristica foi encontrado'), 404);
        }
    }

    public function detalhes_get($id){
        if(!$id){
            $this->response("É obrigatório a utilização do ID", 404);
        }

        $imoveis = $this->imovel->getImovelDetalhes($id);

        if(!is_null($imoveis)){
            $this->response(array('Detalhes' => $imoveis), 200);
        } else {
            $this->response(array('error' => 'Nenhuma caracteristica foi encontrado'), 404);
        }
    }

    public function caracteristica_post(){

        $caracteristicas = $this->input->post();
        $salvar = $this->db->insert('caracteristicas', $caracteristicas);

        if(!is_null($imoveis)){
            $this->response(array('Imóvel cadastrado com sucesso!' => $salvar), 200);
        } else {
            $this->response(array('error' => 'Nenhuma caracteristica foi encontrado'), 404);
        }
    }

    public function index_post()
    {
       
        $imoveis = $this->input->post();
        $salvar = $this->db->insert('imoveis',$imoveis);
        // $imoveis = $this->imovel->save($this->post('imovel'));

        if (!is_null($salvar)) {
            $this->response(array('Imóvel cadastrado com sucesso!' => $imoveis), 201);
        } else {
            $this->response(array('error', 'Não foi possível salvar...'), 400);
        }

    }

    public function index_put($id){
        
        if (!$id) {
            $this->response(null, 400);
        }

        $update = $this->imovel->update($id, $this->put('imoveis'));

        if (!is_null($update)) {
            $this->response(array('response' => 'Imóvel atualizado'), 200);
        } else {
            $this->response(array('error', 'Não foi possível atualizar o imóvel'), 400);
        }
    }

    public function index_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }

        $delete = $this->imovel->delete($id);

        if (!is_null($delete)) {
            $this->response(array('response' => 'Imóvel deletado!'), 200);
        } else {
            $this->response(array('error', 'Não foi possível deletar imóvel'), 400);
        }
    }
}