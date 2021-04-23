<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['name'] = $this->session->userdata('name');
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/dashboard-footer', $data);
    }

    public function historyTracking()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['name'] = $this->session->userdata('name');
        $data['title'] = 'History';
        $data['list_buses'] = $this->db->get('buses')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/history-sidebar', $data);
        $this->load->view('home/historyTracking', $data);
        $this->load->view('templates/history-footer', $data);
    }

    public function getContentHistory()
    {
        $id = $this->input->post('id');
        $data = $this->db->select('buses.*, bus_location.speed, bus_location.latitude, bus_location.longitude, bus_location.time')->where('id_bus', $id)->order_by('bus_location.id', 'DESC')->join('buses', 'buses.id = bus_location.id_bus')->get('bus_location')->row_array();
        $data['time'] = date("d-m-Y H:i:s", $data['time']);
        echo json_encode($data);
    }

    public function getPolyline()
    {
        $id = $this->input->post('id');
        $this->load->model('M_history');
        $data = $this->M_history->getPolyline($id);
        echo json_encode($data);
    }
}
