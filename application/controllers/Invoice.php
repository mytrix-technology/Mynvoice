<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $invoice = $this->Invoice_model->get_all();

        $data = array(
            'invoice_data' => $invoice
        );

        $this->template->load('template','invoice_list', $data);
    }

    public function read($id) 
    {   
        $row = $this->Invoice_model->get_by_id($id);
        $row_detail = $this->Invoice_model->get_by_id_detail($id);
        if ($row) {
            $data = array(
        		'kdinv' => $row->kdinv,
        		'kdquo' => $row->kdquo,
        		'custkd' => $row->custkd,
        		'invdate' => $row->invdate,
        		'subtotal' => $row->subtotal,
        		'discount' => $row->discount,
        		'tax' => $row->tax,
        		'grdtotal' => $row->grdtotal,
        		'payopt' => $row->payopt,
        		'custnotes' => $row->custnotes,
        		'remark' => $row->remark,
                'detail_data' => $row_detail
    	    );
            $this->template->load('template','invoice_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('invoice/create_action'),
    	    'kdinv' => set_value('kdinv'),
    	    'kdquo' => set_value('kdquo'),
            'custkd' => set_value('custkd'),
    	    'ordernumber' => set_value('ordernumber'),
            'invdate' => set_value('invdate'),
    	    'duedate' => set_value('duedate'),

    	    'subtotal' => set_value('invoice_subtotal'),
            'discount' => set_value('invoice_discount'),
    	    'shipprice' => set_value('invoice_shipping'),
    	    'tax' => set_value('invoice_vat'),
    	    'grdtotal' => set_value('invoice_total'),

    	    'payopt' => set_value('payopt'),
    	    'custnotes' => set_value('custnotes'),
    	    'remark' => set_value('remark'),

            'kodeitem' => set_value('invoice_product'),
            'description' => set_value('invoice_product'),
            'quantity' => set_value('invoice_product_qty'),
            'price' => set_value('invoice_product_price'),
            'discount' => set_value('invoice_product_discount'),
            'lineTotal' => set_value('invoice_product_sub'),
	);
        $this->template->load('template','invoice_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        $year = date('y');
        $month = date('m');

        $queCat = $this->db->get_where('category_invoice', array('id' => '2'));
        if ($queCat->num_rows() > 0)
        {
            foreach ($queCat->result() as $row) {
                $kdCat = $row->id;
            }
            
        }

        $this->db->select_max('kdinv');
        $query = $this->db->get('invoice');
        if ($query->num_rows() > 0)
        {
           foreach ($query->result() as $row)
            {
                $kdmax = $row->kdinv;
                $kode = (int) substr($kdmax, 5,4);
                $kode++;
                $nourut = sprintf("%'.04d\n", $kode);
            }
        }
        
        $genkdInv = $year.''.$month.''.$kdCat.''.$nourut;

        $date = explode("-", $this->input->post('invdate',TRUE));
        $invdate = $date[2]."-".$date[1]."-".$date[0];

        $date1 = explode("-", $this->input->post('duedate',TRUE));
        $duedate = $date1[2]."-".$date1[1]."-".$date1[0];

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kdinv' => $genkdInv,
        		'kdquo' => $this->input->post('kdquo',TRUE),
                'custkd' => $this->input->post('custkd',TRUE),
        		'ordernumber' => $this->input->post('ordernumber',TRUE),
                'invdate' => $invdate,
        		'duedate' => $duedate,
        		'subtotal' => $this->input->post('invoice_subtotal',TRUE),
                'discount' => $this->input->post('invoice_discount',TRUE),
        		'discount' => $this->input->post('invoice_shipping',TRUE),
        		'tax' => $this->input->post('invoice_vat',TRUE),
        		'grdtotal' => $this->input->post('invoice_total',TRUE),
        		'payopt' => $this->input->post('payopt',TRUE),
        		'custnotes' => $this->input->post('custnotes',TRUE),
        		'remark' => $this->input->post('remark',TRUE),
    	    );
            $this->Invoice_model->insert($data);
            
            $count = count($this->input->post('invoice_product',TRUE));
            for ($i=0; $i<$count ; $i++) {
                $datadetail[$i] = array(
                        'kdinv' => $genkdInv,
                        'itemkd' =>$this->input->post('invoice_product',TRUE)[$i],
                        'itemname' => $this->input->post('invoice_product',TRUE)[$i],
                        'qty' => $this->input->post('invoice_product_qty',TRUE)[$i],
                        'priceperitem' => $this->input->post('invoice_product_price',TRUE)[$i],
                        'discount' => $this->input->post('invoice_product_discount',TRUE)[$i],
                        'totalprice' => $this->input->post('invoice_product_sub',TRUE)[$i],
                );
            }
            $this->Invoice_model->insertdetail($datadetail);

            $maindata = array('invoice_data' => $data);
            $maindatadetail = array('invoice_data_detail' => $datadetail);

            $this->autoemail($maindata,$maindatadetail);
        }
    }

    public function autoemail($maindata,$maindatadetail)
    {
        foreach ($maindata as $data1) {
        
        }
        foreach ($maindatadetail as $index_jenis => $jenis) {
            foreach ($jenis as $index_data => $data2) {
        
            }
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('invoice/autoemail_action'),
            'kdinv' => $data1['kdinv'],
            'custkd' => $data1['custkd'],
            'from' => set_value('from'),
            'to' => set_value('to'),
            'cc' => set_value('cc'),
            'judul' => set_value('judul'),
            'subject' => set_value('subject'),
            'pesan' => set_value('pesan'),
            'attach' => set_value('attach'),
            'status' => set_value('status'),
            
        );
        var_dump($data);die;
        $this->template->load('template','email_invoice', $data);
    }

    public function autoemail_action()
    {
        $kdform = $this->input->post('kdform',TRUE);
        $to = $this->input->post('to',TRUE);
        $cc = $this->input->post('cc',TRUE);
        $subject = $this->input->post('subject',TRUE);
        $pesan = $this->input->post('pesan',TRUE);
        $attach = $this->input->post('attach',TRUE);
        $url = site_url('quotation');

        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'formybisnis@gmail.com', //isi dengan gmailmu!
          'smtp_pass' => 'pr0f3s0r', //isi dengan password gmailmu!
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('formybisnis@gmail', 'Sentralnet - Invoice');
        $this->email->to($to); //email tujuan. Isikan dengan emailmu!
        $this->email->cc($cc);
        $this->email->subject($subject);
        $this->email->message($pesan);
        if($this->email->send())
        {
            $dataemail = array(
                'kdform' => $kdform,
                'from' => 'formybisnis@gmail.com',
                'to' => $to,
                'cc' => $cc,
                'judul' => 'Sentralnet - Invoice',
                'subject' => $subject,
                'message' => $pesan,
                'attach' => $attach,
                'status' => 1,
            );
            $this->Invoice_model->insertemail($dataemail);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('invoice'));
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }
    
    public function update($id) 
    {
        $row = $this->Invoice_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('invoice/update_action'),
		'kdinv' => set_value('id', $row->kdinv),
		'kdquo' => set_value('kdquo', $row->kdquo),
		'custkd' => set_value('custkd', $row->custkd),
		'invdate' => set_value('invdate', $row->invdate),
		'subtotal' => set_value('subtotal', $row->subtotal),
		'discount' => set_value('discount', $row->discount),
		'tax' => set_value('tax', $row->tax),
		'grdtotal' => set_value('grdtotal', $row->grdtotal),
		'payopt' => set_value('payopt', $row->payopt),
		'custnotes' => set_value('custnotes', $row->custnotes),
		'remark' => set_value('remark', $row->remark),
	    );
            $this->template->load('template','invoice_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdinv', TRUE));
        } else {
            $data = array(
		'kdquo' => $this->input->post('kdquo',TRUE),
		'custkd' => $this->input->post('custkd',TRUE),
		'invdate' => $this->input->post('invdate',TRUE),
		'subtotal' => $this->input->post('subtotal',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'tax' => $this->input->post('tax',TRUE),
		'grdtotal' => $this->input->post('grdtotal',TRUE),
		'payopt' => $this->input->post('payopt',TRUE),
		'custnotes' => $this->input->post('custnotes',TRUE),
		'remark' => $this->input->post('remark',TRUE),
	    );

            $this->Invoice_model->update($this->input->post('kdinv', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('invoice'));
        }
    }

    public function record_payment($id)
    {
        $row = $this->Invoice_model->get_by_id($id);
        $rowDetail = $this->Invoice_model->get_by_id_detail($id);

        //var_dump($row);
        //var_dump($rowDetail);die;
        
        if ($row && $rowDetail) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('invoice/record_payment_action'),
                'kdpayrec' => set_value('kdpayrec'),
                'ctpay' => set_value('ctpay'),
                'custkd' => set_value('custkd', $row->custkd),
                'bankcharge' => set_value('bankcharge'),
                'paydate' => set_value('paydate'),
                'paymode' => set_value('paymode'),
                'reference' => set_value('reference'),
                
                'kdinv' => set_value('kdinv', $row->kdinv),
                'invdate' => set_value('invdate', $row->invdate),
                'invamount' => set_value('invamount', $row->grdtotal),
                'dueamount' => set_value('dueamount', $row->grdtotal),
                'amount' => set_value('amount'),
                
                'remark' => set_value('remark'),
                'upload' => set_value('upload'),
                
                'detail_data' => $rowDetail
            );
            //var_dump($data);die;
            $this->template->load('template','invoice_record_payment', $data);
        } else {
            $this->session->set_flashdata('message', 'Cannot record payment received');
            redirect(site_url('quotation/read'));
        }
    }

    public function record_payment_action()
    {
        $year = date('y');
        $month = date('m');

        $queCat = $this->db->get_where('category_invoice', array('id' => '5'));
        if ($queCat->num_rows() > 0)
        {
            foreach ($queCat->result() as $row) {
                $kdCat = $row->id;
            }
        }

        $this->db->select_max('kdpayrec');
        $query = $this->db->get('payment_received');
        if ($query->num_rows() > 0)
        {
           foreach ($query->result() as $row)
            {
                $kdmax = $row->kdpayrec;
                $kode = (int) substr($kdmax, 5,4);
                $kode++;
                $nourut = sprintf("%'.04d\n", $kode);
            }
        }
        
        $genkdPayRec = $year.''.$month.''.$kdCat.''.$nourut;

        $date = explode("-", $this->input->post('paydate',TRUE));
        $paydate = $date[2]."-".$date[1]."-".$date[0];

        $data = array(
                'kdpayrec' => $genkdPayRec,
                'ctpay' => $this->input->post('ctpay',TRUE),
                'custkd' => $this->input->post('custkd',TRUE),
                'bankcharge' => $this->input->post('bankcharge',TRUE),
                'paydate' => $paydate,
                'paymode' => $this->input->post('paymode',TRUE),
                'reference' => $this->input->post('reference',TRUE),
                'kdinv' => $this->input->post('kdinv',TRUE),
                'invdate' => $this->input->post('invdate',TRUE),
                'invamount' => $this->input->post('invamount',TRUE),
                'dueamount' => $this->input->post('dueamount',TRUE),
                'amount' => $this->input->post('amount',TRUE),
                'remark' => $this->input->post('remark',TRUE),
                'upload' => $this->input->post('upload',TRUE),
        );
        //var_dump($data);die;
        $this->Invoice_model->record($data);
            
        $this->session->set_flashdata('message', 'Record Payment Success');
        redirect(site_url('invoice'));
    }

    public function delivery_notice($id)
    {
        $row = $this->Invoice_model->get_by_id($id);
        $rowDetail = $this->Invoice_model->get_by_id_detail($id);

        //var_dump($row);
        //var_dump($rowDetail);die;
        
        if ($row && $rowDetail) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('invoice/delivery_notice_action'),
                'kddelnot' => set_value('kddelnot'),
                'delnotdate' => set_value('delnotdate'),
                'custkd' => set_value('custkd', $row->custkd),
                'kdinv' => set_value('kdinv', $row->kdinv),
                
                'kodeitem' => set_value('kodeitem', $row->kdinv),
                'nameitem' => set_value('nameitem', $row->invdate),
                'quantity' => set_value('quantity', $row->grdtotal),
                'sentquantity' => set_value('sentquantity'),
                
                'custnotes' => set_value('custnotes',$row->custnotes),
                'remark' => set_value('remark',$row->remark),
                
                'detail_data' => $rowDetail
            );
            //var_dump($data);die;
            $this->template->load('template','invoice_delivery_notice', $data);
        } else {
            $this->session->set_flashdata('message', 'Cannot Delivery Notice');
            redirect(site_url('quotation/read'));
        }
    }

    public function delivery_notice_action()
    {
        $year = date('y');
        $month = date('m');

        $queCat = $this->db->get_where('category_invoice', array('id' => '4'));
        if ($queCat->num_rows() > 0)
        {
            foreach ($queCat->result() as $row) {
                $kdCat = $row->id;
            }
            
        }

        $this->db->select_max('kddelnot');
        $query = $this->db->get('delivery_notice');
        if ($query->num_rows() > 0)
        {
           foreach ($query->result() as $row)
            {
                $kdmax = $row->kddelnot;
                $kode = (int) substr($kdmax, 5,4);
                $kode++;
                $nourut = sprintf("%'.04d\n", $kode);
            }
        }
        
        $genkdDelNot = $year.''.$month.''.$kdCat.''.$nourut;

        $date = explode("-", $this->input->post('delnotdate',TRUE));
        $delnotdate = $date[2]."-".$date[1]."-".$date[0];

        $data = array(
                'kddelnot' => $genkdDelNot,
                'delnotdate' => $delnotdate,
                'custkd' => $this->input->post('custkd',TRUE),
                'kdinv' => $this->input->post('kdinv',TRUE),
                'custnotes' => $this->input->post('remark',TRUE),
                'remark' => $this->input->post('remark',TRUE),
                'status' => 17,
        );
        //var_dump($data);
        $this->Invoice_model->deliver($data);

        $count = count($this->input->post('kodeitem',TRUE));
        for ($i=0; $i<$count ; $i++) {
            $datadetail[$i] = array(
                        'kddelnot' => $genkdDelNot,
                        'itemkd' => $this->input->post('kodeitem',TRUE)[$i],
                        'itemname' => $this->input->post('nameitem',TRUE)[$i],
                        'qty' => $this->input->post('quantity',TRUE)[$i],
                        'sentqty' => $this->input->post('sentquantity',TRUE)[$i],
            );
        }
        //var_dump($datadetail);die;
        $this->Invoice_model->deliverdetail($datadetail);
            
        $this->session->set_flashdata('message', 'Delivery Notice Success');
        redirect(site_url('invoice'));
    }
    
    public function delete($id) 
    {
        $row = $this->Invoice_model->get_by_id($id);

        if ($row) {
            $this->Invoice_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('invoice'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoice'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kdquo', 'kdquo', 'trim|required');
	$this->form_validation->set_rules('custkd', 'custkd', 'trim|required');
	$this->form_validation->set_rules('invdate', 'invdate', 'trim|required');
	$this->form_validation->set_rules('subtotal', 'subtotal', 'trim|required');
	$this->form_validation->set_rules('discount', 'discount', 'trim|required');
	$this->form_validation->set_rules('tax', 'tax', 'trim|required');
	$this->form_validation->set_rules('grdtotal', 'grdtotal', 'trim|required');
	$this->form_validation->set_rules('payopt', 'payopt', 'trim|required');
	$this->form_validation->set_rules('custnotes', 'custnotes', 'trim|required');
	$this->form_validation->set_rules('remark', 'remark', 'trim|required');

	$this->form_validation->set_rules('kdinv', 'kdinv', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "invoice.xls";
        $judul = "invoice";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kdquo");
	xlsWriteLabel($tablehead, $kolomhead++, "Custkd");
	xlsWriteLabel($tablehead, $kolomhead++, "Invdate");
	xlsWriteLabel($tablehead, $kolomhead++, "Subtotal");
	xlsWriteLabel($tablehead, $kolomhead++, "Discount");
	xlsWriteLabel($tablehead, $kolomhead++, "Tax");
	xlsWriteLabel($tablehead, $kolomhead++, "Grdtotal");
	xlsWriteLabel($tablehead, $kolomhead++, "Payopt");
	xlsWriteLabel($tablehead, $kolomhead++, "Custnotes");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");

	foreach ($this->Invoice_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdquo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->custkd);
	    xlsWriteLabel($tablebody, $kolombody++, $data->invdate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->subtotal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->discount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tax);
	    xlsWriteNumber($tablebody, $kolombody++, $data->grdtotal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->payopt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->custnotes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->remark);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=invoice.doc");

        $data = array(
            'invoice_data' => $this->Invoice_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('invoice_doc',$data);
    }

}

/* End of file Invoice.php */
/* Location: ./application/controllers/Invoice.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-25 23:27:35 */
/* http://harviacode.com */