<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetJSON extends CI_Controller
{
    public function index()
    {
        $file = file_get_contents('php://input');
        $file = json_decode($file);
        $id_bus = $file->id_bus;
        $file = $file->coordinates;
        $longitude = $file[0];
        $latitude = $file[1];
        $data = [
            'id_bus' => $id_bus,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'time' => date('Y-m-d H:i:s', now())
        ];
        $this->db->insert('bus_location', $data);
    }

    public function getData()
    {
        $data = $this->db->distinct()->order_by('id', 'DESC')->group_by('id_bus')->get('bus_location')->result_array();
        $new['BMS'] = [];
        foreach ($data as $d) {
            $new['BMS'][] = [
                'id' => $d['id_bus'],
                'lat' => $d['latitude'],
                'long' => $d['longitude']
            ];
        }

        echo json_encode($new);
    }
}
