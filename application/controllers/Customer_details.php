<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_details extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_details_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $customer_details = $this->Customer_details_model->get_all();

        $data = array(
            'customer_details_data' => $customer_details
        );

        $this->template->load('template','customer_details_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Customer_details_model->get_by_id($id);
        if ($row) {
            $data = array(
		'customer_id' => $row->customer_id,
		'bill_addr_street' => $row->bill_addr_street,
		'bill_addr_city' => $row->bill_addr_city,
		'bill_addr_state' => $row->bill_addr_state,
		'bill_addr_zip_code' => $row->bill_addr_zip_code,
		'bill_addr_country' => $row->bill_addr_country,
		'bill_addr_phone' => $row->bill_addr_phone,
		'bill_addr_fax' => $row->bill_addr_fax,
		'ship_addr_street' => $row->ship_addr_street,
		'ship_addr_city' => $row->ship_addr_city,
		'ship_addr_state' => $row->ship_addr_state,
		'ship_addr_zip_code' => $row->ship_addr_zip_code,
		'ship_addr_country' => $row->ship_addr_country,
		'ship_addr_phone' => $row->ship_addr_phone,
		'ship_addr_fax' => $row->ship_addr_fax,
		'notes' => $row->notes,
	    );
            $this->template->load('template','customer_details_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer_details'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customer_details/create_action'),
	    'customer_id' => set_value('customer_id'),
	    'bill_addr_street' => set_value('bill_addr_street'),
	    'bill_addr_city' => set_value('bill_addr_city'),
	    'bill_addr_state' => set_value('bill_addr_state'),
	    'bill_addr_zip_code' => set_value('bill_addr_zip_code'),
	    'bill_addr_country' => set_value('bill_addr_country'),
	    'bill_addr_phone' => set_value('bill_addr_phone'),
	    'bill_addr_fax' => set_value('bill_addr_fax'),
	    'ship_addr_street' => set_value('ship_addr_street'),
	    'ship_addr_city' => set_value('ship_addr_city'),
	    'ship_addr_state' => set_value('ship_addr_state'),
	    'ship_addr_zip_code' => set_value('ship_addr_zip_code'),
	    'ship_addr_country' => set_value('ship_addr_country'),
	    'ship_addr_phone' => set_value('ship_addr_phone'),
	    'ship_addr_fax' => set_value('ship_addr_fax'),
	    'notes' => set_value('notes'),
	);
        $this->template->load('template','customer_details_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'customer_id' => $this->input->post('customer_id',TRUE),
		'bill_addr_street' => $this->input->post('bill_addr_street',TRUE),
		'bill_addr_city' => $this->input->post('bill_addr_city',TRUE),
		'bill_addr_state' => $this->input->post('bill_addr_state',TRUE),
		'bill_addr_zip_code' => $this->input->post('bill_addr_zip_code',TRUE),
		'bill_addr_country' => $this->input->post('bill_addr_country',TRUE),
		'bill_addr_phone' => $this->input->post('bill_addr_phone',TRUE),
		'bill_addr_fax' => $this->input->post('bill_addr_fax',TRUE),
		'ship_addr_street' => $this->input->post('ship_addr_street',TRUE),
		'ship_addr_city' => $this->input->post('ship_addr_city',TRUE),
		'ship_addr_state' => $this->input->post('ship_addr_state',TRUE),
		'ship_addr_zip_code' => $this->input->post('ship_addr_zip_code',TRUE),
		'ship_addr_country' => $this->input->post('ship_addr_country',TRUE),
		'ship_addr_phone' => $this->input->post('ship_addr_phone',TRUE),
		'ship_addr_fax' => $this->input->post('ship_addr_fax',TRUE),
		'notes' => $this->input->post('notes',TRUE),
	    );

            $this->Customer_details_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('customer_details'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Customer_details_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customer_details/update_action'),
		'customer_id' => set_value('customer_id', $row->customer_id),
		'bill_addr_street' => set_value('bill_addr_street', $row->bill_addr_street),
		'bill_addr_city' => set_value('bill_addr_city', $row->bill_addr_city),
		'bill_addr_state' => set_value('bill_addr_state', $row->bill_addr_state),
		'bill_addr_zip_code' => set_value('bill_addr_zip_code', $row->bill_addr_zip_code),
		'bill_addr_country' => set_value('bill_addr_country', $row->bill_addr_country),
		'bill_addr_phone' => set_value('bill_addr_phone', $row->bill_addr_phone),
		'bill_addr_fax' => set_value('bill_addr_fax', $row->bill_addr_fax),
		'ship_addr_street' => set_value('ship_addr_street', $row->ship_addr_street),
		'ship_addr_city' => set_value('ship_addr_city', $row->ship_addr_city),
		'ship_addr_state' => set_value('ship_addr_state', $row->ship_addr_state),
		'ship_addr_zip_code' => set_value('ship_addr_zip_code', $row->ship_addr_zip_code),
		'ship_addr_country' => set_value('ship_addr_country', $row->ship_addr_country),
		'ship_addr_phone' => set_value('ship_addr_phone', $row->ship_addr_phone),
		'ship_addr_fax' => set_value('ship_addr_fax', $row->ship_addr_fax),
		'notes' => set_value('notes', $row->notes),
	    );
            $this->template->load('template','customer_details_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer_details'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'customer_id' => $this->input->post('customer_id',TRUE),
		'bill_addr_street' => $this->input->post('bill_addr_street',TRUE),
		'bill_addr_city' => $this->input->post('bill_addr_city',TRUE),
		'bill_addr_state' => $this->input->post('bill_addr_state',TRUE),
		'bill_addr_zip_code' => $this->input->post('bill_addr_zip_code',TRUE),
		'bill_addr_country' => $this->input->post('bill_addr_country',TRUE),
		'bill_addr_phone' => $this->input->post('bill_addr_phone',TRUE),
		'bill_addr_fax' => $this->input->post('bill_addr_fax',TRUE),
		'ship_addr_street' => $this->input->post('ship_addr_street',TRUE),
		'ship_addr_city' => $this->input->post('ship_addr_city',TRUE),
		'ship_addr_state' => $this->input->post('ship_addr_state',TRUE),
		'ship_addr_zip_code' => $this->input->post('ship_addr_zip_code',TRUE),
		'ship_addr_country' => $this->input->post('ship_addr_country',TRUE),
		'ship_addr_phone' => $this->input->post('ship_addr_phone',TRUE),
		'ship_addr_fax' => $this->input->post('ship_addr_fax',TRUE),
		'notes' => $this->input->post('notes',TRUE),
	    );

            $this->Customer_details_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customer_details'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Customer_details_model->get_by_id($id);

        if ($row) {
            $this->Customer_details_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customer_details'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer_details'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('customer_id', 'customer id', 'trim|required');
	$this->form_validation->set_rules('bill_addr_street', 'bill addr street', 'trim|required');
	$this->form_validation->set_rules('bill_addr_city', 'bill addr city', 'trim|required');
	$this->form_validation->set_rules('bill_addr_state', 'bill addr state', 'trim|required');
	$this->form_validation->set_rules('bill_addr_zip_code', 'bill addr zip code', 'trim|required');
	$this->form_validation->set_rules('bill_addr_country', 'bill addr country', 'trim|required');
	$this->form_validation->set_rules('bill_addr_phone', 'bill addr phone', 'trim|required');
	$this->form_validation->set_rules('bill_addr_fax', 'bill addr fax', 'trim|required');
	$this->form_validation->set_rules('ship_addr_street', 'ship addr street', 'trim|required');
	$this->form_validation->set_rules('ship_addr_city', 'ship addr city', 'trim|required');
	$this->form_validation->set_rules('ship_addr_state', 'ship addr state', 'trim|required');
	$this->form_validation->set_rules('ship_addr_zip_code', 'ship addr zip code', 'trim|required');
	$this->form_validation->set_rules('ship_addr_country', 'ship addr country', 'trim|required');
	$this->form_validation->set_rules('ship_addr_phone', 'ship addr phone', 'trim|required');
	$this->form_validation->set_rules('ship_addr_fax', 'ship addr fax', 'trim|required');
	$this->form_validation->set_rules('notes', 'notes', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "customer_details.xls";
        $judul = "customer_details";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Customer Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Bill Addr Street");
	xlsWriteLabel($tablehead, $kolomhead++, "Bill Addr City");
	xlsWriteLabel($tablehead, $kolomhead++, "Bill Addr State");
	xlsWriteLabel($tablehead, $kolomhead++, "Bill Addr Zip Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Bill Addr Country");
	xlsWriteLabel($tablehead, $kolomhead++, "Bill Addr Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Bill Addr Fax");
	xlsWriteLabel($tablehead, $kolomhead++, "Ship Addr Street");
	xlsWriteLabel($tablehead, $kolomhead++, "Ship Addr City");
	xlsWriteLabel($tablehead, $kolomhead++, "Ship Addr State");
	xlsWriteLabel($tablehead, $kolomhead++, "Ship Addr Zip Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Ship Addr Country");
	xlsWriteLabel($tablehead, $kolomhead++, "Ship Addr Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Ship Addr Fax");
	xlsWriteLabel($tablehead, $kolomhead++, "Notes");

	foreach ($this->Customer_details_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->customer_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bill_addr_street);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bill_addr_city);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bill_addr_state);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bill_addr_zip_code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bill_addr_country);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bill_addr_phone);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bill_addr_fax);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ship_addr_street);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ship_addr_city);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ship_addr_state);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ship_addr_zip_code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ship_addr_country);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ship_addr_phone);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ship_addr_fax);
	    xlsWriteLabel($tablebody, $kolombody++, $data->notes);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=customer_details.doc");

        $data = array(
            'customer_details_data' => $this->Customer_details_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('customer_details_doc',$data);
    }

}

/* End of file Customer_details.php */
/* Location: ./application/controllers/Customer_details.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-21 23:36:30 */
/* http://harviacode.com */