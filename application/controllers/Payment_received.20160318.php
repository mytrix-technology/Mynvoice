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
		'kdinv' => $row->kdinv,
		'kdquo' => $row->kdquo,
		'custkd' => $row->custkd,
		'amount' => $row->amount,
		'bankcharge' => $row->bankcharge,
		'paydate' => $row->paydate,
		'paymode' => $row->paymode,
		'reference' => $row->reference,
        'remark' => $row->remark,
        'totamount' => $row->totamount,
        'amountrec' => $row->amountrec,
        'amtusepay' => $row->amtusepay,
        'amtrfd' => $row->amtrfd,
		'amtexcs' => $row->amtexcs,
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
            'custkd' => set_value('custkd'),
            'bankcharge' => set_value('bankcharge'),
            'paydate' => set_value('paydate'),
            'paymode' => set_value('paymode'),
            'reference' => set_value('reference'),
            'payreckdinv' => set_value('payreckdinv'),
            'payrecdate' => set_value('payrecdate'),
            'invamount' => set_value('invamount'),
            'amountdue' => set_value('amountdue'),
    	    'amount' => set_value('amount'),
    	    'totamount' => set_value('totamount'),
            'amountrec' => set_value('amountrec'),
            'remark' => set_value('remark'),
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

        var_dump($this->form_validation->run());die;
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'kdpayrec' => $genkdPayRec,
        'custkd' => $this->input->post('custkd',TRUE),
        'bankcharge' => $this->input->post('bankcharge',TRUE),
        'paydate' => $this->input->post('paydate',TRUE),
        'paymode' => $this->input->post('paymode',TRUE),
        'reference' => $this->input->post('reference',TRUE),
        'payreckdinv' => $this->input->post('payreckdinv',TRUE),
        'payrecdate' => $this->input->post('payrecdate',TRUE),
        'invamount' => $this->input->post('invamount',TRUE),
		'amountdue' => $this->input->post('amountdue',TRUE),
        'amount' => $this->input->post('amount',TRUE),
        'totamount' => $this->input->post('totamount',TRUE),
		'amountrec' => $this->input->post('amountrec',TRUE),
		'remark' => $this->input->post('remark',TRUE),
	    );

            $this->Payment_received_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('payment_received'));
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
        		'custkd' => set_value('custkd', $row->custkd),
        		'bankcharge' => set_value('bankcharge', $row->bankcharge),
        		'paydate' => set_value('paydate', $row->paydate),
        		'paymode' => set_value('paymode', $row->paymode),
                'reference' => set_value('reference', $row->reference),
                'payreckdinv' => set_value('payreckdinv', $row->payreckdinv),
                'payrecdate' => set_value('payrecdate', $row->payrecdate),
                'invamount' => set_value('invamount', $row->invamount),
                'amountdue' => set_value('amountdue', $row->amountdue),
                'amount' => set_value('amount', $row->amount),
        		'totamount' => set_value('totamount', $row->totamount),
                'amountrec' => set_value('amountrec', $row->amountrec),
                'remark' => set_value('remark', $row->remark),
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
        		'custkd' => $this->input->post('custkd',TRUE),
                'bankcharge' => $this->input->post('bankcharge',TRUE),
                'paydate' => $this->input->post('paydate',TRUE),
                'paymode' => $this->input->post('paymode',TRUE),
                'reference' => $this->input->post('reference',TRUE),
                'payreckdinv' => $this->input->post('payreckdinv',TRUE),
                'payrecdate' => $this->input->post('payrecdate',TRUE),
                'invamount' => $this->input->post('invamount',TRUE),
                'amountdue' => $this->input->post('amountdue',TRUE),
                'amount' => $this->input->post('amount',TRUE),
                'totamount' => $this->input->post('totamount',TRUE),
                'amountrec' => $this->input->post('amountrec',TRUE),
                'remark' => $this->input->post('remark',TRUE),
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
	$this->form_validation->set_rules('kdinv', 'kdinv', 'trim|required');
	//$this->form_validation->set_rules('kdquo', 'kdquo', 'trim|required');
	$this->form_validation->set_rules('custkd', 'custkd', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	$this->form_validation->set_rules('bankcharge', 'bankcharge', 'trim|required');
	$this->form_validation->set_rules('paydate', 'paydate', 'trim|required');
	$this->form_validation->set_rules('paymode', 'paymode', 'trim|required');
	$this->form_validation->set_rules('reference', 'reference', 'trim|required');
	$this->form_validation->set_rules('remark', 'remark', 'trim|required');

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
	xlsWriteLabel($tablehead, $kolomhead++, "Kdinv");
	xlsWriteLabel($tablehead, $kolomhead++, "Kdquo");
	xlsWriteLabel($tablehead, $kolomhead++, "Custkd");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Bankcharge");
	xlsWriteLabel($tablehead, $kolomhead++, "Paydate");
	xlsWriteLabel($tablehead, $kolomhead++, "Paymode");
	xlsWriteLabel($tablehead, $kolomhead++, "Reference");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");

	foreach ($this->Payment_received_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdinv);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdquo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->custkd);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bankcharge);
	    xlsWriteLabel($tablebody, $kolombody++, $data->paydate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->paymode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->reference);
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
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-25 23:38:35 */
/* http://harviacode.com */