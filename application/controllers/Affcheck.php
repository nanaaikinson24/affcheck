<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('CURL_URL', 'https://gogpayslip.com/coderest/getpeopleinfo.php');
define('IMG_URL', 'https://127.0.0.1/gogpayslip/media/uploaded/updatedprofile/');

require_once(realpath(FCPATH . 'includes/Mobile_Detect.php'));

class Affcheck extends CI_Controller
{
	protected $secretKey;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->helper('custom');
		$this->secretKey = '#!092737@%&8**#BigBadyBoy@@@><';
	}

	public function search()
	{
		$this->load->library('session');
		$User = $this->session->userdata('user');

		if ($User) {
			$this->form_validation->set_rules('search', 'search', 'trim|required|numeric|min_length[3]');
			if ($this->form_validation->run() === FALSE) {
				$errors = array();
				foreach ($this->input->post() as $key => $value) {
					$errors[$key] = form_error($key, '<span class="text-danger d-block s-v-e">', '</span>');
				}

				$response = array('status' => 400, 'errors' => array_filter($errors));
				exit(json_encode($response));
			} else {
				$query = $this->input->post('search');
				$location = $this->input->post('location') ? $this->input->post('location') : '';
				$response = $this->getPeopleInfo($query);
				$result = json_encode($response);

				// Other
				$device = "";
				$detect = new Mobile_Detect;

				if ($detect->isTablet()) {
					// Any tablet device.
					$device = "Tablet";
				} elseif ($detect->isMobile() && !$detect->isTablet()) {
					// Exclude tablets.
					$device = "Mobile";
				} else {
					$device = "Desktop / Laptop";
				}

				$insert = $this->data_model->storeSearch([
					'search_by' => $User->id,
					'query' => $query,
					'result' => $result,
					'device' => $device,
					'location' => $location,
					'ip' => get_client_ip()
				]);

				echo $result;
			}
		} else {
			echo json_encode(['status' => 201, 'msg' => 'You are not authorized to use this']);
		}
	}

	public function getPeopleInfo($employeeNumber)
	{
		$params = array(
			'employeenumber' => serialize($employeeNumber),
			'Secure_key' => $this->secretKey
		);

		$adb_option_defaults = array(
			CURLOPT_HEADER => false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 200
		);

		$options = array(
			CURLOPT_URL => CURL_URL,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $params,
		);

		if (!isset($adb_handle)) $adb_handle = curl_init();

		curl_setopt_array($adb_handle, ($options + $adb_option_defaults));

		$output = curl_exec($adb_handle);
		if ($output != false) {
			$response =  json_decode($output, true);

			curl_close($adb_handle);
			return $response;
		} else {
			$response = 'Curl error: ' . curl_error($adb_handle);
		}

		curl_close($adb_handle);

		return $response;
	}
}

/* End of file Affcheck.php */
/* Location: ./application/controllers/Affcheck.php */
