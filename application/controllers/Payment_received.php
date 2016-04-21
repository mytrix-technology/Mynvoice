<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_received extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_received_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $payment_received = $this->Payment_received_model->get_all();

        $data = array(
            'payment_received_data' => $payment_received
        );

        $this->template->load('template','payment_received_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Payment_received_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kdpayrec' => $row->kdpayrec,
		//'ctpay' => $row->ctpay,
		'custkd' => $row->custkd,
		'bankcharge' => $row->bankcharge,
		'paydate' => $row->paydate,
		'paymode' => $row->paymode,
		'reference' => $row->reference,
		'kdinv' => $row->kdinv,
		'invdate' => $row->invdate,
		'invamount' => $row->invamount,
		'dueamount' => $row->dueamount,
		'amount' => $row->amount,
		'remark' => $row->remark,
		'upload' => $row->upload,
	    );
            $this->template->load('template','payment_received_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment_received'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('payment_received/create_action'),
    	    'kdpayrec' => set_value('kdpayrec'),
    	    'ctpay' => set_value('ctpay'),
    	    'custkd' => set_value('custkd'),
    	    'bankcharge' => set_value('bankcharge'),
    	    'paydate' => set_value('paydate'),
    	    'paymode' => set_value('paymode'),
    	    'reference' => set_value('reference'),
    	    'kdinv' => set_value('kdinv'),
    	    'invdate' => set_value('invdate'),
    	    'invamount' => set_value('invamount'),
    	    'dueamount' => set_value('dueamount'),
    	    'amount' => set_value('amount'),
    	    'remark' => set_value('remark'),
    	    'upload' => set_value('upload'),
    	);
        $this->template->load('template','payment_received_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

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

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kdpayrec' => $genkdPayRec,
        		'ctpay' => $this->input->post('ctpay',TRUE),
        		'custkd' => $this->input->post('custkd',TRUE),
        		'bankcharge' => $this->input->post('bankcharge',TRUE),
        		'paydate' => $this->input->post('paydate',TRUE),
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
            $this->Payment_received_model->insert($data);

            $maindata = array('quotation_data' => $data);

            $this->autoemail($maindata);
        }
    }

    public function autoemail($maindata)
    {
        foreach ($maindata as $data1) {
        
        }
        
        $data = array(
            'button' => 'Create',
            'action' => site_url('payment_received/autoemail_action'),
            'kdpayrec' => $data1['kdpayrec'],
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
        $this->template->load('template','email_payment_received', $data);
    }

    public function autoemail_action()
    {
        $kdform = $this->input->post('kdform',TRUE);
        $to = $this->input->post('to',TRUE);
        $cc = $this->input->post('cc',TRUE);
        $subject = $this->input->post('subject',TRUE);
        $pesan = $this->input->post('pesan',TRUE);
        $attach = $this->input->post('attach',TRUE);
        $url = site_url('payment_received');

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
        $this->email->from('formybisnis@gmail', 'Sentralnet - Payment Received');
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
                'judul' => 'Sentralnet - Payment Received',
                'subject' => $subject,
                'message' => $pesan,
                'attach' => $attach,
                'status' => 1,
            );
            $this->Payment_received_model->insertemail($dataemail);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('payment_received'));
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }
    
    public function update($id) 
    {
        $row = $this->Payment_received_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('payment_received/update_action'),
		'kdpayrec' => set_value('kdpayrec', $row->kdpayrec),
		'ctpay' => set_value('ctpay', $row->ctpay),
		'custkd' => set_value('custkd', $row->custkd),
		'bankcharge' => set_value('bankcharge', $row->bankcharge),
		'paydate' => set_value('paydate', $row->paydate),
		'paymode' => set_value('paymode', $row->paymode),
		'reference' => set_value('reference', $row->reference),
		'kdinv' => set_value('kdinv', $row->kdinv),
		'invdate' => set_value('invdate', $row->invdate),
		'invamount' => set_value('invamount', $row->invamount),
		'dueamount' => set_value('dueamount', $row->dueamount),
		'amount' => set_value('amount', $row->amount),
		'remark' => set_value('remark', $row->remark),
		'upload' => set_value('upload', $row->upload),
	    );
            $this->template->load('template','payment_received_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment_received'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdpayrec', TRUE));
        } else {
            $data = array(
		'ctpay' => $this->input->post('ctpay',TRUE),
		'custkd' => $this->input->post('custkd',TRUE),
		'bankcharge' => $this->input->post('bankcharge',TRUE),
		'paydate' => $this->input->post('paydate',TRUE),
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

            $this->Payment_received_model->update($this->input->post('kdpayrec', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('payment_received'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Payment_received_model->get_by_id($id);

        if ($row) {
            $this->Payment_received_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('payment_received'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment_received'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('ctpay', 'ctpay', 'trim|required');
	$this->form_validation->set_rules('custkd', 'custkd', 'trim|required');
	$this->form_validation->set_rules('bankcharge', 'bankcharge', 'trim|required');
	$this->form_validation->set_rules('paydate', 'paydate', 'trim|required');
	$this->form_validation->set_rules('paymode', 'paymode', 'trim|required');
	$this->form_validation->set_rules('reference', 'reference', 'trim|required');
	$this->form_validation->set_rules('kdinv', 'kdinv', 'trim|required');
	$this->form_validation->set_rules('invdate', 'invdate', 'trim|required');
	$this->form_validation->set_rules('invamount', 'invamount', 'trim|required');
	$this->form_validation->set_rules('dueamount', 'dueamount', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	$this->form_validation->set_rules('remark', 'remark', 'trim|required');
	//$this->form_validation->set_rules('upload', 'upload', 'trim|required');

	$this->form_validation->set_rules('kdpayrec', 'kdpayrec', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "payment_received.xls";
        $judul = "payment_received";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Ctpay");
	xlsWriteLabel($tablehead, $kolomhead++, "Custkd");
	xlsWriteLabel($tablehead, $kolomhead++, "Bankcharge");
	xlsWriteLabel($tablehead, $kolomhead++, "Paydate");
	xlsWriteLabel($tablehead, $kolomhead++, "Paymode");
	xlsWriteLabel($tablehead, $kolomhead++, "Reference");
	xlsWriteLabel($tablehead, $kolomhead++, "Kdinv");
	xlsWriteLabel($tablehead, $kolomhead++, "Invdate");
	xlsWriteLabel($tablehead, $kolomhead++, "Invamount");
	xlsWriteLabel($tablehead, $kolomhead++, "Dueamount");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");
	xlsWriteLabel($tablehead, $kolomhead++, "Upload");

	foreach ($this->Payment_received_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ctpay);
	    xlsWriteLabel($tablebody, $kolombody++, $data->custkd);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bankcharge);
	    xlsWriteLabel($tablebody, $kolombody++, $data->paydate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->paymode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->reference);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdinv);
	    xlsWriteLabel($tablebody, $kolombody++, $data->invdate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->invamount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dueamount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);
	    xlsWriteLabel($tablebody, $kolombody++, $data->remark);
	    xlsWriteLabel($tablebody, $kolombody++, $data->upload);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=payment_received.doc");

        $data = array(
            'payment_received_data' => $this->Payment_received_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('payment_received_doc',$data);
    }

}

/* End of file Payment_received.php */
/* Location: ./application/controllers/Payment_received.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-30 00:47:07 */
/* http://harviacode.com */