<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objects extends CI_Controller {

    const NB_ROW_PER_PAGE = 30;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
    }

    public function index()
    {
        $this->load->model('objects_model', 'objectsManager');
        $this->load->library('pagination');
        $data = array();
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_nb_objects = $this->objectsManager->count();

        if ($total_nb_objects > 0)
        {
            $data['objects'] = $this->objectsManager->getObjects(self::NB_ROW_PER_PAGE, $start_index);

            $config['base_url'] = '/index.php/objects/index';
            $config['total_rows'] = $total_nb_objects;
            $config['per_page'] = self::NB_ROW_PER_PAGE;
            $config["uri_segment"] = 3;

            $this->pagination->initialize($config);

            // build paging links
            $data["pagination"] = $this->pagination->create_links();
        }

        $this->load->view('objects_view', $data);

    }
}
