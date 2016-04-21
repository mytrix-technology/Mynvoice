<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delivery_notice extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Delivery_notice_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $delivery_notice = $this->Delivery_notice_model->get_all();

        $data = array(
            'delivery_notice_data' => $delivery_notice
        );

        $this->template->load('template','delivery_notice_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Delivery_notice_model->get_by_id($id);
        $row_detail = $this->Delivery_notice_model->get_by_id_detail($id);
        if ($row) {
            $data = array(
        		'kddelnot' => $row->kddelnot,
        		'kdinv' => $row->kdinv,
        		//'kdquo' => $row->kdquo,
        		'custkd' => $row->custkd,
        		'payoptid' => $row->payoptid,
        		'delnotdate' => $row->delnotdate,
        		'dateofreceipt' => $row->dateofreceipt,
        		'custnotes' => $row->custnotes,
        		'remark' => $row->remark,
        		'status' => $row->status,
                'detail_data' => $row_detail
    	    );
            $this->template->load('template','delivery_notice_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delivery_notice'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('delivery_notice/create_action'),
    	    'kddelnot' => set_value('kddelnot'),
    	    'kdinv' => set_value('kdinv'),
    	    //'kdquo' => set_value('kdquo'),
    	    'custkd' => set_value('custkd'),
    	    //'payoptid' => set_value('payoptid'),
    	    'delnotdate' => set_value('delnotdate'),
    	    //'dateofreceipt' => set_value('dateofreceipt'),
    	    'custnotes' => set_value('custnotes'),
    	    'remark' => set_value('remark'),
            'status' => set_value('status'),
            'kodeitem' => set_value('kodeitem'),
            'nameitem' => set_value('nameitem'),
            'quantity' => set_value('quantity'),
    	    'sentquantity' => set_value('sentquantity'),
    	);
        $this->template->load('template','delivery_notice_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

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

        var_dump($this->form_validation->run());die;
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kddelnot' => $genkdDelNot,
        		'kdinv' => $this->input->post('kdinv',TRUE),
        		//'kdquo' => $this->input->post('kdquo',TRUE),
        		'custkd' => $this->input->post('custkd',TRUE),
        		//'payoptid' => $this->input->post('payoptid',TRUE),
        		'delnotdate' => $delnotdate,
        		//'dateofreceipt' => $this->input->post('dateofreceipt',TRUE),
        		'custnotes' => $this->input->post('custnotes',TRUE),
        		'remark' => $this->input->post('remark',TRUE),
                'status' => 17,
            );
            $this->Delivery_notice_model->insert($data);
            
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
            $this->Delivery_notice_model->insertdetail($datadetail);
            
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
            'action' => site_url('delivery_notice/autoemail_action'),
            'kddelnot' => $data1['kddelnot'],
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
        $this->template->load('template','email_delivery_notice', $data);
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
        $this->email->from('formybisnis@gmail', 'Sentralnet - Delivery Notice');
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
                'judul' => 'Sentralnet - Delivery Notice',
                'subject' => $subject,
                'message' => $pesan,
                'attach' => $attach,
                'status' => 1,
            );
            $this->Quotation_model->insertemail($dataemail);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('delivery_notice'));
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }
    
    public function update($id) 
    {
        $row = $this->Delivery_notice_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('delivery_notice/update_action'),
        		'kddelnot' => set_value('kddelnot', $row->kddelnot),
        		'kdinv' => set_value('kdinv', $row->kdinv),
        		//'kdquo' => set_value('kdquo', $row->kdquo),
        		'custkd' => set_value('custkd', $row->custkd),
        		//'payoptid' => set_value('payoptid', $row->payoptid),
        		'delnotdate' => set_value('delnotdate', $row->delnotdate),
        		//'dateofreceipt' => set_value('dateofreceipt', $row->dateofreceipt),
        		'custnotes' => set_value('custnotes', $row->custnotes),
        		'remark' => set_value('remark', $row->remark),
        		//'status' => set_value('status', $row->status),
    	    );
            $this->template->load('template','delivery_notice_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delivery_notice'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kddelnot', TRUE));
        } else {
            $data = array(
        		'kdinv' => $this->input->post('kdinv',TRUE),
        		//'kdquo' => $this->input->post('kdquo',TRUE),
        		'custkd' => $this->input->post('custkd',TRUE),
        		//'payoptid' => $this->input->post('payoptid',TRUE),
        		'delnotdate' => $this->input->post('delnotdate',TRUE),
        		//'dateofreceipt' => $this->input->post('dateofreceipt',TRUE),
        		'custnotes' => $this->input->post('custnotes',TRUE),
        		'remark' => $this->input->post('remark',TRUE),
        		//'status' => $this->input->post('status',TRUE),
    	    );

            $this->Delivery_notice_model->update($this->input->post('kddelnot', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('delivery_notice'));
        }
    }

    public function receipt($id)
    {
        $row = $this->Delivery_notice_model->get_by_id($id);

        if ($row) {
            $data = array(
                'dateofreceipt' => date('Y-m-d'),
                'status' => '20',
            );
            //var_dump($data);
            //var_dump($id);die;
            $this->Delivery_notice_model->receipt($id, $data);
            $this->session->set_flashdata('message', 'Update Date of Receipt Success');
            redirect(site_url('delivery_notice'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delivery_notice'));
        }
        
    }

    public function receipt_action()
    {
        $row = $this->Delivery_notice_model->get_by_id($id);

        if ($row) {
            $data = array(
                'dateofreceipt' => date('Y-m-d'),
                'status' => '20',
            );
            //var_dump($data);
            //var_dump($id);die;
            $this->Delivery_notice_model->receipt($this->input->post('kddelnot', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Date of Receipt Success');
            redirect(site_url('delivery_notice'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delivery_notice'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Delivery_notice_model->get_by_id($id);

        if ($row) {
            $this->Delivery_notice_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('delivery_notice'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delivery_notice'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kdinv', 'kdinv', 'trim|required');
	//$this->form_validation->set_rules('kdquo', 'kdquo', 'trim|required');
	$this->form_validation->set_rules('custkd', 'custkd', 'trim|required');
	//$this->form_validation->set_rules('payoptid', 'payoptid', 'trim|required');
	$this->form_validation->set_rules('delnotdate', 'delnotdate', 'trim|required');
	//$this->form_validation->set_rules('dateofreceipt', 'dateofreceipt', 'trim|required');
	$this->form_validation->set_rules('custnotes', 'custnotes', 'trim|required');
	$this->form_validation->set_rules('remark', 'remark', 'trim|required');
	//$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('kddelnot', 'kddelnot', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "delivery_notice.xls";
        $judul = "delivery_notice";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kdinv");
	xlsWriteLabel($tablehead, $kolomhead++, "Kdquo");
	xlsWriteLabel($tablehead, $kolomhead++, "Custkd");
	xlsWriteLabel($tablehead, $kolomhead++, "Payoptid");
	xlsWriteLabel($tablehead, $kolomhead++, "Delnotdate");
	xlsWriteLabel($tablehead, $kolomhead++, "Dateofreceipt");
	xlsWriteLabel($tablehead, $kolomhead++, "Custnotes");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Delivery_notice_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdinv);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdquo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->custkd);
	    xlsWriteNumber($tablebody, $kolombody++, $data->payoptid);
	    xlsWriteLabel($tablebody, $kolombody++, $data->delnotdate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dateofreceipt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->custnotes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->remark);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=delivery_notice.doc");

        $data = array(
            'delivery_notice_data' => $this->Delivery_notice_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('delivery_notice_doc',$data);
    }

}

/* End of file Delivery_notice.php */
/* Location: ./application/controllers/Delivery_notice.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-17 02:34:21 */
/* http://harviacode.com */