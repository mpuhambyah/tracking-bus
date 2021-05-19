<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect(base_url('auth'));
    };
    $this->load->model('M_admin');
  }

  public function index()
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', '', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
      'min_length' => 'Password must be at least 6 characters!'
    ]);

    if ($this->form_validation->run() == false) {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['list'] = $this->db->get('buses')->result_array();
      $data['title'] = 'Bus List';

      $this->load->view('templates/dashboard-header', $data);
      $this->load->view('templates/dashboard-sidebar', $data);
      $this->load->view('templates/dashboard-topbar', $data);
      $this->load->view('admin/buses', $data);
      $this->load->view('templates/dashboard-footer');
    } else {
      $image = $_FILES['image']['name'];
      if ($image) {
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'pdf|jpg|png|JPG';
        $config['max_size']     = '2048';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $up_image = $this->upload->data('file_name');
        } else {
          $this->session->set_flashdata('message-bus', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
          redirect(base_url('admin'));
        }
      } else {
        $this->session->set_flashdata('message-bus', '<div class="alert alert-danger" role="alert">
                Upload gambar bus!
                </div>');
        redirect(base_url('admin'));
      }

      $data_bus = [
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
        'image' => $up_image
      ];
      $id_bus = $this->M_admin->create('buses', $data_bus);
      if ($id_bus) {
        $email_bus = [
          'name' => htmlspecialchars($this->input->post('name', true)),
          'email' => htmlspecialchars($this->input->post('email', true)) . '@eb.its.ac.id',
          'image' => 'def.jpg',
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'role_id' => 1,
          'bus_id' => $id_bus, // add last insert id to mahasiswa table
          'is_active' => 1,
          'date_created' => time()
        ];
        $this->M_admin->create('user', $email_bus);
      }
      $this->session->set_flashdata('message-bus', '<div class="alert alert-success" role="alert">
        New Bus added!
        </div>');
      redirect(base_url('admin'));
    }
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('buses');
    $this->session->set_flashdata('message-bus', '<div class="alert alert-success" role="alert">
        Bus data has been deleted!
        </div>');
    redirect(base_url('admin'));
  }

  public function getdetail()
  {
    echo json_encode($this->db->get_where('buses', ['id' => $this->input->post('id')])->row_array());
  }

  public function getubah()
  {
    echo json_encode($this->db->get_where('buses', ['id' => $this->input->post('id')])->row_array());
  }

  public function edit()
  {
    $image = $_FILES['image']['name'];
    if ($image) {
      $config['upload_path'] = './assets/img';
      $config['allowed_types'] = 'pdf|jpg|png|JPG';
      $config['max_size']     = '2048';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
        $up_image = $this->upload->data('file_name');
        $data = [
          'name' => $this->input->post('name'),
          'description' => $this->input->post('description'),
          'image' => $up_image
        ];
      } else {
        $this->session->set_flashdata('message-bus', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        redirect(base_url('admin'));
      }
    } else {
      $data = [
        "name" => $this->input->post('name', true),
        "description" => $this->input->post('description', true),
      ];
    }

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('buses', $data);
    $this->session->set_flashdata('message-bus', '<div class="alert alert-success" role="alert">
        Bus data has been edited!
        </div>');
    redirect(base_url('admin'));
  }
}
