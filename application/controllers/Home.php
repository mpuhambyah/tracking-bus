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

    public function logPage()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['name'] = $this->session->userdata('name');
        $data['title'] = 'Data Log';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('home/logPage', $data);
        $this->load->view('templates/dashboard-footer', $data);
    }

    public function messagePage($id_receiver)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $data['user']['id'];
        $data['name'] = $this->session->userdata('name');
        $data['title'] = 'Send Message';
        $this->load->model('M_message');
        $data['id_kirim'] = $id_receiver;
        $data['content'] = $this->M_message->getMessage($data['id'], $id_receiver);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('home/messagePage', $data);
        $this->load->view('templates/message-footer', $data);
    }

    public function insertMessage($id_kirim)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $data['user']['id'];
        $data['name'] = $this->session->userdata('name');
        $data['id_kirim'] = $id_kirim;
        $data = [
            "content" => $this->input->post('content', true),
            "created_by" => $data['id'],
            "created_at" => now(),
            "created_for" => $id_kirim
        ];
        $this->db->insert('message', $data);
        redirect(base_url('home/messagePage/5'));
    }

    public function convertDate($result)
    {
        echo date("d-m-Y H:i:s", $result);
    }

    public function getDataLog()
    {
        $this->datatables
            ->select('id, id_bus, speed, heading, time, latitude, longitude')
            ->edit_column('time', "$1", "human_shortdate_id(time, 'datetime')")
            ->from('bus_location');
        return print_r($this->datatables->generate('json', ''));
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
