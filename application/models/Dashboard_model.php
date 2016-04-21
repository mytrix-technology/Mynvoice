<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public $table_quo = 'quotation';
    public $table_quo_det = 'quotation_details';
    public $table_inv = 'invoice';
    public $table_inv_det = 'invoice_details';
    public $table_email = 'autoemail';
    public $table_pay_rec = 'payment_received';
    public $table_del_not = 'delivery_notice';
    public $table_del_not_detail = 'delivery_notice_details';
    public $table_nota = 'nota';
    public $table_nota_detail = 'nota_details';
    //public $id = 'kdinv';
    //public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all_quotation()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table_quo)->result();
    } 
    
    function get_all_invoice()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table_inv)->result();
    }

    function get_all_nota()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table_nota)->result();
    }

    function get_all_payment_received()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table_pay_rec)->result();
    }

    function get_all_delivery_notice()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id_detail($id)
    {   
        $this->db->where($this->id, intval($id));
        return $this->db->get($this->table_detail)->result();
    }
    
    // get total rows
    /*function total_rows($q = NULL) {
        $this->db->like('kdinv', $q);
	$this->db->or_like('kdquo', $q);
	$this->db->or_like('custkd', $q);
	$this->db->or_like('invdate', $q);
	$this->db->or_like('subtotal', $q);
	$this->db->or_like('discount', $q);
	$this->db->or_like('tax', $q);
	$this->db->or_like('grdtotal', $q);
	$this->db->or_like('payopt', $q);
	$this->db->or_like('custnotes', $q);
	$this->db->or_like('remark', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }*/

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kdinv', $q);
	$this->db->or_like('kdquo', $q);
	$this->db->or_like('custkd', $q);
	$this->db->or_like('invdate', $q);
	$this->db->or_like('subtotal', $q);
	$this->db->or_like('discount', $q);
	$this->db->or_like('tax', $q);
	$this->db->or_like('grdtotal', $q);
	$this->db->or_like('payopt', $q);
	$this->db->or_like('custnotes', $q);
	$this->db->or_like('remark', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
}