<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quotation extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Quotation_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $quotation = $this->Quotation_model->get_all();

        $data = array(
            'quotation_data' => $quotation
        );

        $this->template->load('template','quotation_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Quotation_model->get_by_id($id);
        $row_detail = $this->Quotation_model->get_by_id_detail($id);
        //var_dump($row);die;
        if ($row) {
            $data = array(
        		'kdquo' => $row->kdquo,
                'custkd' => $row->custkd,
        		'reference' => $row->reference,
        		'quodate' => $row->quodate,
        		'expdate' => $row->expdate,
        		'subtotal' => $row->subtotal,
        		'discount' => $row->discount,
        		'tax' => $row->tax,
        		'grdtotal' => $row->grdtotal,
        		'custnotes' => $row->custnotes,
        		'remark' => $row->remark,
                'detail_data' => $row_detail
    	    );
            $this->template->load('template','quotation_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('quotation'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('quotation/create_action'),
    	    'kdquo' => set_value('kdquo'),
            'custkd' => set_value('custkd'),
    	    'reference' => set_value('reference'),
    	    'quodate' => set_value('quodate'),
    	    'expdate' => set_value('expdate'),

    	    'subtotal' => set_value('invoice_subtotal'),
            'discount' => set_value('invoice_discount'),
    	    'shipprice' => set_value('invoice_shipping'),
    	    'tax' => set_value('invoice_vat'),
    	    'grdtotal' => set_value('invoice_total'),

    	    'custnotes' => set_value('custnotes'),
            'remark' => set_value('remark'),

            'itemkd' => set_value('invoice_product'),
            'itemname' => set_value('invoice_product'),
            'qty' => set_value('invoice_product_qty'),
            'priceperitem' => set_value('invoice_product_price'),
            'discount' => set_value('invoice_product_discount'),
    	    'totalprice' => set_value('invoice_product_sub'),


            /*'kodeitem' => set_value('kodeitem'),
            'description' => set_value('description'),
            'quantity' => set_value('quantity'),
            'price' => set_value('price'),
            'itemtax' => set_value('itemtax'),
            'lineTotal' => set_value('lineTotal'),*/
    	);
        $this->template->load('template','quotation_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        $year = date('y');
        $month = date('m');

        $queCat = $this->db->get_where('category_invoice', array('id' => '1'));
        if ($queCat->num_rows() > 0)
        {
            foreach ($queCat->result() as $row) {
                $kdCat = $row->id;
            }
            
        }

        $this->db->select_max('kdquo');
        $query = $this->db->get('quotation');
        if ($query->num_rows() > 0)
        {
           foreach ($query->result() as $row)
            {
                $kdmax = $row->kdquo;
                $kode = (int) substr($kdmax, 5,4);
                $kode++;
                $nourut = sprintf("%'.04d\n", $kode);
            }
        }
        
        $genkdQuot = $year.''.$month.''.$kdCat.''.$nourut;

        $date = explode("-", $this->input->post('quodate',TRUE));
        $quodate = $date[2]."-".$date[1]."-".$date[0];

        $date1 = explode("-", $this->input->post('expdate',TRUE));
        $expdate = $date1[2]."-".$date1[1]."-".$date1[0];

            $data = array(
                'kdquo' => $genkdQuot,
                'custkd' => $this->input->post('custkd',TRUE),
                'reference' => $this->input->post('reference',TRUE),
                'quodate' => $quodate,
                'expdate' => $expdate,
                'subtotal' => $this->input->post('invoice_subtotal',TRUE),
                'discount' => $this->input->post('invoice_discount',TRUE),
                'shipprice' => $this->input->post('invoice_shipping',TRUE),
                'tax' => $this->input->post('invoice_vat',TRUE),
                'grdtotal' => $this->input->post('invoice_total',TRUE),
                'custnotes' => $this->input->post('custnotes',TRUE),
                'remark' => $this->input->post('remark',TRUE),
                'status' => 0,
            );
            $this->Quotation_model->insert($data);
            
            $count = count($this->input->post('invoice_product',TRUE));
            for ($i=0; $i<$count ; $i++) {
                $datadetail[$i] = array(
                        'kdquo' => $genkdQuot,
                        'itemkd' =>$this->input->post('invoice_product',TRUE)[$i],
                        'itemname' => $this->input->post('invoice_product',TRUE)[$i],
                        'qty' => $this->input->post('invoice_product_qty',TRUE)[$i],
                        'priceperitem' => $this->input->post('invoice_product_price',TRUE)[$i],
                        'discount' => $this->input->post('invoice_product_discount',TRUE)[$i],
                        'totalprice' => $this->input->post('invoice_product_sub',TRUE)[$i],
                );
            }
            $this->Quotation_model->insertdetail($datadetail);
            
            $maindata = array('quotation_data' => $data);
            $maindatadetail = array('quotation_data_detail' => $datadetail);
            /*$dataattach = array(
                'quotation_data' => $data,
                'quotation_data_detail' => $datadetail,
                //'start' => 0
            );*/
            
            /*include_once APPPATH.'/third_party/mpdf/mpdf.php';
            
            ini_set('memory_limit', '32M');
            $html = $this->load->view('quotation_pdf', $dataattach, true);
            $pdf = new mPDF('en-GB-x','A4-P');
            $pdf->WriteHTML($html);
            $pdf->Output(trim($genkdQuot).'.pdf', 'F');*/

            //$lastKdQuot = $this->db->insert_id();
            $this->autoemail($maindata,$maindatadetail);
        
        /*var_dump($this->form_validation->run());die;
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
        }*/
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
            'action' => site_url('quotation/autoemail_action'),
            'kdquo' => $data1['kdquo'],
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
        $this->template->load('template','email_quotation', $data);
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
        $this->email->from('formybisnis@gmail', 'Sentralnet - Quotation');
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
                'judul' => 'Sentralnet - Quotation',
                'subject' => $subject,
                'message' => $pesan,
                'attach' => $attach,
                'status' => 1,
            );
            $this->Quotation_model->insertemail($dataemail);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('quotation'));
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }
    
    public function update($id) 
    {
        $row = $this->Quotation_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('quotation/update_action'),
        		'kdquo' => set_value('kdquo', $row->kdquo),
                'custkd' => set_value('custkd', $row->custkd),
        		'reference' => set_value('reference', $row->reference),
        		'quodate' => set_value('quodate', $row->quodate),
        		'expdate' => set_value('expdate', $row->expdate),
        		'subtotal' => set_value('subtotal', $row->subtotal),
        		'discount' => set_value('discount', $row->discount),
        		'tax' => set_value('tax', $row->tax),
        		'grdtotal' => set_value('grdtotal', $row->grdtotal),
        		'custnotes' => set_value('custnotes', $row->custnotes),
        		'remark' => set_value('remark', $row->remark),
            );
            $this->template->load('template','quotation_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('quotation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdquo', TRUE));
        } else {
            $data = array(
        'custkd' => $this->input->post('custkd',TRUE),
		'reference' => $this->input->post('reference',TRUE),
		'quodate' => $this->input->post('quodate',TRUE),
		'expdate' => $this->input->post('expdate',TRUE),
		'subtotal' => $this->input->post('subtotal',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'tax' => $this->input->post('tax',TRUE),
		'grdtotal' => $this->input->post('grdtotal',TRUE),
		'custnotes' => $this->input->post('custnotes',TRUE),
		'remark' => $this->input->post('remark',TRUE),
	    );

            $this->Quotation_model->update($this->input->post('kdquo', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('quotation'));
        }
    }

    public function convert_invoice($id)
    {
        $row = $this->Quotation_model->get_by_id($id);
        $rowDetail = $this->Quotation_model->get_by_id_detail($id);

        //var_dump($row);
        //var_dump($rowDetail);die;
        
        if ($row && $rowDetail) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('quotation/convert_invoice_action'),
                'kdinv' => set_value('kdinv'),
                'kdquo' => set_value('kdquo', $row->kdquo),
                'custkd' => set_value('custkd', $row->custkd),
                'reference' => set_value('reference', $row->reference),
                'quodate' => set_value('quodate', $row->quodate),
                'expdate' => set_value('expdate', $row->expdate),
                
                'subtotal' => set_value('subtotal', $row->subtotal),
                'discount' => set_value('discount', $row->discount),
                'shipprice' => set_value('shipprice', $row->shipprice),
                'tax' => set_value('tax', $row->tax),
                'grdtotal' => set_value('grdtotal', $row->grdtotal),
                
                'custnotes' => set_value('custnotes', $row->custnotes),
                'remark' => set_value('remark', $row->remark),
                
                'detail_data' => $rowDetail
            );
            //var_dump($data);die;
            $this->template->load('template','quotation_to_invoice', $data);
        } else {
            $this->session->set_flashdata('message', 'Cannot convert Invoice from Quotation');
            redirect(site_url('quotation/read'));
        }
    }

    public function convert_invoice_action()
    {
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

        $data = array(
                'kdinv' => $genkdInv,
                'kdquo' => $this->input->post('kdquo',TRUE),
                'custkd' => $this->input->post('custkd',TRUE),
                'ordernumber' => $this->input->post('ordernumber',TRUE),
                'invdate' => $invdate,
                'duedate' => $duedate,
                'subtotal' => $this->input->post('subtotal',TRUE),
                'discount' => $this->input->post('discount',TRUE),
                'discount' => $this->input->post('invoice_shipping',TRUE),
                'tax' => $this->input->post('invoice_vat',TRUE),
                'grdtotal' => $this->input->post('grdtotal',TRUE),
                'payopt' => $this->input->post('payopt',TRUE),
                'custnotes' => $this->input->post('custnotes',TRUE),
                'remark' => $this->input->post('remark',TRUE),
        );
        //var_dump($data);
        $this->Quotation_model->convert($data);
            
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
        //var_dump($datadetail);die;
        $this->Quotation_model->convertdetail($datadetail);
        
        $this->session->set_flashdata('message', 'Convert to Invoice Success');
        redirect(site_url('quotation'));
    }
    
    public function delete($id) 
    {
        $row = $this->Quotation_model->get_by_id($id);

        if ($row) {
            $this->Quotation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('quotation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('quotation'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('custkd', 'custkd', 'trim|required');
	$this->form_validation->set_rules('reference', 'reference', 'trim|required');
	$this->form_validation->set_rules('quodate', 'quodate', 'trim|required');
	$this->form_validation->set_rules('expdate', 'expdate', 'trim|required');
	$this->form_validation->set_rules('subtotal', 'subtotal', 'trim|required');
    $this->form_validation->set_rules('discount', 'discount', 'trim|required');
	$this->form_validation->set_rules('shipprice', 'shipprice', 'trim|required');
	$this->form_validation->set_rules('tax', 'tax', 'trim|required');
	$this->form_validation->set_rules('grdtotal', 'grdtotal', 'trim|required');
	$this->form_validation->set_rules('custnotes', 'custnotes', 'trim|required');
	$this->form_validation->set_rules('remark', 'remark', 'trim|required');

	$this->form_validation->set_rules('kdquo', 'kdquo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "quotation.xls";
        $judul = "quotation";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Custkd");
	xlsWriteLabel($tablehead, $kolomhead++, "Quodate");
	xlsWriteLabel($tablehead, $kolomhead++, "Expdate");
	xlsWriteLabel($tablehead, $kolomhead++, "Subtotal");
	xlsWriteLabel($tablehead, $kolomhead++, "Discount");
	xlsWriteLabel($tablehead, $kolomhead++, "Tax");
	xlsWriteLabel($tablehead, $kolomhead++, "Grdtotal");
	xlsWriteLabel($tablehead, $kolomhead++, "Custnotes");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");

	foreach ($this->Quotation_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->custkd);
	    xlsWriteLabel($tablebody, $kolombody++, $data->quodate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->expdate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->subtotal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->discount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tax);
	    xlsWriteNumber($tablebody, $kolombody++, $data->grdtotal);
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
        header("Content-Disposition: attachment;Filename=quotation.doc");

        $data = array(
            'quotation_data' => $this->Quotation_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('quotation_doc',$data);
    }

    public function pdf()
    {
        $data = array(
            'quotation_data' => $this->Quotation_model->get_all(),
            //'start' => 0
        );

        include_once APPPATH.'/third_party/mpdf/mpdf.php';

        ini_set('memory_limit', '32M');
        $html = $this->load->view('quotation_pdf', $data, true);
        $pdf = new mPDF('en-GB-x','A6-L');
        //$this->load->library('pdf');
        //$pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('quotation.pdf', 'D');
    }

}

/* End of file Quotation.php */
/* Location: ./application/controllers/Quotation.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-25 23:25:25 */
/* http://harviacode.com */