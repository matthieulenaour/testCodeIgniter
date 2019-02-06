<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 06/02/19
 * Time: 07:24
 */

class Objects_model extends CI_Model
{
    protected $table = 'objects';

    public function getAllObjects($nb)
    {
        return $this->db->select('*')
            ->from($this->table)
            ->limit($nb)
            ->order_by('object_id', 'desc')
            ->get()
            ->result();
    }

    public function count($where = array())
    {
        return (int) $this->db->where($where)->count_all_results($this->table);
    }
}

/* End of file Objects_model.php */
/* Location: ./application/models/Objects_model.php */