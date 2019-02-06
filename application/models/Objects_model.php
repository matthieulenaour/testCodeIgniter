<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 06/02/19
 * Time: 07:24
 */

/**
 * Class Objects_model
 */
class Objects_model extends CI_Model
{

    /**
     * get all objects by filters
     * @param $nb
     * @param int $begin
     * @param null $filter_object_name
     * @param null $filter_object_category
     * @param null $filter_object_date
     * @return array
     */
    public function getObjects($nb, $begin = 0, $filter_object_name = null, $filter_object_category = null, $filter_object_date = null)
    {

        $this->db->select('obj.object_id, obj.name, cat.name as name_category, obj.created_at')
            ->from('objects obj')
            ->join('categories cat', 'cat.category_id = obj.category_id', 'left');

        if (!empty($filter_object_name)) {
            $this->db->like('obj.name', $filter_object_name);
        }

        if (!empty($filter_object_category)) {
            $this->db->like('cat.name', $filter_object_category);
        }

        if (!empty($filter_object_date)) {
            $this->db->where('DATE(obj.created_at)', $filter_object_date);
        }

        $temp_db = clone $this->db;
        $nbObjects = $temp_db->count_all_results();

        $this->db->order_by('obj.object_id', 'desc')
            ->limit($nb, $begin);

        $query = $this->db->get();

        $data = null;
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return [$data, $nbObjects];
        }
    }

}

/* End of file Objects_model.php */
/* Location: ./application/models/Objects_model.php */