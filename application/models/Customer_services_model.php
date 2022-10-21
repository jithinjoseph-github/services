<?php

class Customer_services_model extends CI_Model
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
    public function getList()
    {
        $this->db->select('customers.*, count(customer_services.id) as services_count');
        $this->db->join('customer_services', 'customers.id = customer_services.customer_id');
        $this->db->group_by('customers.id');
        $query = $this->db->get_where('customers', array('customers.deleted' => null));
        return $query->result_array();
    }

    /**
     * @param $filters
     * @return mixed
     */
    public function getCustomerServices($filters)
    {
        $conditions = array(
            'customer_services.deleted' => null,
            'customer_services.customer_id' => $filters['customer_id']
        );
        if (!empty($filters['date_from'])) {
            $conditions['customer_services.due_date >='] = $filters['date_from'];
        }
        if (!empty($filters['date_to'])) {
            $conditions['customer_services.due_date <='] = $filters['date_to'];
        }
        $this->db->select(
            'customer_services.*, services.name as service_name'
        );
        $this->db->join('services', 'services.id = customer_services.service_id');
        $query = $this->db->get_where('customer_services', $conditions);
        return $query->result_array();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCustomerService($id)
    {
        $this->db->select(
            'customer_services.*, services.name as service_name, customers.name as customer_name'
        );
        $this->db->join('services', 'services.id = customer_services.service_id');
        $this->db->join('customers', 'customers.id = customer_services.customer_id');
        $query = $this->db->get_where('customer_services', array('customer_services.id' => $id));
        return $query->row_array();
    }

    /**
     * @param $data
     * @return void
     */
    public function store($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['start_date'] = date('Y-m-d H:i:s', strtotime($data['start_date']));
        // get service type
        $this->load->model('Service_model');
        $service = $this->Service_model->getService($data['service_id']);
        $dueDates = $this->getNextDueDates($data['start_date'], $service['type']);
        foreach ($dueDates as $dueDate) {
            $data['due_date'] = $dueDate;
            $this->db->insert('customer_services', $data);
        }
    }

    /**
     * @param $startDate
     * @param $type
     * @return array
     */
    private function getNextDueDates($startDate, $type)
    {
        $dueDates = array();
        if ($type == 1) {
            // due date is next every month 10th and 20th
            // check if $data['start_date'] is less than 10th or 20th
            $day = date('d', strtotime($startDate));
            $month = date('m', strtotime($startDate));
            $year = date('Y', strtotime($startDate));
            $nextDueMonth = $month + 1;
            $nextDueYear = $year;
            if ($nextDueMonth > 12) {
                $nextDueMonth = 1;
                $nextDueYear = $year + 1;
            }
            if ($day < 10) {
                $dueDates[] = date('Y-m-d H:i:s', strtotime($year . '-' . $month . '-10'));
                $dueDates[] = date('Y-m-d H:i:s', strtotime($year . '-' . $month . '-20'));
            } elseif ($day < 20) {
                $dueDates[] = date('Y-m-d H:i:s', strtotime($year . '-' . $month . '-20'));
                $dueDates[] = date('Y-m-d H:i:s', strtotime($nextDueYear . '-' . ($nextDueMonth) . '-10'));
            } else {
                $dueDates[] = date('Y-m-d H:i:s', strtotime($nextDueYear . '-' . ($nextDueMonth) . '-10'));
                $dueDates[] = date('Y-m-d H:i:s', strtotime($nextDueYear . '-' . ($nextDueMonth) . '-20'));
            }
        } elseif ($type == 2) {
            // due date is next every 3 months after start date
            $dueDates[] = date('Y-m-d H:i:s', strtotime($startDate . ' +3 months'));
        } elseif ($type == 3) {
            // due date is next every 6 months after start date
            $dueDates[] = date('Y-m-d H:i:s', strtotime($startDate . ' +6 months'));
        } else {
            // due date after 365 days
            $dueDates[] = date('Y-m-d H:i:s', strtotime($startDate . ' +1 year'));
        }
        return $dueDates;
    }

    /**
     * @param $data
     * @return void
     */
    public function update($data)
    {
        $updateData = array(
            'updated_at' => date('Y-m-d H:i:s'),
            'completed_at' => date('Y-m-d H:i:s', strtotime($data['completed_at']))
        );
        $this->db->where('id', $data['id']);
        if ($this->db->update('customer_services', $updateData)) {
            $this->load->model('Service_model');
            $service = $this->Service_model->getService($data['service_id']);
            $lastDueDate = $this->getLastDueDate($data['service_id'], $data['customer_id']);
            $dueDates = $this->getNextDueDates($lastDueDate['due_date'], $service['type']);
            foreach ($dueDates as $dueDate) {
                $this->db->insert('customer_services', array(
                    'customer_id' => $data['customer_id'],
                    'service_id' => $data['service_id'],
                    'start_date' => $lastDueDate['due_date'],
                    'due_date' => $dueDate,
                    'created_at' => date('Y-m-d H:i:s')
                ));
            }
        }
    }

    /**
     * @param $serviceId
     * @param $customerId
     * @return mixed
     */
    private function getLastDueDate($serviceId, $customerId)
    {
        $this->db->select('due_date');
        $this->db->order_by('due_date', 'desc');
        $query = $this->db->get_where(
            'customer_services',
            array('service_id' => $serviceId, 'customer_id' => $customerId)
        );
        return $query->row_array();
    }

}
