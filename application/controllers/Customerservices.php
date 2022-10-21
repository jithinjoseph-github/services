<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customerservices extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $this->load->model('Customer_services_model');
        $customers = $this->Customer_services_model->getList();
        $this->load->view('layout/header');
        $this->load->view('customer_services/index', array('customers' => $customers));
        $this->load->view('layout/footer');
    }

    /**
     * @param $customerId
     * @return void
     */
    public function getlist($customerId)
    {
        if ($this->input->get('search')) {
            $dateFrom = date('Y-m-d', strtotime($this->input->get('date_from')));
            $dateTo = date('Y-m-d', strtotime($this->input->get('date_to')));
            $filters = array(
                'date_from' => date('Y-m-d H:i:s', strtotime($this->input->get('date_from'))),
                'date_to' => date('Y-m-d H:i:s', strtotime($this->input->get('date_to'))),
            );
        } else {
            $dateFrom = date('Y-m-d');
            $dateTo = date('Y-m-d', strtotime('+30 day'));
            $filters = array(
                'date_from' => date('Y-m-d H:i:s'),
                'date_to' => date('Y-m-d H:i:s', strtotime('+30 day')),
            );
        }
        $filters['customer_id'] = $customerId;
        $this->load->model('Customer_services_model');
        $this->load->model('Customer_model');
        $services = $this->Customer_services_model->getCustomerServices($filters);
        $customer = $this->Customer_model->getCustomer($customerId);
        $this->load->view('layout/header');
        $this->load->view(
            'customer_services/service_list',
            array(
                'services' => $services,
                'customer' => $customer,
                'dateFrom' => $dateFrom,
                'dateTo' => $dateTo
            )
        );
        $this->load->view('layout/footer');
    }

    /**
     * @param $customerId
     * @return void
     */
    public function create($customerId = null)
    {
        $this->load->model('Service_model');
        $services = $this->Service_model->getServices();
        $customer = null;
        if ($customerId) {
            $this->load->model('Customer_model');
            $customer = $this->Customer_model->getCustomer($customerId);
        }
        $this->load->view('layout/header');
        $this->load->view('customer_services/create', array('services' => $services, 'customer' => $customer));
        $this->load->view('layout/footer');
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        $this->load->model('Customer_services_model');
        $service = $this->Customer_services_model->getCustomerService($id);
        $this->load->view('layout/header');
        $this->load->view('customer_services/edit', array('service' => $service));
        $this->load->view('layout/footer');
    }

    /**
     * @return void
     */
    public function getcustomers()
    {
        $this->load->model('Customer_model');
        $search = $this->input->get('search');
        $filters = array();
        if (!empty($search)) {
            $filters['name'] = $search;
        }
        $customers = $this->Customer_model->getCustomers($filters);
        $customerList = array();
        foreach ($customers as $customer) {
            $customerList[] = array(
                'id' => $customer['id'],
                'text' => $customer['name'],
            );
        }
        echo json_encode($customerList);
    }

    /**
     * @return void
     */
    public function store()
    {
        $this->load->model('Customer_services_model');
        $this->Customer_services_model->store($this->input->post());
        redirect('customerservices/getlist/' . $this->input->post('customer_id'));
    }

    /**
     * @return void
     */
    public function update()
    {
        $this->load->model('Customer_services_model');
        $this->Customer_services_model->update($this->input->post());
        redirect('customerservices/getlist/' . $this->input->post('customer_id'));
    }
}
