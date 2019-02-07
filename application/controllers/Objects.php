<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objects extends CI_Controller {

    const NB_ROW_PER_PAGE = 30;

    /**
     * Objects constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
    }

    /**
     * display of objects
     */
    public function index()
    {
        $filter_object_name = $this->input->post('object_name');
        $filter_object_category  = $this->input->post('object_category');
        $filter_object_date = $this->input->post('object_date');

        $this->load->model('objects_model', 'objects_manager');
        $data = array();
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        list($data['objects'], $data['total_nb_objects']) = $this->objects_manager->getObjects(self::NB_ROW_PER_PAGE, $start_index, $filter_object_name, $filter_object_category, $filter_object_date);

        if ($data['total_nb_objects'] > 0) {

            $config['base_url'] = '/index.php/objects/index';
            $config['total_rows'] = $data['total_nb_objects'];
            $config['per_page'] = self::NB_ROW_PER_PAGE;
            $config['uri_segment'] = 3;
            $config['use_page_numbers'] = TRUE;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['next_link'] = '>';
            $config['prev_link'] = '<';

            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tagl_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tagl_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tagl_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tagl_close'] = '</a></li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);

            $data["pagination"] = $this->pagination->create_links();
        }

        $this->load->view('objects_view', $data);

    }
}
