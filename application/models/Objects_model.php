<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 06/02/19
 * Time: 07:24
 */

class Objects_model extends CI_Model
{

    public function getObjects($nb, $begin = 0)
    {

        $query = $this->db->select('obj.object_id, obj.name, cat.name as name_category, obj.created_at')
            ->from('objects obj')
            ->join('categories cat', 'cat.category_id = obj.category_id', 'left')
            ->order_by('obj.object_id', 'desc')
            ->limit($nb, $begin)
            ->get();

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function count($where = array())
    {
        return (int) $this->db->where($where)->count_all_results('objects');
    }
}

/* End of file Objects_model.php */
/* Location: ./application/models/Objects_model.php */