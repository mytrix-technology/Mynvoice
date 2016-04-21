<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_invoice extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Category_invoice_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $category_invoice = $this->Category_invoice_model->get_all();

        $data = array(
            'category_invoice_data' => $category_invoice
        );

        $this->template->load('template','category_invoice_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Category_invoice_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'tag' => $row->tag,
	    );
            $this->template->load('template','category_invoice_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category_invoice'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('category_invoice/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'tag' => set_value('tag'),
	);
        $this->template->load('template','category_invoice_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'tag' => $this->input->post('tag',TRUE),
	    );

            $this->Category_invoice_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('category_invoice'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Category_invoice_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('category_invoice/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'tag' => set_value('tag', $row->tag),
	    );
            $this->template->load('template','category_invoice_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category_invoice'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'tag' => $this->input->post('tag',TRUE),
	    );

            $this->Category_invoice_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('category_invoice'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Category_invoice_model->get_by_id($id);

        if ($row) {
            $this->Category_invoice_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('category_invoice'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category_invoice'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('tag', 'tag', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "category_invoice.xls";
        $judul = "category_invoice";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Tag");

	foreach ($this->Category_invoice_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tag);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=category_invoice.doc");

        $data = array(
            'category_invoice_data' => $this->Category_invoice_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('category_invoice_doc',$data);
    }

}

/* End of file Category_invoice.php */
/* Location: ./application/controllers/Category_invoice.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-21 23:19:20 */
/* http://harviacode.com */