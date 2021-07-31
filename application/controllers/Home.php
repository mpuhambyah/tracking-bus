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
        $data['role_id'] = $this->session->userdata('role_id');
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
        $data['role_id'] = $this->session->userdata('role_id');
        $data['title'] = 'Data Log';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('home/logPage', $data);
        $this->load->view('templates/dashboard-footer', $data);
    }

    public function messagePage($id_receiver = 0)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $data['user']['id'];
        $data['name'] = $this->session->userdata('name');
        $data['role_id'] = $this->session->userdata('role_id');
        $data['title'] = 'Send Message';
        $data['list_user'] = $this->db->get('user')->result_array();
        $this->load->model('M_message');
        $data['id_kirim'] = $id_receiver;
        if ($id_receiver != 0) {
            $data['content'] = $this->M_message->getMessage($data['id'], $id_receiver);
            $data['content'] = array_reverse($data['content']);
        } else {
            $data['content'] = NULL;
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('home/messagePage', $data);
        $this->load->view('templates/message-footer', $data);
    }

    public function getMessageOld()
    {
        $id = $this->input->post('id');
        $id_receiver = $this->input->post('id_receiver');
        $offset = $this->input->post('offset');
        $this->load->model('M_message');
        $data = $this->M_message->getMessageOld($id, $id_receiver, $offset);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['created_at'] = human_shortdate_id($data[$i]['created_at'], 'datetime');
        }
        $data = array_reverse($data);
        echo json_encode($data);
    }

    public function getMessageNew()
    {
        $id = $this->input->post('id');
        $id_receiver = $this->input->post('id_receiver');
        $offset = $this->input->post('offset');
        $this->load->model('M_message');
        $data = $this->M_message->getMessageNew($id, $id_receiver);
        $data['created_at'] = human_shortdate_id($data['created_at'], 'datetime');
        $data = array_reverse($data);
        $count = $this->M_message->totalUnreadMessage($id);
        $response = [
            'data' => $data,
            'countUnread' => $count
        ];
        echo json_encode($response);
    }

    public function insertMessage()
    {
        $id_receiver = $this->input->post('id_receiver', true);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $data['user']['id'];
        $data['name'] = $this->session->userdata('name');
        $data['role_id'] = $this->session->userdata('role_id');
        $data = [
            "content" => $this->input->post('content', true),
            "created_by" => $data['id'],
            "created_at" => now(),
            "created_for" => $id_receiver,
            "is_read" => 0
        ];
        $this->db->insert('message', $data);
    }

    public function updateReadMessage()
    {
        $id_receiver = $this->input->post('id_receiver', true);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $data['user']['id'];
        $data['name'] = $this->session->userdata('name');
        $data['role_id'] = $this->session->userdata('role_id');
        $dataKirim = [
            "is_read" => 1
        ];
        $this->db->where('created_by', $id_receiver);
        $this->db->where('created_for', $data['id']);
        $this->db->update('message', $dataKirim);
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
        $data['role_id'] = $this->session->userdata('role_id');
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
