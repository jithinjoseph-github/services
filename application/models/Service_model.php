<?php

class Service_model extends CI_Model
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
     * @return mixed
     */
    public function getServices()
    {
        $query = $this->db->get_where('services', array('deleted' => null));
        return $query->result_array();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getService($id)
    {
        $query = $this->db->get_where('services', array('id' => $id));
        return $query->row_array();
    }

}
