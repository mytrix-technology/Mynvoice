<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $customer = $this->Customer_model->get_all();

        $data = array(
            'customer_data' => $customer
        );

        $this->template->load('template','customer_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdcust' => $row->kdcust,
		'salutation' => $row->salutation,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'display_name' => $row->display_name,
		'email' => $row->email,
		'phone' => $row->phone,
		'website' => $row->website,
		'company_name' => $row->company_name,
		'currency' => $row->currency,
		'payment_terms' => $row->payment_terms,
        'notes' => $row->notes,
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
	    );
            $this->template->load('template','customer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customer/create_action'),
    	    'kdcust' => set_value('kdcust'),
    	    'salutation' => set_value('salutation'),
    	    'first_name' => set_value('first_name'),
    	    'last_name' => set_value('last_name'),
    	    'display_name' => set_value('display_name'),
    	    'email' => set_value('email'),
    	    'phone' => set_value('phone'),
    	    'website' => set_value('website'),
    	    'company_name' => set_value('company_name'),
    	    'currency' => set_value('currency'),
            'payment_terms' => set_value('payment_terms'),
    	    'notes' => set_value('notes'),
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
    	);
        var_dump($this->template->load('template','customer_form', $data));die;
        $this->template->load('template','customer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        $year = date('y');
        $month = date('m');

        $this->db->select_max('kdcust');
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0)
        {
           foreach ($query->result() as $row)
            {
                $kdmax = $row->kdcust;
                $kode = (int) substr($kdmax, 4,4);
                $kode++;
                $nourut = sprintf("%'.04d\n", $kode);
            }
        }
        
        $genkdCust = $year.''.$month.''.$nourut;
        var_dump($this->form_validation->run());die;

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                    'kdcust' => $genkdCust,
            		'salutation' => $this->input->post('salutation',TRUE),
            		'first_name' => $this->input->post('first_name',TRUE),
            		'last_name' => $this->input->post('last_name',TRUE),
            		'display_name' => $this->input->post('display_name',TRUE),
            		'email' => $this->input->post('email',TRUE),
            		'phone' => $this->input->post('phone',TRUE),
            		'website' => $this->input->post('website',TRUE),
            		'company_name' => $this->input->post('company_name',TRUE),
            		'currency' => $this->input->post('currency',TRUE),
            		'payment_terms' => $this->input->post('payment_terms',TRUE),
            	    );

            $this->Customer_model->insert($data);

            $datadetail = array(
                        'customer_kdcust' => $genkdCust,
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
            $this->Customer_model->insertdetail($datadetail);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('customer'));
        }


    }
    
    public function update($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customer/update_action'),
        		'kdcust' => set_value('kdcust', $row->kdcust),
        		'salutation' => set_value('salutation', $row->salutation),
        		'first_name' => set_value('first_name', $row->first_name),
        		'last_name' => set_value('last_name', $row->last_name),
        		'display_name' => set_value('display_name', $row->display_name),
        		'email' => set_value('email', $row->email),
        		'phone' => set_value('phone', $row->phone),
        		'website' => set_value('website', $row->website),
        		'company_name' => set_value('company_name', $row->company_name),
        		'currency' => set_value('currency', $row->currency),
        		'payment_terms' => set_value('payment_terms', $row->payment_terms),
                'notes' => set_value('notes', $row->notes),
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
	            );
            $this->template->load('template','customer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdcust', TRUE));
        } else {
            $data = array(
            		'salutation' => $this->input->post('salutation',TRUE),
            		'first_name' => $this->input->post('first_name',TRUE),
            		'last_name' => $this->input->post('last_name',TRUE),
            		'display_name' => $this->input->post('display_name',TRUE),
            		'email' => $this->input->post('email',TRUE),
            		'phone' => $this->input->post('phone',TRUE),
            		'website' => $this->input->post('website',TRUE),
            		'company_name' => $this->input->post('company_name',TRUE),
            		'currency' => $this->input->post('currency',TRUE),
            		'payment_terms' => $this->input->post('payment_terms',TRUE),
            	    );
            $this->Customer_model->update($this->input->post('kdcust', TRUE), $data);
            
            $datadetail = array(
                        'customer_kdcust' => $genkdCust,
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
            $this->Customer_model->insertdetail($datadetail);
            
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('salutation', 'salutation', 'trim|required');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('display_name', 'display name', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('website', 'website', 'trim|required');
	$this->form_validation->set_rules('company_name', 'company name', 'trim|required');
	$this->form_validation->set_rules('currency', 'currency', 'trim|required');
	//$this->form_validation->set_rules('payment_terms', 'payment terms', 'trim|required');

	$this->form_validation->set_rules('kdcust', 'kdcust', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "customer.xls";
        $judul = "customer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Salutation");
	xlsWriteLabel($tablehead, $kolomhead++, "First Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Display Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Website");
	xlsWriteLabel($tablehead, $kolomhead++, "Company Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Currency");
	xlsWriteLabel($tablehead, $kolomhead++, "Payment Terms");

	foreach ($this->Customer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->salutation);
	    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->display_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->website);
	    xlsWriteLabel($tablebody, $kolombody++, $data->company_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->currency);
	    xlsWriteLabel($tablebody, $kolombody++, $data->payment_terms);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=customer.doc");

        $data = array(
            'customer_data' => $this->Customer_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('customer_doc',$data);
    }

}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-21 23:35:29 */
/* http://harviacode.com */