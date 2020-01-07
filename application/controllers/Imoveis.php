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

        if (!is_null($imoveis)) {
            $this->response(array('response' => $imoveis), 200);
        } else {
            $this->response(array('error' => 'Não existe imóveis cadastrados'), 404);
        }
    }

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

    public function index_post()
    {
       
        $imoveis = $this->input->post();
        $salvar = $this->db->insert('imoveis',$imoveis);
        // $imoveis = $this->imovel->save($this->post('imovel'));

        if (!is_null($salvar)) {
            $this->response(array('response' => $imoveis), 201);
        } else {
            $this->response(array('error', 'Não foi possível salvar...'), 400);
        }

    }

    public function index_put()
    {
        if (!$this->put('imovel')) {
            $this->response(null, 400);
        }

        $update = $this->imovel->update($this->put('imovel'));

        if (!is_null($update)) {
            $this->response(array('response' => 'Imóvel atualizado!'), 200);
        } else {
            $this->response(array('error', 'Não foi possível atualizar imóvel'), 400);
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