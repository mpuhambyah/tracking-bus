<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetJSON extends CI_Controller
{
    public function index()
    {
        $file = file_get_contents('php://input');
        $file = json_decode($file);
        $id_bus = $file->id_bus;
        $speed = $file->speed;
        $heading = $file->heading;
        $file = $file->coordinates;
        $longitude = $file[0];
        $latitude = $file[1];
        $data = [
            'id_bus' => $id_bus,
            'latitude' => $latitude,
            'speed' => $speed,
            'longitude' => $longitude,
            'heading' => $heading,
            'time' => now()
        ];
        $this->db->insert('bus_location', $data);
    }

    public function humanTiming($time)
    {
        $time = now() - $time;
        $time = ($time < 1) ? 1 : $time;
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '') . ' ago';
        }
    }

    public function getData()
    {
        $data = $this->db->query('SELECT * FROM bus_location WHERE id IN (SELECT MAX(id) AS id FROM bus_location GROUP BY id_bus)')->result_array();
        $new['BMS'] = [];
        foreach ($data as $d) {
            $new['BMS'][] = [
                'id_data' => $d['id'],
                'id' => $d['id_bus'],
                'lat' => $d['latitude'],
                'long' => $d['longitude'],
                'head' => $d['heading']
            ];
        }
        echo json_encode($new);
    }

    public function getDataWrapper()
    {
        $id = $this->input->post('id');
        $data = $this->db->select('buses.*, bus_location.heading, bus_location.speed, bus_location.latitude, bus_location.longitude, bus_location.time')->where('id_bus', $id)->order_by('bus_location.id', 'DESC')->join('buses', 'buses.id = bus_location.id_bus')->get('bus_location')->row_array();
        $data['time_ago'] = "Just now";
        if (now() - $data['time'] > 5) {
            $data['time_ago'] = $this->humanTiming($data['time']);
        }
        $data['time'] = date("d-m-Y H:i:s", $data['time']);

        echo json_encode($data);
    }
}
