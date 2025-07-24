<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
        // $data = array(
        //     'title' => 'Data Mahasiswa',
        //     'description' => '',
        //     'content' => 'mahasiswa/v_mahasiswa',
        // );

		$this->load->view('v_home');
	}
}
