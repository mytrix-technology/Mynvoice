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
        		'kdquo' => $row->kdquo,
                'custkd' => $row->custkd,
        		'payoptid' => $row->payoptid,
        		'delnotdate' => $row->delnotdate,
        		'custnotes' => $row->custnotes,
        		'remark' => $row->remark,
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
            'custkd' => set_value('custkd'),
    	    'kdinv' => set_value('kdinv'),
            'delnotdate' => set_value('delnotdate'),
    	    'custnotes' => set_value('custnotes'),
            'remark' => set_value('remark'),
            //'dateofreceipt' => set_value('dateofreceipt'),
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

        var_dump($this->form_validation->run());die;
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kddelnot' => $genkdDelNot,
        		'custkd' => $this->input->post('custkd',TRUE),
                'kdinv' => $this->input->post('kdinv',TRUE),
        		'delnotdate' => $this->input->post('delnotdate',TRUE),
        		'custnotes' => $this->input->post('custnotes',TRUE),
                'remark' => $this->input->post('remark',TRUE),
                'status' => 17,
    	    );
            $this->Delivery_notice_model->insert($data);
            
            $count = count($this->input->post('kodeitem',TRUE));
            for ($i=0; $i<$count ; $i++) {
                $datadetail[$i] = array(
                        'kddelnot' => $genkdDelNot,
                        'kodeitem' => $this->input->post('kodeitem',TRUE)[$i],
                        'nameitem' => $this->input->post('nameitem',TRUE)[$i],
                        'quantity' => $this->input->post('quantity',TRUE)[$i],
                        'sentquantity' => $this->input->post('sentquantity',TRUE)[$i],
                );
            }
            $this->Delivery_notice_model->insertdetail($datadetail);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('delivery_notice'));
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
		'kdquo' => set_value('kdquo', $row->kdquo),
		'custkd' => set_value('custkd', $row->custkd),
		'delnotdate' => set_value('delnotdate', $row->delnotdate),
		'custnotes' => set_value('custnotes', $row->custnotes),
		'remark' => set_value('remark', $row->remark),
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
		'kdquo' => $this->input->post('kdquo',TRUE),
		'custkd' => $this->input->post('custkd',TRUE),
		'delnotdate' => $this->input->post('delnotdate',TRUE),
		'custnotes' => $this->input->post('custnotes',TRUE),
		'remark' => $this->input->post('remark',TRUE),
	    );

            $this->Delivery_notice_model->update($this->input->post('kddelnot', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
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
	$this->form_validation->set_rules('kdquo', 'kdquo', 'trim|required');
	$this->form_validation->set_rules('custkd', 'custkd', 'trim|required');
	$this->form_validation->set_rules('delnotdate', 'delnotdate', 'trim|required');
	$this->form_validation->set_rules('custnotes', 'custnotes', 'trim|required');
	$this->form_validation->set_rules('remark', 'remark', 'trim|required');

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
	xlsWriteLabel($tablehead, $kolomhead++, "Delnotdate");
	xlsWriteLabel($tablehead, $kolomhead++, "Custnotes");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");

	foreach ($this->Delivery_notice_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdinv);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdquo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->custkd);
	    xlsWriteLabel($tablebody, $kolombody++, $data->delnotdate);
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
/* Generated by Harviacode Codeigniter CRUD Generator 2016-02-05 00:29:44 */
/* http://harviacode.com */