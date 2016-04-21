<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nota extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $nota = $this->Nota_model->get_all();

        $data = array(
            'nota_data' => $nota
        );

        $this->template->load('template','nota_list', $data);
    }

    public function get_all_item()
    {
        // tangkap variabel keyword dari URL
        $keyword = $this->uri->segment(3);
        
        // cari di database
        $data = $this->db->from('items')->like('nama',$keyword)->get()->result();  

        // format keluaran di dalam array
        foreach($data as $row)
        {
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value' =>$row->nama,
                'desc'   =>$row->remark,
                'price'   =>$row->sell_price
            );
        }
        // minimal PHP 5.2
        echo json_encode($arr);
    }

    public function read($id) 
    {
        $row = $this->Nota_model->get_by_id($id);
        $row_detail = $this->Nota_model->get_by_id_detail($id);
        if ($row) {
            $data = array(
            		'kdnota' => $row->kdnota,
            		'custkd' => $row->custkd,
            		'notadate' => $row->notadate,
            		'subtotal' => $row->subtotal,
            		'discount' => $row->discount,
            		'tax' => $row->tax,
            		'grdtotal' => $row->grdtotal,
            		'payopt' => $row->payopt,
            		'custnotes' => $row->custnotes,
            		'remark' => $row->remark,
                    'detail_data' => $row_detail
                    );
            //var_dump(serialize($data));die;
            $this->template->load('template','nota_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nota/create_action'),
    	    'kdnota' => set_value('kdnota'),
    	    'custkd' => set_value('custkd'),
    	    'notadate' => set_value('notadate'),
    	    'subtotal' => set_value('subtotal'),
    	    'discount' => set_value('discount'),
    	    'tax' => set_value('tax'),
    	    'grdtotal' => set_value('grdtotal'),
    	    'payopt' => set_value('payopt'),
    	    'custnotes' => set_value('custnotes'),
            'remark' => set_value('remark'),
            'kodeitem' => set_value('kodeitem'),
            'description' => set_value('description'),
            'quantity' => set_value('quantity'),
            'price' => set_value('price'),
            'itemtax' => set_value('itemtax'),
    	    'lineTotal' => set_value('lineTotal'),
    	);
        //var_dump($this->template->load('template','nota_form', $data));die;
        $this->template->load('template','nota_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        $year = date('y');
        $month = date('m');

        $queCat = $this->db->get_where('category_invoice', array('id' => '3'));
        if ($queCat->num_rows() > 0)
        {
            foreach ($queCat->result() as $row) {
                $kdCat = $row->id;
            }
        }

        $this->db->select_max('kdnota');
        $query = $this->db->get('nota');
        if ($query->num_rows() > 0)
        {
           foreach ($query->result() as $row)
            {
                $kdmax = $row->kdnota;
                $kode = (int) substr($kdmax, 5,4);
                $kode++;
                $nourut = sprintf("%'.04d\n", $kode);
            }
        }
        
        $genkdNota = $year.''.$month.''.$kdCat.''.$nourut;

        $date = explode("-", $this->input->post('notadate',TRUE));
        $notadate = $date[2]."-".$date[1]."-".$date[0];

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kdnota' => $genkdNota,
        		'custkd' => $this->input->post('custkd',TRUE),
        		'notadate' => $notadate,
        		'subtotal' => $this->input->post('subtotal',TRUE),
        		'discount' => $this->input->post('discount',TRUE),
        		'tax' => $this->input->post('tax',TRUE),
        		'grdtotal' => $this->input->post('grdtotal',TRUE),
        		'payopt' => $this->input->post('payopt',TRUE),
        		'custnotes' => $this->input->post('custnotes',TRUE),
        		'remark' => $this->input->post('remark',TRUE),
    	    );
            $this->Nota_model->insert($data);

            $count = count($this->input->post('kodeitem',TRUE));
            for ($i=0; $i<$count ; $i++) { 
                $datadetail[$i] = array(
                        'kdnota' => $genkdNota,
                        'itemkd' =>$this->input->post('kodeitem',TRUE)[$i],
                        'itemname' => $this->input->post('description',TRUE)[$i],
                        'qty' => $this->input->post('quantity',TRUE)[$i],
                        'priceperitem' => $this->input->post('price',TRUE)[$i],
                        'totalprice' => $this->input->post('lineTotal',TRUE)[$i],
                );
                
            }
            $this->Nota_model->insertdetail($datadetail);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nota/update_action'),
		'kdnota' => set_value('kdnota', $row->kdnota),
		'custkd' => set_value('custkd', $row->custkd),
		'notadate' => set_value('notadate', $row->notadate),
		'subtotal' => set_value('subtotal', $row->subtotal),
		'discount' => set_value('discount', $row->discount),
		'tax' => set_value('tax', $row->tax),
		'grdtotal' => set_value('grdtotal', $row->grdtotal),
		'payopt' => set_value('payopt', $row->payopt),
		'custnotes' => set_value('custnotes', $row->custnotes),
		'remark' => set_value('remark', $row->remark),
	    );
            $this->template->load('template','nota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kdnota', TRUE));
        } else {
            $data = array(
		'custkd' => $this->input->post('custkd',TRUE),
		'notadate' => $this->input->post('notadate',TRUE),
		'subtotal' => $this->input->post('subtotal',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'tax' => $this->input->post('tax',TRUE),
		'grdtotal' => $this->input->post('grdtotal',TRUE),
		'payopt' => $this->input->post('payopt',TRUE),
		'custnotes' => $this->input->post('custnotes',TRUE),
		'remark' => $this->input->post('remark',TRUE),
	    );

            $this->Nota_model->update($this->input->post('kdnota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nota_model->get_by_id($id);

        if ($row) {
            $this->Nota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('custkd', 'custkd', 'trim|required');
	$this->form_validation->set_rules('notadate', 'notadate', 'trim|required');
	$this->form_validation->set_rules('subtotal', 'subtotal', 'trim|required');
	$this->form_validation->set_rules('discount', 'discount', 'trim|required');
	$this->form_validation->set_rules('tax', 'tax', 'trim|required');
	$this->form_validation->set_rules('grdtotal', 'grdtotal', 'trim|required');
	$this->form_validation->set_rules('payopt', 'payopt', 'trim|required');
	$this->form_validation->set_rules('custnotes', 'custnotes', 'trim|required');
	$this->form_validation->set_rules('remark', 'remark', 'trim|required');

	$this->form_validation->set_rules('kdnota', 'kdnota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "nota.xls";
        $judul = "nota";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Notadate");
	xlsWriteLabel($tablehead, $kolomhead++, "Subtotal");
	xlsWriteLabel($tablehead, $kolomhead++, "Discount");
	xlsWriteLabel($tablehead, $kolomhead++, "Tax");
	xlsWriteLabel($tablehead, $kolomhead++, "Grdtotal");
	xlsWriteLabel($tablehead, $kolomhead++, "Payopt");
	xlsWriteLabel($tablehead, $kolomhead++, "Custnotes");
	xlsWriteLabel($tablehead, $kolomhead++, "Remark");

	foreach ($this->Nota_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->custkd);
	    xlsWriteLabel($tablebody, $kolombody++, $data->notadate);
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
        header("Content-Disposition: attachment;Filename=nota.doc");

        $data = array(
            'nota_data' => $this->Nota_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('nota_doc',$data);
    }

}

/* End of file Nota.php */
/* Location: ./application/controllers/Nota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-10 00:53:13 */
/* http://harviacode.com */