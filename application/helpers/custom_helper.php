<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_client_ip')) {
  // Function to get the client IP address
  function get_client_ip()
  {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
      $ipaddress = 'UNKNOWN';
    return $ipaddress;
  }
}

if (!function_exists('get_location_latlng')) {
  // Function to get the client IP address
  function get_location_latlng($lat, $long)
  {
    $url = 'https://nominatim.openstreetmap.org/reverse?format=json&lat=' . $lat . '&lon=' . $long . '&addressdetails=1';
    $json = @file_get_contents($url);
    $data = json_decode($json);

    //return address to ajax 
    return $data;
  }
}
