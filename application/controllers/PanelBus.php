<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panelbus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('auth'));
        } elseif ($this->session->userdata('role_id') != 1) {
            redirect(base_url('home'));
        };
    }
    public function databus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['name'] = $this->session->userdata('name');
        $data['title'] = 'Panel';
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('templates/header', $data);
        $this->load->view('bus/panel-bus', $data);
        $this->load->view('bus/panel-footer', $data);
    }

    public function databusv2()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['name'] = $this->session->userdata('name');
        $data['title'] = 'Panel';
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('templates/header', $data);
        $this->load->view('bus/panel-bus-v2', $data);
        $this->load->view('bus/panel-footer', $data);
    }
}
