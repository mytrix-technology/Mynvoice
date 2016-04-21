<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');
    }

    public function index()
    {   
        $invoice = $this->Dashboard_model->get_all_invoice();

        $data = array(
            'invoice_data' => $invoice
        );

        $this->template->load('template','dashboard',$data);
    }
}

/* End of file Main.php */
/* Location: ./application/controllers/Dashboard.php */