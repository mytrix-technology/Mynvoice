<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_status extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_status_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $master_status = $this->Master_status_model->get_all();

        $data = array(
            'master_status_data' => $master_status
        );

        $this->template->load('template','master_status_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Master_status_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'group' => $row->group,
		'status_name' => $row->status_name,
		'status_desc' => $row->status_desc,
		'is_active' => $row->is_active,
		//'user_created' => $row->user_created,
		//'user_updated' => $row->user_updated,
		//'create_on' => $row->create_on,
		//'update_on' => $row->update_on,
	    );
            $this->template->load('template','master_status_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_status'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_status/create_action'),
	    'id' => set_value('id'),
	    'group' => set_value('group'),
	    'status_name' => set_value('status_name'),
	    'status_desc' => set_value('status_desc'),
	    'is_active' => set_value('is_active'),
	    //'user_created' => set_value('user_created'),
	    //'user_updated' => set_value('user_updated'),
	    'create_on' => set_value('create_on'),
	    //'update_on' => set_value('update_on'),
	);
        $this->template->load('template','master_status_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        //var_dump($this->form_validation->run());die;
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'group' => $this->input->post('group',TRUE),
		'status_name' => $this->input->post('status_name',TRUE),
		'status_desc' => $this->input->post('status_desc',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
		//'user_created' => $this->input->post('user_created',TRUE),
		//'user_updated' => $this->input->post('user_updated',TRUE),
		'create_on' => date('Y-m-d h:i:s'),
		//'update_on' => $this->input->post('update_on',TRUE),
	    );

            $this->Master_status_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('master_status'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Master_status_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_status/update_action'),
		'id' => set_value('id', $row->id),
		'group' => set_value('group', $row->group),
		'status_name' => set_value('status_name', $row->status_name),
		'status_desc' => set_value('status_desc', $row->status_desc),
		'is_active' => set_value('is_active', $row->is_active),
		//'user_created' => set_value('user_created', $row->user_created),
		//'user_updated' => set_value('user_updated', $row->user_updated),
		//'create_on' => set_value('create_on', $row->create_on),
		'update_on' => set_value('update_on', $row->update_on),
	    );
            $this->template->load('template','master_status_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_status'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'group' => $this->input->post('group',TRUE),
		'status_name' => $this->input->post('status_name',TRUE),
		'status_desc' => $this->input->post('status_desc',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
		//'user_created' => $this->input->post('user_created',TRUE),
		//'user_updated' => $this->input->post('user_updated',TRUE),
		//'create_on' => $this->input->post('create_on',TRUE),
		'update_on' => date('Y-m-d h:i:s'),
	    );

            $this->Master_status_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('master_status'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Master_status_model->get_by_id($id);

        if ($row) {
            $this->Master_status_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('master_status'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_status'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('group', 'group', 'trim|required');
	$this->form_validation->set_rules('status_name', 'status name', 'trim|required');
	$this->form_validation->set_rules('status_desc', 'status desc', 'trim|required');
	$this->form_validation->set_rules('is_active', 'is active', 'trim|required');
	//$this->form_validation->set_rules('user_created', 'user created', 'trim|required');
	//$this->form_validation->set_rules('user_updated', 'user updated', 'trim|required');
	//$this->form_validation->set_rules('create_on', 'create on', 'trim|required');
	//$this->form_validation->set_rules('update_on', 'update on', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "master_status.xls";
        $judul = "master_status";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Group");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Desc");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Active");
	xlsWriteLabel($tablehead, $kolomhead++, "User Created");
	xlsWriteLabel($tablehead, $kolomhead++, "User Updated");
	xlsWriteLabel($tablehead, $kolomhead++, "Create On");
	xlsWriteLabel($tablehead, $kolomhead++, "Update On");

	foreach ($this->Master_status_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->group);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_desc);
	    xlsWriteNumber($tablebody, $kolombody++, $data->is_active);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_created);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_updated);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_on);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_on);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=master_status.doc");

        $data = array(
            'master_status_data' => $this->Master_status_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('master_status_doc',$data);
    }

}

/* End of file Master_status.php */
/* Location: ./application/controllers/Master_status.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-14 00:07:05 */
/* http://harviacode.com */