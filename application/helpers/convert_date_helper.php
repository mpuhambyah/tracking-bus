<?php

function is_logged_in()
{
  $ci = get_instance();
  if (!$ci->session->userdata('email')) {
    redirect(base_url('auth/login'));
  }
}

function date_differ($start, $end)
{
  $start = new DateTime(date('Y-m-d', $start));
  $end = new DateTime(date('Y-m-d', $end));
  $diff = $start->diff($end)->days + 1;

  if ($diff < 0) {
    $diff = "Kadaluarsa";
  } else {
    $diff = $diff . " Hari";
  }

  return $diff;
}

function human_longdate_id($date)
{
  $pecah = explode("-", date('d-m-Y', $date));
  $bulan = $pecah[1];

  switch ($bulan) {
    case "01":
      $bulan_human = "Januari";
      break;
    case "02":
      $bulan_human = "Februari";
      break;
    case "03":
      $bulan_human = "Maret";
      break;
    case "04":
      $bulan_human = "April";
      break;
    case "05":
      $bulan_human = "Mei";
      break;
    case "06":
      $bulan_human = "Juni";
      break;
    case "07":
      $bulan_human = "Juli";
      break;
    case "08":
      $bulan_human = "Agustus";
      break;
    case "09":
      $bulan_human = "September";
      break;
    case "10":
      $bulan_human = "Oktober";
      break;
    case "11":
      $bulan_human = "November";
      break;
    case "12":
      $bulan_human = "Desember";
      break;
  }

  return $pecah[0] . " " . $bulan_human . " " . $pecah[2];
}

function human_shortdate_id($date, $type)
{
  $tgl = explode(" ", date('d-m-Y H:i:s', $date));
  $waktu = explode(":", $tgl[1]);
  $pecah = explode("-", $tgl[0]);
  $bulan = $pecah[1];

  switch ($bulan) {
    case "01":
      $bulan_human = "Jan";
      break;
    case "02":
      $bulan_human = "Feb";
      break;
    case "03":
      $bulan_human = "Mar";
      break;
    case "04":
      $bulan_human = "Apr";
      break;
    case "05":
      $bulan_human = "Mei";
      break;
    case "06":
      $bulan_human = "Jun";
      break;
    case "07":
      $bulan_human = "Jul";
      break;
    case "08":
      $bulan_human = "Ags";
      break;
    case "09":
      $bulan_human = "Sep";
      break;
    case "10":
      $bulan_human = "Okt";
      break;
    case "11":
      $bulan_human = "Nov";
      break;
    case "12":
      $bulan_human = "Des";
      break;
  }
  if ($type == 'date') {
    return $pecah[0] . " " . $bulan_human . " " . $pecah[2];
  } else if ($type == 'datetime') {
    return $pecah[0] . " " . $bulan_human . " " . $pecah[2] . " " . $waktu[0] . ":" . $waktu[1];
  }
}

function get_user($nik)
{
  $ci = get_instance();

  $user = $ci->db->get_where('karyawan', ['nik' => $nik])->row_array();
  if (!$user) {
    $user['nama'] = $nik;
  }
  return $user['nama'];
}
