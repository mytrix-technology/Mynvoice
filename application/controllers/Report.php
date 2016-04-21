<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Items_model');
        $this->load->model('Quotation_model');
        $this->load->model('Invoice_model');
        $this->load->model('Nota_model');
        $this->load->model('Payment_received_model');
        $this->load->model('Delivery_notice_model');
        $this->load->library('form_validation');
    }

    public function index_sales_by_customer()
    {
        $sales_by_customer = $this->Invoice_model->get_all();

        $data = array(
            'report_sales_by_customer_data' => $sales_by_customer
        );

        $this->template->load('template','report_sales_by_customer_list', $data);
    }

    public function index_sales_by_item()
    {
        $sales_by_item = $this->Invoice_model->get_all();

        $data = array(
            'report_sales_by_item_data' => $sales_by_item
        );

        $this->template->load('template','report_sales_by_item_list', $data);
    }

    public function index_quotation_details()
    {
        $quotation_details = $this->Quotation_model->get_all();

        $data = array(
            'report_quotation_details_data' => $quotation_details
        );

        $this->template->load('template','report_quotation_details_list', $data);
    }

    public function index_invoice_details()
    {
        $invoice_details = $this->Invoice_model->get_all();

        $data = array(
            'report_invoice_details_data' => $invoice_details
        );

        $this->template->load('template','report_invoice_details_list', $data);
    }

    public function index_nota_details()
    {
        $nota_details = $this->Nota_model->get_all();

        $data = array(
            'report_nota_details_data' => $nota_details
        );

        $this->template->load('template','report_nota_details_list', $data);
    }

    public function index_payment_received()
    {
        $payment_received = $this->Payment_received_model->get_all();

        $data = array(
            'report_payment_received_data' => $payment_received
        );

        $this->template->load('template','report_payment_received_list', $data);
    }

    public function index_time_to_get_paid()
    {
        $time_to_get_paid = $this->Invoice_model->get_all();

        $data = array(
            'report_time_to_get_paid_data' => $time_to_get_paid
        );

        $this->template->load('template','report_time_to_get_paid_list', $data);
    }

    public function index_refund_history()
    {
        $refund_history = $this->Payment_received_model->get_all();

        $data = array(
            'report_refund_history_data' => $refund_history
        );

        $this->template->load('template','report_refund_history_list', $data);
    }
    public function index_delivery_notice()
    {
        $delivery_notice = $this->Delivery_notice_model->get_all();

        $data = array(
            'report_delivery_notice_data' => $delivery_notice
        );

        $this->template->load('template','report_delivery_notice_list', $data);
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