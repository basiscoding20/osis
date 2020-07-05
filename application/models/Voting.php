<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Voting extends CI_Model
{
    public function getVotingDataById($table, $field, $id)
    {
        return $this->db->get_where($table, [$field => $id])->row_array();
    }

    public function getVotingLoginById($table, $field, $id)
    {
        return $this->db->get_where($table, [$field => $id])->num_rows();
    }
}
