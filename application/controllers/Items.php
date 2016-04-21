<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Items_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $items = $this->Items_model->get_all();

        $data = array(
            'items_data' => $items
        );

        $this->template->load('template','items_list', $data);
    }

    public function read($kditem) 
    {
        $row = $this->Items_model->get_by_id($kditem);
        if ($row) {
            $data = array(
		'kditem' => $row->kditem,
		'name' => $row->name,
		'unit' => $row->unit,
		'purchase_price' => $row->purchase_price,
		'sell_price' => $row->sell_price,
		'tax' => $row->tax,
		'remark' => $row->remark,
	    );
            $this->template->load('template','items_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('items/create_action'),
	    'kditem' => set_value('kditem'),
	    'name' => set_value('name'),
	    'unit' => set_value('unit'),
	    'purchase_price' => set_value('purchase_price'),
	    'sell_price' => set_value('sell_price'),
	    'tax' => set_value('tax'),
	    'remark' => set_value('remark'),
	);
        $this->template->load('template','items_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        $year = date('y');
        $month = date('m');

        $this->db->select_max('kditem');
        $query = $this->db->get('items');
        if ($query->num_rows() > 0)
        {
           foreach ($query->result() as $row)
            {
                $kdmax = $row->kditem;
                $kode = (int) substr($kdmax, 4,4);
                $kode++;
                $nourut = sprintf("%'.04d\n", $kode);
            }
        }
        
        $genkditem = $year.''.$month.''.$nourut;

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'kditem' => $genkditem,
		'name' => $this->input->post('name',TRUE),
		'unit' => $this->input->post('unit',TRUE),
		'purchase_price' => $this->input->post('purchase_price',TRUE),
		'sell_price' => $this->input->post('sell_price',TRUE),
		'tax' => $this->input->post('tax',TRUE),
		'remark' => $this->input->post('remark',TRUE),
	    );

            $this->Items_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('items'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Items_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('items/update_action'),
		'kditem' => set_value('id', $row->kditem),
		'name' => set_value('name', $row->name),
		'unit' => set_value('unit', $row->unit),
		'purchase_price' => set_value('purchase_price', $row->purchase_price),
		'sell_price' => set_value('sell_price', $row->sell_price),
		'tax' => set_value('tax', $row->tax),
		'remark' => set_value('remark', $row->remark),
	    );
            $this->template->load('template','items_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
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
		'unit' => $this->input->post('unit',TRUE),
		'purchase_price' => $this->input->post('purchase_price',TRUE),
		'sell_price' => $this->input->post('sell_price',TRUE),
		'tax' => $this->input->post('tax',TRUE),
		'remark' => $this->input->post('remark',TRUE),
	    );

            $this->Items_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('items'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Items_model->get_by_id($id);

        if ($row) {
            $this->Items_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('items'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('unit', 'unit', 'trim|required');
	$this->form_validation->set_rules('purchase_price', 'purchase price', 'trim|required');
	$this->form_validation->set_rules('sell_price', 'sell price', 'trim|required');
	$this->form_validation->set_rules('tax', 'tax', 'trim|required');
	$this->form_validation->set_rules('remark', 'remark', 'trim|required');

	$this->form_validation->set_rules('kditem', 'kditem', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "items.xls";
        $judul = "items";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Unit");
	xlsWriteLabel($tablehead, $kolomhead++, "Purchase Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Sell Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Tax");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");

	foreach ($this->Items_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->unit);
	    xlsWriteNumber($tablebody, $kolombody++, $data->purchase_price);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sell_price);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tax);
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
        header("Content-Disposition: attachment;Filename=items.doc");

        $data = array(
            'items_data' => $this->Items_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('items_doc',$data);
    }

}

/* End of file Items.php */
/* Location: ./application/controllers/Items.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-21 23:23:28 */
/* http://harviacode.com */