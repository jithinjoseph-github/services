<?php

class Customer_model extends CI_Model
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param $filters
     * @return mixed
     */
    public function getCustomers($filters = array())
    {
        $this->db->from('customers');
        $this->db->where('deleted', null);
        if (!empty($filters['name'])) {
            $this->db->like('name', $filters['name']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCustomer($id)
    {
        $query = $this->db->get_where('customers', array('id' => $id));
        return $query->row_array();
    }

}
