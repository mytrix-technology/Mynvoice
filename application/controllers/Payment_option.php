<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_option extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_option_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $payment_option = $this->Payment_option_model->get_all();

        $data = array(
            'payment_option_data' => $payment_option
        );

        $this->template->load('template','payment_option_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Payment_option_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nmpay' => $row->nmpay,
		'descpay' => $row->descpay,
	    );
            $this->template->load('template','payment_option_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment_option'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('payment_option/create_action'),
	    'id' => set_value('id'),
	    'nmpay' => set_value('nmpay'),
	    'descpay' => set_value('descpay'),
	);
        $this->template->load('template','payment_option_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nmpay' => $this->input->post('nmpay',TRUE),
		'descpay' => $this->input->post('descpay',TRUE),
	    );

            $this->Payment_option_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('payment_option'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Payment_option_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('payment_option/update_action'),
		'id' => set_value('id', $row->id),
		'nmpay' => set_value('nmpay', $row->nmpay),
		'descpay' => set_value('descpay', $row->descpay),
	    );
            $this->template->load('template','payment_option_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment_option'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nmpay' => $this->input->post('nmpay',TRUE),
		'descpay' => $this->input->post('descpay',TRUE),
	    );

            $this->Payment_option_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('payment_option'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Payment_option_model->get_by_id($id);

        if ($row) {
            $this->Payment_option_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('payment_option'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment_option'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nmpay', 'nmpay', 'trim|required');
	$this->form_validation->set_rules('descpay', 'descpay', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "payment_option.xls";
        $judul = "payment_option";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nmpay");
	xlsWriteLabel($tablehead, $kolomhead++, "Descpay");

	foreach ($this->Payment_option_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nmpay);
	    xlsWriteLabel($tablebody, $kolombody++, $data->descpay);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=payment_option.doc");

        $data = array(
            'payment_option_data' => $this->Payment_option_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('payment_option_doc',$data);
    }

}

/* End of file Payment_option.php */
/* Location: ./application/controllers/Payment_option.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-25 22:02:45 */
/* http://harviacode.com */