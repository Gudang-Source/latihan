<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_access_model extends CI_Model
{

    public $table = 'user_access';
    public $id = 'id';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
            $this->db->or_like('aa.group_name', $q);
    $this->db->join("master_access bb","1=1","inner");
	$this->db->from("user_group aa");
        return $this->db->count_all_results();
    }


    // get data with limit and search
    function get_limit_data_cek($limit, $start = 0, $q = NULL) {
        $this->db->select("*,bb.id as id_master_access,aa.id as id_user_group");
        $this->db->order_by('aa.id', $this->order);
    $this->db->or_like('aa.group_name', $q);
    $this->db->limit($limit, $start);
    $this->db->join("master_access bb","1=1","inner");//on memang dikosongi karena agar terjoin semua

        return $this->db->get("user_group aa")->result();
    }


    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    $this->db->or_like('id_group', $q);
    $this->db->or_like('kd_access', $q);
    $this->db->or_like('nm_access', $q);
    $this->db->or_like('is_allow', $q);
    $this->db->or_like('note', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_isallow($idgroup,$kdmasteraccess){
        $row = $this->db->query("select id,is_allow from user_access where kd_access=$kdmasteraccess and id_group=$idgroup")->row();
        if ($row != []) {
            if ($row->is_allow == 1) {
            return true;
        } else {
            return false;
        }
        }else{
            return false;
        }
    }



    function existing($idgroup,$kdmasteraccess){
        $row = $this->db->query("select id from user_access where kd_access=$kdmasteraccess and id_group=$idgroup")->row();
        if ($row) {
            return true;
        }else{
            return false;
        }
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file User_access_model.php */
/* Location: ./application/models/User_access_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-20 10:09:30 */
/* http://harviacode.com */