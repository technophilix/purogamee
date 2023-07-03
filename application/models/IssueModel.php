<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IssueModel extends CI_Model {

    public function get_all_issues() {
        return $this->db->get('issue')->result_array();
    }

    public function create_issue($data) {
        return $this->db->insert('issue', $data);
    }

    public function get_issue_by_id($idissue) {
        return $this->db->get_where('issue', array('idissue' => $idissue))->row();
    }

    public function update_issue($idissue, $data) {
        $this->db->where('idissue', $idissue);
        return $this->db->update('issue', $data);
    }

    public function delete_issue($idissue) {
        $this->db->where('idissue', $idissue);
        return $this->db->delete('issue');
    }

    public function get_current_issues() {
        return $this->db->get('issue')->last_row();
    }

}