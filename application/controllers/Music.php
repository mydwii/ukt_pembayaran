<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Music extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'halaman' => 'Music',
        );
        $this->template->load('Template', 'music/index', $data);
    }
}
