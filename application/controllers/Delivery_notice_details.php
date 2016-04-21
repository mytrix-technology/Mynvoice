<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delivery_notice_details extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Delivery_notice_details_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $delivery_notice_details = $this->Delivery_notice_details_model->get_all();

        $data = array(
            'delivery_notice_details_data' => $delivery_notice_details
        );

        $this->template->load('template','delivery_notice_details_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Delivery_notice_details_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kddelnot' => $row->kddelnot,
		'itemkd' => $row->itemkd,
		'itemname' => $row->itemname,
		'qty' => $row->qty,
		'upload' => $row->upload,
	    );
            $this->template->load('template','delivery_notice_details_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delivery_notice_details'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('delivery_notice_details/create_action'),
	    'kddelnot' => set_value('kddelnot'),
	    'itemkd' => set_value('itemkd'),
	    'itemname' => set_value('itemname'),
	    'qty' => set_value('qty'),
	    'upload' => set_value('upload'),
	);
        $this->template->load('template','delivery_notice_details_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kddelnot' => $this->input->post('kddelnot',TRUE),
		'itemkd' => $this->input->post('itemkd',TRUE),
		'itemname' => $this->input->post('itemname',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'upload' => $this->input->post('upload',TRUE),
	    );

            $this->Delivery_notice_details_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('delivery_notice_details'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Delivery_notice_details_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('delivery_notice_details/update_action'),
		'kddelnot' => set_value('kddelnot', $row->kddelnot),
		'itemkd' => set_value('itemkd', $row->itemkd),
		'itemname' => set_value('itemname', $row->itemname),
		'qty' => set_value('qty', $row->qty),
		'upload' => set_value('upload', $row->upload),
	    );
            $this->template->load('template','delivery_notice_details_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delivery_notice_details'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'kddelnot' => $this->input->post('kddelnot',TRUE),
		'itemkd' => $this->input->post('itemkd',TRUE),
		'itemname' => $this->input->post('itemname',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'upload' => $this->input->post('upload',TRUE),
	    );

            $this->Delivery_notice_details_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('delivery_notice_details'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Delivery_notice_details_model->get_by_id($id);

        if ($row) {
            $this->Delivery_notice_details_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('delivery_notice_details'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delivery_notice_details'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kddelnot', 'kddelnot', 'trim|required');
	$this->form_validation->set_rules('itemkd', 'itemkd', 'trim|required');
	$this->form_validation->set_rules('itemname', 'itemname', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');
	$this->form_validation->set_rules('upload', 'upload', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Delivery_notice_details.php */
/* Location: ./application/controllers/Delivery_notice_details.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-02-11 00:05:10 */
/* http://harviacode.com */